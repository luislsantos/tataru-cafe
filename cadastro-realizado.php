<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-general">
<?php
    include 'navbar.php';
    include_once 'conexao.php';

    #Definir funções para remover hífens, pontos e parênteses do CPF e numero de telefone
    function formataStringRem($string) {
            return str_replace([".","-","(",")"],"",$string);
        }

    #Código de Cadastro do cliente
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = formataStringRem($_POST['cpf']);
        $data_nascimento = $_POST['data-nascimento'];
        $email = $_POST['email'];
        $telefone = formataStringRem($_POST['telefone']);
        $endereco_logradouro = $_POST['endereco-logradouro'];
        $endereco_numero = $_POST['endereco-numero'];
        $endereco_bairro = $_POST['endereco-bairro'];
        $endereco_complemento = $_POST['endereco-complemento'];
        $endereco_cidade = $_POST['endereco-cidade'];
        $endereco_estado = $_POST['endereco-estado'];
        $endereco_cep = $_POST['endereco-cep'];
        if($id < 0) $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);

        #Se for um cliente novo (id<0)
        if($id < 0) {

            #Primeiro tem de verificar se o email já está cadastrado
            $sql = "SELECT email FROM clientes WHERE email = '$email'";
            $busca_email = $conn->prepare($sql);
            $busca_email->execute();

            #Verificar se achou algum resultado
            if($busca_email->rowCount()) {
                $id = 0; #Setar o id como zero e não realizar o insert
                $sql = "";
            } else {
                #Não estando cadastrado esse email, fazemos a inserção dele no banco
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

            }
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
        if($id != 0) {
            $novo_cliente = $conn->prepare($sql);
            $novo_cliente->execute();
        }
    }

    if($id > 0) { ?>
        <div class="container px-5 pt-2 my-5 text-center">
                <h1 class="row display-4 fw-bold mb-2 justify-content-center">Seu cadastro foi atualizado!</h1>
                <p class="row mt-5 lead justify-content-center">Agora você já pode continuar suas compras com a certeza que elas serão entregues no endereço certo</p>
                <div class="row mt-5 justify-content-center">
                    <a class=" col-6 btn btn-primary" href="lista-produtos.php">Clique aqui para ir para o nosso catálogo de produtos</a>
                </div>

            </div>
    <?php } else if($id < 0) {?>
        <div class="container px-5 pt-2 my-5 text-center">
                <h1 class="row display-4 fw-bold mb-2 justify-content-center">Cadastro realizado com sucesso!</h1>
                <p class="row mt-5 lead justify-content-center">Agora é só fazer seu login e começar a comprar conosco!</p>
                <div class="row mt-5 justify-content-center">
                    <a class=" col-6 btn btn-primary" href="login.php">Clique aqui para realizar seu login</a>
                </div>
    <?php } else {?>
        <div class="container px-5 pt-2 my-5 text-center">
        <h1 class="row display-4 fw-bold mb-2 justify-content-center">E-mail já cadastrado!</h1>
        <p class="row mt-5 lead justify-content-center">O e-mail informado já se encontra cadastrado no nosso banco de dados. Por favor insira um novo e-mail</p>
        <div class="row mt-5 justify-content-center">
            <a class=" col-6 btn btn-primary" href="cadastro.php">Clique aqui para voltar para o formulário</a>
        </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>