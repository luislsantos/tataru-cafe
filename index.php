<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deisy Trufas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body-general">
    <!--NAVBAR-->
    <?php
    session_start();
    include 'navbar.php';
    include_once 'conexao.php';

    $_SESSION['user_id'] = -1;

    if (isset($_COOKIE['token_sessao'])) {
        echo "Reconheci que há um token salvo nos cookies";
        $token_sessao = $_COOKIE['token_sessao'];

        $sql = "SELECT sessoes.id, sessoes.cliente_id, clientes.nome FROM sessoes INNER JOIN clientes ON sessoes.cliente_id = clientes.id WHERE token = '$token_sessao'";
        $token_banco = $conn->prepare($sql);
        $token_banco->execute();
        $token_banco = $token_banco->fetch(PDO::FETCH_ASSOC);

        if ($token_banco) {
            $_SESSION['user_id'] = $token_banco['cliente_id'];
            $_SESSION['user_name'] = $token_banco['nome'];
            echo "EU RECONHEÇO VOCÊ! É a sessão de id = " . $token_banco['id'];
            echo " e o seu nome é: " . $token_banco['nome'];
        }
    }
    ?>
    <div class="hero-divider"></div>

    <!-- Primeiro Hero, apenas com a chamada principal e um botão -->
    <div class="px-4 py-5 my-5 text-center">
        <img src="https://placehold.co/57x72" alt="">
        <h1 class="display-5 fw-bold">Deysi Trufas</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet condimentum turpis, at scelerisque augue. Phasellus a finibus augue. Mauris tincidunt, eros vel tempus mattis, felis arcu placerat diam, posuere imperdiet enim enim eget purus. Duis gravida, magna ut feugiat euismod, nisi ante molestie tellus, nec accumsan urna orci sed tellus.</p>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="lista-produtos.php" class="btn btn-primary btn-lg px-4 gap-3">Conheça nosso catálogo</a>
        </div>
    </div>

    <!-- Divisor "sombeado" entre os Heros -->
    <div class="hero-divider"></div>

    <!-- Segundo Hero, com imagem centralizada -->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold">Imagem fazendo doce</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Aenean tempus aliquam elementum. Donec fringilla, nibh ac accumsan pulvinar, sapien orci luctus eros, eu tempus augue mauris at lectus. Donec tempor vitae tellus non varius. Proin commodo neque eget urna tristique, ut porta magna elementum. Aliquam erat volutpat. Nulla dapibus elit feugiat ex sodales, at hendrerit lacus scelerisque. Nam varius dictum finibus. Nulla sem eros, dignissim vitae feugiat eu, pellentesque vel tortor. In ullamcorper augue in ultrices varius. Cras interdum ex vel leo ultricies tempor.</p>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="https://placehold.co/500x700" class="img-fluid border rounded-3 shadow-lg mb-4" alt="">
            </div>
        </div>
    </div>

    <!-- Divisor dos Heroes -->
    <div class="hero-divider"></div>

    <!-- Terceiro Hero, com texto à esquerda e imagem à direita -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="https://placehold.co/500x700" alt="">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Imagem do cardápio</h1>
                <p class="lead">Vestibulum venenatis pretium dui vel consequat. Suspendisse placerat vestibulum nulla vitae tristique. Cras elementum, eros at elementum finibus, augue nisi pulvinar sapien, at egestas elit lacus eu ex. Vivamus id faucibus enim. Vestibulum vulputate fringilla dui, ac scelerisque quam dictum pharetra. Morbi eu felis sit amet massa condimentum lacinia non lacinia risus. Mauris dapibus turpis augue, at aliquam mauris luctus vel.</p>
            </div>
        </div>
    </div>

    <!-- Divisor dos Heroes -->
    <div class="hero-divider"></div>

    <!-- Hero com um formulário para que a pessoa começe a inscrição -->
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-itens-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold mb-3">Registre-se e receba nossos produtos em qualquer lugar do Brasil</h1>
                <p class="col-lg-10 fs-4">Donec scelerisque ornare vulputate. Nunc ipsum urna, molestie eu nibh eu, ornare malesuada mauris. Duis auctor dolor nisl, vel euismod enim hendrerit id. Phasellus elementum felis vel sollicitudin dapibus.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="" class="p-4 p-md-5 rounded-3 form-custom">
                    <div class="form-floating mb-3">
                        <input type="text" id="inputNomeIndex" class="form-control form-field-custom" placeholder="José Santos">
                        <label for="inputNomeIndex" class="form-label-custom">Nome Completo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email"  name="email" id="inputEmailIndex" class="form-control form-field-custom" placeholder="seuemail@dominio.com">
                        <label for="inputEmailIndex" class="form-label-custom">E-mail</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-lg btn-primary">Cadastrar</button>
                    <hr class="my-4">
                    <small class="text-body-secondary">Para podermos enviar nossso doces até você, iremos solicitar mais algumas informações a seguir</small>
                </form>
            </div>
        </div>
    </div>
    <div class="hero-divider"></div>

    <!-- Início do "Carousel", é um componente do bootstrap que fica passando as fotos -->
    <div id="carousel-doces" class="carousel slide mx-auto pt-lg-5 pt-md-3 pt-sm-2 w-75 hidden">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel-doces" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel-doces" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel-doces" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            <!-- Primeiro item do Carousel, é o que estará "ativo" quando o usuário carregar a página -->
            <div class="carousel-item active">
                <img src="img\sweets1-md.jpg" class="d-block mx-auto" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Lorem ipsum</h5>
                    <p>Dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>

            <!-- Segundo item do Carousel -->
            <div class="carousel-item">
                <img src="img\sweets2-md.jpg" class="d-block mx-auto" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nam vitae ipsum leo</h5>
                    <p>Nunc imperdiet hendrerit nisi, id egestas justo eleifend nec.</p>
                </div>
            </div>

            <!-- Terceiro item do Carousel -->
            <div class="carousel-item">
                <img src="img\sweets3-md.jpg" class="d-block mx-auto" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sed massa neque</h5>
                    <p>Pellentesque vitae neque consequat, rutrum imperdiet ipsum.</p>
                </div>
            </div>
        </div>

        <!-- São os controles do Carousel, as setas de ir de voltar -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-doces" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-doces" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet condimentum turpis, at scelerisque augue. Phasellus a finibus augue. Mauris tincidunt, eros vel tempus mattis, felis arcu placerat diam, posuere imperdiet enim enim eget purus. Duis gravida, magna ut feugiat euismod, nisi ante molestie tellus, nec accumsan urna orci sed tellus. Aenean tempus aliquam elementum. Donec fringilla, nibh ac accumsan pulvinar, sapien orci luctus eros, eu tempus augue mauris at lectus. Donec tempor vitae tellus non varius. Proin commodo neque eget urna tristique, ut porta magna elementum. Aliquam erat volutpat. Nulla dapibus elit feugiat ex sodales, at hendrerit lacus scelerisque. Nam varius dictum finibus. Nulla sem eros, dignissim vitae feugiat eu, pellentesque vel tortor. In ullamcorper augue in ultrices varius. Cras interdum ex vel leo ultricies tempor.</p>

    <p>Vestibulum venenatis pretium dui vel consequat. Suspendisse placerat vestibulum nulla vitae tristique. Cras elementum, eros at elementum finibus, augue nisi pulvinar sapien, at egestas elit lacus eu ex. Vivamus id faucibus enim. Vestibulum vulputate fringilla dui, ac scelerisque quam dictum pharetra. Morbi eu felis sit amet massa condimentum lacinia non lacinia risus. Mauris dapibus turpis augue, at aliquam mauris luctus vel.</p>

    <p>Donec scelerisque ornare vulputate. Nunc ipsum urna, molestie eu nibh eu, ornare malesuada mauris. Duis auctor dolor nisl, vel euismod enim hendrerit id. Phasellus elementum felis vel sollicitudin dapibus. Phasellus a ultrices nunc. Aliquam gravida non ex nec porta. Cras et aliquet odio. Aenean nisl libero, varius eu ipsum varius, elementum faucibus metus. Fusce justo libero, facilisis volutpat pellentesque at, varius in nisl. Fusce sollicitudin, magna vitae placerat condimentum, ligula enim sagittis est, et dapibus turpis justo quis purus. Aenean in metus et erat faucibus venenatis. Curabitur a ex quis enim faucibus viverra id vel ligula. Etiam rutrum imperdiet velit id dignissim.</p>

    <p>Morbi ultricies hendrerit magna ac gravida. Cras facilisis purus libero, eu tempor lectus consectetur sed. Mauris non felis tortor. Morbi mollis vitae velit sit amet varius. Fusce ligula eros, dictum a accumsan in, tincidunt et est. Maecenas elementum est mi, in luctus sem feugiat ac. Nulla est odio, hendrerit non pretium in, ultricies id lorem. Suspendisse molestie cursus ultricies. Proin iaculis lorem non magna imperdiet imperdiet. Suspendisse potenti. Quisque volutpat non urna id congue. Maecenas lobortis efficitur arcu eget sodales. Donec in magna fringilla, efficitur lorem vitae, hendrerit orci.</p>

    <p>Mauris eros erat, commodo nec pellentesque a, auctor a ligula. Morbi cursus nec libero ac laoreet. Donec ullamcorper ac risus nec euismod. Sed consectetur mauris ac dui pellentesque, vel pharetra nulla venenatis. Donec lacinia ante nec sodales ultricies. Donec porta libero at quam tristique, ac accumsan libero egestas. Vestibulum scelerisque fermentum magna, nec efficitur felis sodales id. Ut id feugiat libero, a efficitur ligula. Duis sed neque facilisis velit sagittis vulputate. Sed dignissim turpis quam, nec accumsan magna porttitor in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>

    <?php
    echo $_SESSION['user_id'];
    if ($_SESSION['user_id'] >= 0) {
        echo "EU RECONHEÇO VOCÊ!";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>