<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body-general">

    <!--NAVBAR-->
    <?php include 'navbar.php'; ?>

    <h1 class="p-3 col-9 mx-auto text-center">
        Faça seu cadastro conosco e já começe a enviar seus pedidos
    </h1>

    <form class="col-lg-6 col-sm-12 p-3 mx-auto">
        <div class="mb-3">
            <label for="nome-completo" class="form-label">Nome completo</label>
            <input type="text" name="nome" class="form-control" id="nome-completo">
        </div>
        <div class="row">
            <div class="mb-3 col-lg-6 col-md-12">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control">
            </div>
            <div class="mb-3 col-lg-6 col-md-12">
                <label for="data-nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data-nascimento" id="data-nascimento" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" placeholder="seuemail@dominio.com" class="form-control">
        </div>
        <div class="mb-3 col-lg-6 col-sm-12">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control">
        </div>

        <!-- Grupo do Endereço -->
         
        <div class="container-fluid p-0">
            <label for="rua" class="form-label">Endereço</label>
            <div class="mb-3">
                <input type="text" name="rua-casa" id="rua-casa" placeholder="Rua" class="form-control">
            </div>
            <div class="row">
                <div class="mb-3 col-lg-4 col-md-12">
                    <input type="text" name="numero-casa" id="numero-casa" placeholder="Número" class="form-control">
                </div>
                <div class="mb-3 col-lg-8 col-md-12">
                    <input type="text" name="bairro-casa" id="bairro" placeholder="Bairro" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <input type="text" name="complemento-casa" id="complemento-casa" placeholder="Complemento" class="form-control">
            </div>
            <div class="row">
                <div class="mb-3 col-lg-4 col-md-12">
                    <input type="text" name="cidade-casa" id="cidade-casa" placeholder="Cidade" class="form-control">
                </div>
                <div class="mb-3 col-lg-4 col-md-12">
                    <input type="text" name="estado-casa" id="estado-casa" placeholder="Estado" class="form-control">
                </div>
                <div class="mb-3 col-lg-4 col-md-12">
                    <input type="text" name="cep-casa" id="cep-casa" placeholder="CEP" class="form-control">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
            <div class="form-text">A senha deve ter entre 6-20 caracteres, e incluir caracteres maiúsculos, minúsculos, números e símbolos</div>
        </div>
        <div class="mb-3">
            <input type="password" name="password" id="password" placeholder="Confirme sua senha" class="form-control">
        </div>
        <div class="d-grid gap-3 mt-4">
            <button class="btn btn-success btn-lg">Cadastrar</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>