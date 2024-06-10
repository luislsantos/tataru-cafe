<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php if(!isset($_SESSION)) session_start()?>
<nav class="navbar navbar-expand-sm bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand col-2" href="index.php">
            Deisy Trufas
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse row" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto row justify-content-between">
              <li class="nav-item col-2">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item col-2">
                <a class="nav-link" href="cadastro.php">Cadastrar</a>
              </li>
              <li class="nav-item dropdown col-2">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Meu Cadastro
                </a>
                <ul class="dropdown-menu col-2">
                  <li><a class="dropdown-item" href="lista-produtos.php">Novo pedido</a></li>
                  <li><a class="dropdown-item" href="#">Ver pedidos</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Editar Cadastro</a></li>
                </ul>
              </li>
              <li class="nav-item col-2">
                <?php 
                if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) { ?>
                  <a class="nav-link active" aria-current="page" href="logoff.php">Logoff</a>
                <?php } else { ?>
                  <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                <?php }
                ?>
            </li>
            <li class="nav-item col-2">
                <a class="nav-link active" aria-current="page" href="carrinho.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                      </svg>
                </a>
            </li>
            </ul>
          </div>
        </div>
      </nav>
</body>
</html>