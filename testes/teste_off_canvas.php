<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>Teste</h5>
    <p>Isto está em outra página e deveria aparecer no offcanvas</p>
    <button class="btn btn-primary">Botão da outra página</button>
    <?php
    include_once '../conexao.php';
    session_start();

    #Puxa a versão atualizada do carrinho do usuário do Banco de Dados
    $sql = "SELECT pc.id, pc.produto_id, prod.imagem, prod.nome, prod.preco_unitario, pc.quantidade, pc.valor_total FROM produtos_carrinho pc INNER JOIN produtos prod ON pc.produto_id = prod.id WHERE pc.cliente_id=$_SESSION[user_id] AND prod.excluido = 0";
    $carrinhoPDO = $conn->prepare($sql);
    $carrinhoPDO->execute();
    $carrinho = $carrinhoPDO->fetchAll();

    ?>
    <table class="table table-striped mb-1">
        <thead class="table-primary">
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Valor Final</th>
                <th>Editar/Excluir</th>
            </tr>
        </thead>
        <tbody id="produtos-carrinho">
            <?php
            foreach($carrinho as $produto){ ?>
                <tr>
                    <td><?php echo $produto['nome']?></td>
                    <td><?php echo $produto['quantidade']?></td>
                    <td><?php echo $produto['preco_unitario']?></td>
                    <td><?php echo number_format($produto['valor_total'],2,",")?></td>
                    <th>
                        <div class="btn-group">
                            <a class="btn btn-outline-primary btn-sm" href="editar_quantidade_carrinho.php?cod=<?php echo $produto['id'];?>"><i class="bi bi-pencil-square"></i></button>
                            <a class="btn btn-outline-primary btn-sm" href="excluir_produto_carrinho.php?cod=<?php echo $produto['id']; ?>"><i class="bi bi-trash3"></i></a>
                        </div>
                    </th>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</body>
</html>