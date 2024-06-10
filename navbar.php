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

          <!--Logo -->
          <a class="navbar-brand col-2" href="index.php">
            Deisy Trufas
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Início do conteúdo que entra no "menu sanduíche" em telas mobile -->
          <div class="collapse navbar-collapse row" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto row justify-content-between">

            <!-- Botão Home -->
              <li class="nav-item col-2">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>

            <!-- Botão Catálogo de Produtos -->
              <li class="nav-item col-2">
                <a class="nav-link active" aria-current="page" href="lista-produtos.php">Catálogo de Produtos</a>
              </li>

            <!-- Botão Cadastrar -->
              <?php if(!isset($_COOKIE['token_sessao'])){ ?>
                <li class="nav-item col-2">
                  <a class="nav-link" href="cadastro.php">Cadastrar</a>
                </li>
              <?php }?>

            <!-- Botão ? -->
              <!--<li class="nav-item col-2">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>-->
            
            <!-- Botão Meu Cadastro (colapsable) -->
              <?php if(!isset($_COOKIE['token_sessao'])) {?>
                  <li class="nav-item col-2">
                  <a class="nav-link active" aria-current="page" href="login.php">Login</a>
              </li>
              <?php } else {?>
              <li class="nav-item dropdown col-2">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Olá <?php echo $_SESSION['user_name'] ?>
                </a>
                <ul class="dropdown-menu col-2">
                  <li><a class="dropdown-item" href="lista-pedidos.php">Ver pedidos</a></li>
                  <li><a class="dropdown-item" href="cadastro.php">Editar Cadastro</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logoff.php">Logout</a></li>
                </ul>
              </li>
              <?php }?>

              <!-- Botão carrinho-->
               <?php if(isset($_COOKIE['token_sessao'])){ ?>
                 <li class="nav-item col-2">
                     <a class="nav-link active" aria-current="page" href="carrinho.php">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                             <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
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