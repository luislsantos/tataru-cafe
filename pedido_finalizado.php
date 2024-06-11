<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalização de Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        session_start();
        include 'navbar.php';
        include_once 'conexao.php';

        #Pegar o carrinho do usuário
        $sql = "SELECT pc.id, pc.produto_id, prod.imagem, prod.nome, prod.preco_unitario, pc.quantidade, pc.valor_total FROM produtos_carrinho pc INNER JOIN produtos prod ON pc.produto_id = prod.id WHERE pc.cliente_id=$_SESSION[user_id] AND prod.excluido = 0";
        $carrinho = $conn->prepare($sql);
        $carrinho->execute();
        $carrinho = $carrinho->fetchAll();

        #Verificar se o usuário tem produtos no carrinho
        if(!empty($carrinho)) { #Existem produtos no carrinho
            #Criar um novo pedido para o usuário
            $sql = "INSERT INTO pedidos (id, cliente_id, `data`, apagado) VALUES (NULL, $_SESSION[user_id], NOW(), 0)";
            $novo_pedido = $conn->prepare($sql);
            $novo_pedido->execute();
    
            #Pegar o id desse último pedido
            $sql = "SELECT id FROM pedidos WHERE cliente_id = $_SESSION[user_id] ORDER BY id DESC LIMIT 0,1";
            $pedido_id = $conn->prepare($sql);
            $pedido_id->execute();
            $pedido_id = $pedido_id->fetch(PDO::FETCH_ASSOC);

            #Criar variável para armazenar o valor total do pedido
            $valor_final = 0;
    
            #Registrar cada um dos produtos associados ao pedido na tabela associativa
            foreach($carrinho as $produto) {
                $valor_final += $produto['valor_total'];
                $sql = "INSERT INTO pedidos_produtos (id, pedido_id, produto_id, preco_unitario, quantidade) VALUES (NULL, $pedido_id[id],$produto[produto_id],$produto[preco_unitario],  $produto[quantidade])";
                $produto_pedido = $conn->prepare($sql);
                $pedido_realizado = $produto_pedido->execute();
            }

            #Atualizar o registro do pedido com o valor total
            $sql = "UPDATE pedidos SET total = $valor_final WHERE id = $pedido_id[id]";
            $atualiza_valor = $conn->prepare($sql);
            $atualiza_valor->execute();
    
            #Limpar o carrinho do usuário
            $sql = "DELETE FROM produtos_carrinho WHERE cliente_id=$_SESSION[user_id]";
            $carrinho = $conn->prepare($sql);
            $carrinho->execute();
    
            #echo $pedido_id['id'];
            ?> 
            <h1>Muito obrigado!</h1>
            <p>Seu pedido já foi recebido e começaremos a prepará-lo em breve. Manteremos você atualizado por e-mail!</p>
            <?php

        } else {
            #Não existem produtos no carrinho
            echo "O seu carrinho está vazio!";
        }
        
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>