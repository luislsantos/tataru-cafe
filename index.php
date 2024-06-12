<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tataru Café</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body-general">
    <!--NAVBAR-->
    <?php
    session_start();
    include 'navbar.php';
    include_once 'conexao.php';

    #Verificar se tem sessão aberta pelo usuário e garantir que, se não tiver, o ID será -1
    $_SESSION['user_id'] = -1;

    if (isset($_COOKIE['token_sessao'])) {
        #echo "Reconheci que há um token salvo nos cookies";
        $token_sessao = $_COOKIE['token_sessao'];

        $sql = "SELECT sessoes.id, sessoes.cliente_id, clientes.nome FROM sessoes INNER JOIN clientes ON sessoes.cliente_id = clientes.id WHERE token = '$token_sessao'";
        $token_banco = $conn->prepare($sql);
        $token_banco->execute();
        $token_banco = $token_banco->fetch(PDO::FETCH_ASSOC);

        if ($token_banco) {
            $_SESSION['user_id'] = $token_banco['cliente_id'];
            $_SESSION['user_name'] = $token_banco['nome'];
            #echo "EU RECONHEÇO VOCÊ! É a sessão de id = " . $token_banco['id'];
            #echo " e o seu nome é: " . $token_banco['nome'];
        }
    }
    ?>
    

    <!-- Primeiro Hero, apenas com a chamada principal e um botão -->
    <div class="px-4 py-5 my-5 text-center">
        <img src="img/pena_logo.svg" alt="" height="72">
        <h1 class="display-5 fw-bold">Tataru Café</h1>
        <h2 class="display-6 fw-bold cursiva">Tataru Taru</h2>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Durante seus anos de dedicação enquanto tesoureira e secretária da organização mais importante de Eorzea, a mestre Tataru Taru se encantou com a diversidade culinária que podia ser encontrada ao redor de Etheirys. Assim, a fim de assegurar que todos também possam ter esta experiência, ela se juntou às mentes culinárias mais brilhantes do mundo para, sob o mesmo teto, reunir todas as escolas gastronômicas existentes.
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="lista-produtos.php" class="btn btn-primary btn-lg px-4 gap-3">Conheça nosso catálogo</a>
        </div>
    </div>

    <!-- Divisor "sombeado" entre os Heros -->
    <div class="hero-divider"></div>

    <!-- Segundo Hero, com imagem centralizada -->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold col-7 mx-auto">Produtos feitos pelos melhores artesãos de Eorzea, Othard e Radz-at-Han</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">No Tataru Cafe, cada produto é uma obra-prima criada com paixão e habilidade pelos melhores artesãos de Etheirys. Desde os bolos delicadamente decorados até os pães recém-assados, tudo é preparado com os ingredientes mais frescos e de alta qualidade. Nossa equipe de cozinheiros talentosos e dedicados garante que cada mordida seja uma experiência única e deliciosa, trazendo o melhor da culinária para você. Venha saborear a autenticidade e o carinho que colocamos em cada prato.</p>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="img/culinarian.png" class="img-fluid rounded-3 mb-4" alt="" width="500">
            </div>
        </div>
    </div>

    <!-- Divisor dos Heroes -->
    <div class="hero-divider"></div>

    <!-- Terceiro Hero, com texto à esquerda e imagem à direita -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="container col-10 col-sm-8 col-lg-6">
                <img src="img/lugares.png" alt="" class="img-fluid rounded-3">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Atendemos a todas as localizações</h1>
                <p class="lead">De Ul'dah a Ultima Thule, seja na Fonte ou em qualquer das 13 reflexões, há sempre um representante próximo à você. Garantimos sua entrega no prazo de 24h e você só paga ao receber, direto com o entregador.</p>
            </div>
        </div>
    </div>

    <!-- Divisor dos Heroes -->
    <div class="hero-divider"></div>

    <!-- Hero com um formulário para que a pessoa começe a inscrição -->
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-itens-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold mb-3">Registre-se agora e faça seu pedido</h1>
                <p class="col-lg-10 fs-4"> O que está esperando? Faça agora mesmo seu cadastro. É rápido e fácil!</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="cadastro.php" method="POST" class="p-4 p-md-5 rounded-3 form-custom">
                    <div class="form-floating mb-3">
                        <input type="text" id="inputNomeIndex" class="form-control form-field-custom" placeholder="José Santos" name="nome">
                        <label for="inputNomeIndex" class="form-label-custom">Nome Completo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email"  name="email" id="inputEmailIndex" class="form-control form-field-custom" placeholder="seuemail@dominio.com">
                        <label for="inputEmailIndex" class="form-label-custom">E-mail</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-lg btn-primary">Cadastrar</button>
                    <hr class="my-4">
                    <small class="text-body-secondary">Para podermos chegar até você, iremos solicitar mais algumas informações a seguir</small>
                </form>
            </div>
        </div>
    </div>
    <div class="hero-divider"></div>

    <?php include 'footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>