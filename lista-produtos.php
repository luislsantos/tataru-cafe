<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-general">
    <?php 
    session_start();
    include_once 'conexao.php';
    include 'navbar.php';
    ?>
    
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h2>Catálogo de Produtos</h2>
        </div>
        <?php
            $sql = "SELECT * from produtos WHERE excluido=0 ORDER BY nome";
            $produtos = $conn->prepare($sql);
            $produtos->execute();
        ?>
        <div class="row row-cols-1 row-cols-lg-2 g-4 justify-content-center">
            <?php
            foreach($produtos as $produto) { ?>
            <form action="carrinho.php?prodId=<?php echo $produto['id'];?>" method="POST">
                <div class="col">
                    <div class="card card-custom m-5 p-3">
                        <img src="<?php echo $produto['imagem'];?>" class="card-img-top" alt="..." height="400">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produto['nome'];?></h5>
                            <p class="card-text"><?php echo $produto['descricao'];?></p>
                            <input type="hidden" name="preco_unitario" value="<?php echo $produto['preco_unitario'] ?>">
                            <p class="card-text">Valor Unitário: R$ <?php echo number_format($produto['preco_unitario'],2,",");?></p>
                            <div class="card-footer bg-transparent">
                                <div class="row pt-3 align-items-center">
                                    <label class="col-form-label col-sm-2" for="qtde-<?php echo $produto['id'];?>">Qtde:</label>
                                    <div class="col">
                                        <input type="number" name="quantidade" id="qtde-<?php echo $produto['id'];?>" class="form-control w-50 form-field-custom" value="1" min="1">
                                    </div>
                                    <div class="col">
                                        <?php if(isset($_COOKIE['token_sessao'])) {?>
                                            <button class="btn btn-lg btn-primary" type="submit">Adicionar ao carrinho</button>
                                        <?php } else{?>
                                            <a href="cadastro.php" class="btn btn-lg btn-primary">Cadastre-se</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php }?>
        </div>

    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>