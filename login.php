<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body-general">
    <!--NAVBAR-->
    <?php 
        session_start();
        include 'navbar.php';
        include_once 'conexao.php';
    ?>
    <div class="px-4 py-5 mt-5 mb-2 text-center">
        <img src="https://placehold.co/57x72" alt="">
        <h1 class="display-8 fw-bold">Faça seu login para realizar seus pedidos!</h1>
    </div>

        <?php 
        #Código de Cadastro do cliente
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $sql = "SELECT id, nome, email, senha FROM clientes WHERE email = '$email'";
            $cliente_login = $conn->prepare($sql);
            $cliente_login->execute();
            $cliente_login = $cliente_login->fetch(PDO::FETCH_ASSOC);

            #Verifica se o usuário existe
            if(!empty($cliente_login)) {
            #Verifica se a senha confere
                if(password_verify($senha,$cliente_login['senha'])){ #A senha confere

                    #Criar um token a partir de um HEX aleatório
                    $token_sessao = bin2hex(random_bytes(32));

                    #Inserir o token no Banco
                    $sql = "INSERT INTO sessoes (id, cliente_id, token, data_criacao) VALUES (NULL, '$cliente_login[id]','$token_sessao',NOW())";
                    $registrar_token = $conn->prepare($sql);
                    $registrar_token->execute();

                    #Armazenar o token de sessão como um cookie
                    setcookie('token_sessao',$token_sessao, time() + 3600, 'deisy-trufas');
                    $_SESSION['user_id'] = $cliente_login['id'];
                    $_SESSION['user_name'] = $cliente_login['nome'];
                    echo 'Usuário logado';
                    header("Location: index.php");
                } else { #A senha não confere
                    echo 'Senha incorreta';
                    ?>
                    <div class="alert alert-danger col-6 mx-auto" role="alert">
                        Usuário ou senha incorretos
                    </div>
                <?php }
            } else {
                echo "Usuário não encontrado";
            }
        }
    ?>

    <div class="col-md-10 mx-auto col-lg-4">
        <form class="p-4 p-md-5 rounded-3 form-custom" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control form-field-custom" id="email-input" name="email" placeholder="seuemail@dominio.com.br">
                <label for="email-input" class="form-label-custom">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control form-field-custom" id="password-input" name="senha" placeholder="Senha">
                <label for="password" class="form-label-custom">Senha</label>
            </div>
            <div class="d-grid gap-3">
                <button class="btn btn-link">Esqueci minha senha</button>
                <button class="btn btn-primary btn-lg" type="submit">Entrar</button>
            </div>
        </form>
    </div>
    <?php /*if($errou_senha == 1){?>
        <div class="alert alert-danger" role="alert">
            Usuário ou senha incorretos
        </div>

    <?php }*/?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>