<?php
session_start();
require_once 'ProdutoCarrinho.php';
include_once 'conexao.php';

// Recupera o carrinho da sessão
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include 'navbar.php';
    

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $prod_id = $_POST['id'];
        $qtde = $_POST['quantidade'];
        
        #Verificar se já existe um carrinho
        if(!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
        #Verificar se o produto já está no carrinho

        if(isset($_SESSION['carrinho'][$prod_id])) {
            $_SESSION['carrinho'][$prod_id]->quantidade += $qtde;
        } else {
            
            $sql = "SELECT * from produtos WHERE id=$prod_id";
            $produto = $conn->prepare($sql);
            $produto->execute();

            $produto_resultado = $produto->fetch();

            $valorUnitario = $produto_resultado['preco_unitario'];
            $valorTotal = $valorUnitario*$qtde;
            $produto_carrinho = new ProdutoCarrinho($produto_resultado['id'],$produto_resultado['nome'],$produto_resultado['descricao'],$produto_resultado['preco_unitario'],$produto_resultado['imagem'],$qtde);
            $_SESSION['carrinho'][$produto_carrinho->id] = $produto_carrinho;
            foreach ($_SESSION['carrinho'] as $item) {
                echo "ID: " .$item->id;
                echo "\nNome: " .$item->nome;

            }
        }
    }


    #if ($_SERVER["REQUEST_METHOD"] == "POST") {
    #    $prod_id = $_POST['id'];

    #}
    ?>
    <table class="table table-striped mb-1">
        <thead class="table-primary">
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Valor Final</th>
            </tr>
        </thead>
        <tbody id="produtos-carrinho">
            
        </tbody>
    </table>
    
</body>
</html>