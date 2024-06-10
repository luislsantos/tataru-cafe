<?php
session_start();
require_once 'ProdutoCarrinho.php';
include_once 'conexao.php';

// Recupera o carrinho da sessão
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];

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

header('Location: index.php');
exit;
?>