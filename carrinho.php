<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <?php
    session_start();
    include 'navbar.php';
    include_once 'conexao.php';

    #$_SESSION['user_id'] = 1; #APENAS PARA TESTE. REMOVER DEPOIS


    #TODO: TRANSFERIR ESSA LÓGICA PARA UM NOVO SCRIPT adicionar_ao_carrinho.php. Depois de adicionar ao carrinho, um modal confirmará a inserção e perguntará se a pessoa deseja ir para o carrinho ou continuar a comprar

    #Se o usuário adicionou um produto novo ao carrinho

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prod_id = $_GET['prodId'];
        $qtde = $_POST['quantidade'];
        $preco_unitario = $_POST['preco_unitario'];

        #Verificar se o produto já está no carrinho
        $sql = "SELECT id, produto_id, quantidade FROM produtos_carrinho WHERE cliente_id = $_SESSION[user_id] AND produto_id = $prod_id";
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
            $sql = "INSERT INTO `produtos_carrinho` (`id`, `cliente_id`, `produto_id`, `quantidade`, `valor_total`) VALUES (NULL, $_SESSION[user_id], $prod_id, $qtde, $valor_total)";
            $produto_carrinhoPDO = $conn->prepare($sql);
            $produto_carrinhoPDO->execute();
        }
    }

    #Puxa a versão atualizada do carrinho do usuário do Banco de Dados
    $sql = "SELECT pc.id, pc.produto_id, prod.imagem, prod.nome, prod.preco_unitario, pc.quantidade, pc.valor_total FROM produtos_carrinho pc INNER JOIN produtos prod ON pc.produto_id = prod.id WHERE pc.cliente_id=$_SESSION[user_id] AND prod.excluido = 0";
    $carrinhoPDO = $conn->prepare($sql);
    $carrinhoPDO->execute();
    $carrinho = $carrinhoPDO->fetchAll();

    #Variável para o valor total no carrinho
    $sub_total = 0;

    ?>
    <table class="table table-striped mb-1">
        <thead class="table-primary">
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Valor Total</th>
                <th>Editar/Excluir</th>
            </tr>
        </thead>
        <tbody id="produtos-carrinho">
            <?php
            foreach($carrinho as $produto){ ?>
                <tr>
                    <td><?php echo $produto['nome']?></td>
                    <td><?php echo $produto['quantidade']?></td>
                    <td>R$ <?php echo number_format($produto['preco_unitario'],2,",")?></td>
                    <td>R$ <?php echo number_format($produto['valor_total'],2,",")?></td>
                    <th>
                        <div class="btn-group">
                            <a class="btn btn-outline-primary btn-sm" href="editar_quantidade_carrinho.php?cod=<?php echo $produto['id'];?>"><i class="bi bi-pencil-square"></i></button>
                            <a class="btn btn-outline-primary btn-sm" href="excluir_produto_carrinho.php?cod=<?php echo $produto['id']; ?>"><i class="bi bi-trash3"></i></a>
                        </div>
                    </th>
                </tr>
            <?php 
                $sub_total += $produto['valor_total'];
            }
            ?>
        </tbody>
    </table>
    <h2>Subtotal: R$ <?php echo number_format($sub_total,2,",")?></h2>
    <div class="d-flex justify-content-center m-5">
        <a href="pedido_finalizado.php" class="btn btn-success mx-3">Fechar o pedido</a>
        <a class="btn btn-danger mx-3">Limpar o carrinho</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>