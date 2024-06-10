<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include 'navbar.php';
    include_once 'conexao.php';

    $USER_ID = 1; #APENAS PARA TESTE. REMOVER DEPOIS

    #TRANSFERIR ESSA LÓGICA PARA UM NOVO SCRIPT adicionar_ao_carrinho.php. Depois de adicionar ao carrinho, um modal confirmará a inserção e perguntará se a pessoa deseja ir para o carrinho ou continuar a comprar

    #Se o usuário adicionou um produto novo ao carrinho

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prod_id = $_GET['prodId'];
        $qtde = $_POST['quantidade'];
        $preco_unitario = $_POST['preco_unitario'];

        #Verificar se o produto já está no carrinho
        $sql = "SELECT id, produto_id, quantidade FROM produtos_carrinho WHERE cliente_id = $USER_ID AND produto_id = $prod_id";
        $produto_carrinhoPDO = $conn->prepare($sql);
        $produto_carrinhoPDO->execute();
        $produto_carrinho = $produto_carrinhoPDO->fetch();
        echo "EXECUTEI";

        #Se estiver, aumentar a quantidade
        if(!empty($produto_carrinho)) {
            echo " ACHEI!";
            $id = $produto_carrinho['id'];
            $qtde += $produto_carrinho['quantidade'];
            $valor_total = $qtde * $preco_unitario;
            echo " QTDE atualizada = " . $qtde;
            $sql = "UPDATE produtos_carrinho SET quantidade = $qtde, valor_total = $valor_total WHERE id = $id";
            $produto_carrinhoPDO = $conn->prepare($sql);
            $produto_carrinhoPDO->execute();

        #Se não estiver, acrescentar
        } else {
            echo "NÃO ACHEI";
            $valor_total = $qtde * $preco_unitario;
            $sql = "INSERT INTO `produtos_carrinho` (`id`, `cliente_id`, `produto_id`, `quantidade`, `valor_total`) VALUES (NULL, $USER_ID, $prod_id, $qtde, $valor_total)";
            $produto_carrinhoPDO = $conn->prepare($sql);
            $produto_carrinhoPDO->execute();
        }
    }
    ?>
    
</body>
</html>