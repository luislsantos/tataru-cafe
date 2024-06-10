<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-general">
    <?php 
    session_start();
    require_once 'ProdutoCarrinho.php';
    include 'navbar.php';?>
    <?php 
    include_once 'conexao.php';
    ?>
    
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h2>Lista de Produtos</h2>
        </div>
            <?php
                $sql = "SELECT * from produtos WHERE excluido=0 ORDER BY nome";
                $produtos = $conn->prepare($sql);
                $produtos->execute();
                $lista_produtos = [];

                foreach($produtos as $produto) {
                    $novo_produto = new ProdutoCarrinho($produto['id'],$produto['nome'],$produto['descricao'],$produto['preco_unitario'],$produto['imagem'],1);
                    array_push($lista_produtos,$novo_produto);
                    #$lista_produtos[] = $novo_produto;
                }
            ?>
            <div class="row row-cols-1 row-cols-lg-2 g-4 justify-content-center">
                <?php
                foreach($lista_produtos as $produto) { ?>
                <form action="adicionar_ao_carrinho.php" method="POST">
                    <div class="col">
                        <div class="card m-5 p-3">
                        <img src="<?php echo $produto->imagem;?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?php echo $produto->id; ?>">
                                <h5 class="card-title"><?php echo $produto->nome;?></h5>
                                <p class="card-text"><?php echo $produto->descricao;?></p>
                                <p class="card-text">Valor Unitário: R$ <?php echo number_format($produto->preco_unitario,2,",");?></p>
                                <div class="card-footer bg-transparent">
                                    <div class="row">
                                        <label class="col-form-label col-sm-2" for="qtde-<?php echo $produto->id;?>">Qtde:</label>
                                        <div class="col">
                                            <input type="number" name="quantidade" id="qtde-<?php echo $produto->id;?>" class="form-control w-50" value="1">
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-success" type="submit">Adicionar ao carrinho</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php }
                ?>


        

    </div>

</body>
</html>