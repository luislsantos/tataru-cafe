<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
    session_start();
    include 'navbar.php';
    include_once 'conexao.php';

    #Verificar se o usuário está logado
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] >= 0) { #Usuário está logado

        #Puxa a versão atualizada da lista de pedidos do usuário do Banco de Dados
        $sql = "SELECT id, `data`, total FROM pedidos WHERE cliente_id=$_SESSION[user_id] ORDER BY `data` DESC ";
        $lista_pedidos = $conn->prepare($sql);
        $lista_pedidos->execute();
        $lista_pedidos = $lista_pedidos->fetchAll();
        ?>

        <table class="table table-striped mb-1">
            <thead class="table-primary">
                <tr>
                    <th>Número do Pedido</th>
                    <th>Data</th>
                    <th>Total(R$)</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody id="lista-produtos">
            <?php
            foreach($lista_pedidos as $pedido) {?>
                <tr>
                    <td><?php echo $pedido['id'] ?></td>
                    <td><?php echo $pedido['data'] ?></td>
                    <td>R$ <?php echo number_format($pedido['total'],2,",") ?></td>
                    <td>
                        <p class="d-inline-flex gap-1">
                        <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#info-ped-<?php echo $pedido['id']?>" aria-expanded="false" aria-controls="info-ped-<?php echo $pedido['id']?>">
                            Detalhamento
                        </button>
                        </p>
                        </td>
                        </tr>
                        <!-- Detalhamento do pedido -->
                        <tr class="collapse" id="info-ped-<?php echo $pedido['id']?>">
                            <td colspan="3">
                            <?php    
                            #Pegar os itens desse pedido
                            $sql = "SELECT prod.nome, ped_prod.preco_unitario, ped_prod.quantidade FROM pedidos_produtos ped_prod INNER JOIN produtos prod ON ped_prod.produto_id = prod.id WHERE ped_prod.pedido_id = $pedido[id]";
                            $produtos_pedido = $conn->prepare($sql);
                            $produtos_pedido->execute();
                            $produtos_pedido = $produtos_pedido->fetchAll();
                            ?>
                                <table class="table ms-5">
                                    <thead>
                                        <th>Produto</th>
                                        <th>Preço Unitário</th>
                                        <th>Quantidade</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($produtos_pedido as $produto){ ?>
                                            <tr>
                                                <td><?php echo $produto['nome']?></td>
                                                <td>R$ <?php echo number_format($produto['preco_unitario'],2,",")?></td>
                                                <td><?php echo $produto['quantidade']?></td>
                                                <td>R$ <?php echo number_format(($produto['preco_unitario']*$produto['quantidade']),2,",")?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <!-- Detalhamento do Pedido -->
            <?php } ?>
            </tbody>
        </table>

    <?php } else {
        #Usuário não está logado
    }

    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>