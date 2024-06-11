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
    <?php 
    session_start();
    include 'navbar.php'; 
    include_once 'conexao.php';
    
    #Declarar uma função para formatar o CPF e número de telefone, deixando com os pontos e traços

    function formataStringAdc($tipo, $string) {
            if($tipo == 'cpf') {
                $parte1 = substr($string,0,3);
                $parte2 = substr($string,3,3);
                $parte3 = substr($string,6,3);
                $parte4 = substr($string,9,2);

                return $parte1. "." .$parte2. "." .$parte3."-".$parte4;
            }
            if($tipo == 'tel') {
                $parte1 = substr($string,0,2);
                $parte2 = substr($string,2,5);
                $parte3 = substr($string,7,4);

                return "(" .$parte1 .")" .$parte2 ."-" .$parte3;
            }
    }
    ?>


    <h1 class="p-3 col-9 mx-auto text-center">
        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
            $edit_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM clientes WHERE id = $_SESSION[user_id]";
            $cliente_banco = $conn->prepare($sql);
            $cliente_banco->execute();
            foreach($cliente_banco as $dado) {
                $nome = $dado['nome'];
                $cpf = formataStringAdc('cpf',$dado['cpf']);
                $data_nascimento = $dado['data_nascimento'];
                $email = $dado['email'];
                $telefone = formataStringAdc('tel',$dado['telefone']);
                $endereco_logradouro = $dado['endereco_logradouro'];
                $endereco_numero = $dado['endereco_numero'];
                $endereco_bairro = $dado['endereco_bairro'];
                $endereco_complemento = $dado['endereco_complemento'];
                $endereco_cidade = $dado['endereco_cidade'];
                $endereco_estado = $dado['endereco_estado'];
                $endereco_cep = $dado['endereco_cep'];
                $senha = $dado['senha'];

            }
            echo "Editar Cadastro";

        } else {
            $edit_id = -1;
            echo "Faça seu cadastro conosco e já começe a enviar seus pedidos";

        }?>
    </h1>

    <form action="cadastro-realizado.php" method="POST" class="col-lg-6 col-sm-12 p-3 mx-auto">
        <input type="hidden" name="id" value="<?php if($edit_id > 0) echo $edit_id?> hidden">
        <div class="mb-3">
            <label for="nome-completo" class="form-label">Nome completo</label>
            <input type="text" name="nome" class="form-control" id="nome-completo" required value="<?php if($edit_id > 0) echo $nome;?>">
        </div>
        <div class="row">
            <div class="mb-3 col-lg-6 col-md-12">
                <label for="cpf" class="form-label">CPF</label>
                <input oninput="" type="text" name="cpf" id="cpf" class="form-control" value="<?php if($edit_id > 0) echo $cpf;?>">
            </div>
            <div class="mb-3 col-lg-6 col-md-12">
                <label for="data-nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data-nascimento" id="data-nascimento" class="form-control" value="<?php if($edit_id > 0) echo $data_nascimento;?>">
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" placeholder="seuemail@dominio.com" class="form-control" required value="<?php if($edit_id > 0) echo $email;?>">
        </div>
        <div class="mb-3 col-lg-6 col-sm-12">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="<?php if($edit_id > 0) echo $telefone;?>">
        </div>

        <!-- Grupo do Endereço -->

        <div class="container-fluid p-0">
            <label for="endereco" class="form-label">Endereço</label>
            <div class="mb-3">
                <input type="text" name="endereco-logradouro" id="rua-casa" placeholder="Rua" class="form-control" value="<?php if($edit_id > 0) echo $endereco_logradouro;?>">
            </div>
            <div class="row">
                <div class="mb-3 col-lg-4 col-md-12">
                    <input type="text" name="endereco-numero" id="numero-casa" placeholder="Número" class="form-control" value="<?php if($edit_id > 0) echo $endereco_numero;?>">
                </div>
                <div class="mb-3 col-lg-8 col-md-12">
                    <input type="text" name="endereco-bairro" id="bairro" placeholder="Bairro" class="form-control" value="<?php if($edit_id > 0) echo $endereco_bairro;?>">
                </div>
            </div>
            <div class="mb-3">
                <input type="text" name="endereco-complemento" id="complemento-casa" placeholder="Complemento" class="form-control" value="<?php if($edit_id > 0) echo $endereco_complemento;?>">
            </div>
            <div class="row">
                <div class="mb-3 col-lg-4 col-md-12">
                    <input type="text" name="endereco-cidade" id="cidade-casa" placeholder="Cidade" class="form-control" value="<?php if($edit_id > 0) echo $endereco_cidade;?>">
                </div>
                <div class="mb-3 col-lg-4 col-md-12">
                    <input type="text" name="endereco-estado" id="estado-casa" placeholder="Estado" class="form-control" value="<?php if($edit_id > 0) echo $endereco_estado;?>">
                </div>
                <div class="mb-3 col-lg-4 col-md-12">
                    <input type="text" name="endereco-cep" id="cep-casa" placeholder="CEP" class="form-control" value="<?php if($edit_id > 0) echo $endereco_cep;?>">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="senha" id="password" placeholder="Senha" class="form-control" required <?php if($edit_id > 0) echo "disabled";?>>
            <div class="form-text">A senha deve ter entre 6-20 caracteres, e incluir caracteres maiúsculos, minúsculos, números e símbolos</div>
        </div>
        <div class="mb-3">
            <input type="password" name="senha" id="password" placeholder="Confirme sua senha" class="form-control" required <?php if($edit_id > 0) echo "disabled";?>>
        </div>
        <div class="d-grid gap-3 mt-4">
            <button type="submit" class="btn btn-success btn-lg">
                <?php if ($edit_id > 0) {
                    echo "Atualizar Dados";
                } else {
                    echo "Cadastrar";
                }?>
            </button>
        </div>
    </form>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>