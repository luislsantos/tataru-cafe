<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gwendolyn:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php if (!isset($_SESSION)) session_start() ?>

    <!-- Começo da Navbar -->
    <nav class="navbar sticky-top navbar-expand-md border-bottom" id="navbar-principal">
        <div class="container-fluid">

            <!--Logo -->
            <a class="navbar-brand col-2 navbar-content ps-5 cursiva" href="index.php" style="font-size: xx-large;">
                <img src="img/cafe_logo.svg" alt="" height="60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Início do conteúdo que entra no "menu sanduíche" em telas mobile -->
            <div class="collapse navbar-collapse row" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto row justify-content-end pe-5">

                    <!-- Botão Home -->
                    <li class="nav-item col-sm-auto">
                        <a class="nav-link navbar-content" aria-current="page" href="index.php">Home</a>
                    </li>

                    <!-- Botão Catálogo de Produtos -->
                    <li class="nav-item col-sm-auto">
                        <a class="nav-link navbar-content" aria-current="page" href="lista-produtos.php">Catálogo de Produtos</a>
                    </li>

                    <!-- Botão Cadastrar -->
                    <?php if (!isset($_COOKIE['token_sessao'])) { ?>
                        <li class="nav-item col-sm-auto">
                            <a class="nav-link navbar-content" href="cadastro.php">Cadastrar</a>
                        </li>
                    <?php } ?>

                    <!-- Botão ? (Não lembro porque criei então deixei aqui. Vai que eu lembro depois) -->
                    <!--<li class="nav-item col-2">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>-->

                    <!-- Botão Meu Cadastro (colapsable) -->
                    <?php if (!isset($_COOKIE['token_sessao'])) { ?>

                    <!-- Mostrar botão de Login se o usuário não estiver logado -->
                        <li class="nav-item col-sm-auto">
                            <a class="nav-link navbar-content" aria-current="page" href="login.php">Login</a>
                        </li>
                    <?php } else { ?>

                    <!-- Mostrar o menu com o nome do usuário se ele estiver logado -->
                        <li class="nav-item dropdown col-sm-auto">
                            <a class="nav-link dropdown-toggle navbar-content" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Olá <?php echo $_SESSION['user_name'] ?> <!-- Mostra o nome do usuário -->
                            </a>
                            <ul class="dropdown-menu col-sm-auto navbar-dropdown"> <!-- Menu com opções, que abre quando clica non nome do usuário -->
                                <li><a class="dropdown-item navbar-content" href="lista-pedidos.php">Meus pedidos</a></li>
                                <li><a class="dropdown-item navbar-content" href="cadastro.php">Editar Cadastro</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item navbar-content" href="logoff.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <!-- Botão carrinho-->
                    <?php if (isset($_COOKIE['token_sessao'])) {?>
                        <li class="nav-item col-sm-auto">
                            <a class="nav-link navbar-content" aria-current="page" href="carrinho.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                </svg>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>