<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    include 'navbar.php';
    include_once 'conexao.php';

    #Código de Cadastro do cliente
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data-nascimento'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco_logradouro = $_POST['endereco-logradouro'];
        $endereco_numero = $_POST['endereco-numero'];
        $endereco_bairro = $_POST['endereco-bairro'];
        $endereco_complemento = $_POST['endereco-complemento'];
        $endereco_cidade = $_POST['endereco-cidade'];
        $endereco_estado = $_POST['endereco-estado'];
        $endereco_cep = $_POST['endereco-cep'];
        if($id < 0) $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);

        if($id < 0) {
            $sql = "INSERT INTO clientes (
                id, 
                nome, 
                cpf, 
                data_nascimento, 
                email, 
                telefone,
                endereco_logradouro,
                endereco_numero,
                endereco_bairro,
                endereco_complemento,
                endereco_cidade,
                endereco_estado,
                endereco_cep, 
                senha
                ) 
            VALUES 
                (NULL,
                '$nome',
                '$cpf',
                '$data_nascimento',
                '$email',
                '$telefone',
                '$endereco_logradouro',
                '$endereco_numero',
                '$endereco_bairro',
                '$endereco_complemento',
                '$endereco_cidade',
                '$endereco_estado',
                '$endereco_cep',
                '$senha'
            )";
        } else {
            $sql = "UPDATE clientes SET 
                nome = '$nome',
                cpf = '$cpf', 
                data_nascimento = '$data_nascimento', 
                email = '$email', 
                telefone = '$telefone',
                endereco_logradouro = '$endereco_logradouro',
                endereco_numero = '$endereco_numero',
                endereco_bairro = '$endereco_bairro',
                endereco_complemento = '$endereco_complemento',
                endereco_cidade = '$endereco_cidade',
                endereco_estado = '$endereco_estado',
                endereco_cep = '$endereco_cep'
                WHERE id = '$id'
            ";
        }

        $novo_cliente = $conn->prepare($sql);
        $novo_cliente->execute();
    }
?>

    <h1>Cadastro realizado com sucesso!</h1>
    <p>Agora é só fazer seu login e começar a comprar conosco!</p>
    <a href="login.php" class="btn btn-link">Clique aqui para realizar seu login</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>