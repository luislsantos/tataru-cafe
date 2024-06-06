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
    <?php include 'navbar.php'; ?>

    <h1 class="p-3 col-9 mx-auto text-center">
        Faça seu login para realizar seus pedidos!
    </h1>
    <form class="col-6 p-3 mx-auto">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email-input" placeholder="seuemail@dominio.com.br">
            <label for="email-input">E-mail</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password-input" placeholder="Senha">
            <label for="password">Senha</label>
        </div>
        <div class="d-grid gap-3">
            <button class="btn btn-link">Esqueci minha senha</button>
            <button class="btn btn-success btn-lg">Entrar</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>