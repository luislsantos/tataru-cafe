<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-general">
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

        <div class="container text-center w-75 mt-4 px-4" >

            <!-- Cabeçalho da lista de pedidos será organizado pelo grid do Bootstrap, para melhor organizar-->
                    <div class="row pb-3 row-cols-3 border border-3 rounded align-items-center card-custom" >
                        <div class="col"><strong>Número do Pedido</strong></div>
                        <div class="col"><strong>Data</strong></div>
                        <div class="col pe-5"><strong>Total(R$)</strong></div>
                    </div>
    
            <!-- Os pedidos ficarão num Accordion, componente do Bootstrap, para melhor organização -->
            <div class="accordion mt-2" id="accordion-pedidos">
                <?php
                    foreach($lista_pedidos as $pedido) {?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <!-- O data-bs-target e o aria-controls desse botão variam de acordo com o id do pedido. Assim, cada botão apenas abre os detalhes do seu próprio pedido-->
                            <button class="accordion-button collapsed accordion-button-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $pedido['id']?>" aria-expanded="false" aria-controls="collapse-<?php echo $pedido['id']?>">
                                <!-- Dentro do cabeçalho do accordion, serão organizados os itens com o grid do Bootstrap pra espaçar melhor os itens -->
                                <div class="container text-center">
                                    <div class="row row-col-3">
                                            <div class="col pe-5">Pedido nº<?php echo $pedido['id'] ?></div>
                                            <div class="col"><?php echo date_format(date_create($pedido['data']),"d/m/Y")?></div>
                                            <div class="col">R$ <?php echo number_format($pedido['total'],2,",") ?></div>
                                    </div>

                                </div>    
                            </button>
                        </h2>
                        <!-- Aqui fica toda a parte "escondida" do accordion. A primeira div demarca o que vai ser escondido (hidden), e a segunda vai conter o conteúdo em sí -->
                        <div id="collapse-<?php echo $pedido['id']?>" class="accordion-collapse collapse" data-bs-parent="#accordion-pedidos">
                            <div class="accordion-body accordion-body-custom">

                                    <?php    
                                        #Pegar os itens desse pedido
                                        $sql = "SELECT prod.nome, ped_prod.preco_unitario, ped_prod.quantidade FROM pedidos_produtos ped_prod INNER JOIN produtos prod ON ped_prod.produto_id = prod.id WHERE ped_prod.pedido_id = $pedido[id]";
                                        $produtos_pedido = $conn->prepare($sql);
                                         $produtos_pedido->execute();
                                        $produtos_pedido = $produtos_pedido->fetchAll();
                                    
                                        #Vai iterar por cada um dos itens do pedido e colocar cada um deles em uma coluna --->
                                        foreach($produtos_pedido as $produto){ ?>
                                            <div class="container text-center">
                                                <div class="row row-col-4 mb-3">
                                                    <div class="col"><?php echo $produto['nome']?></div>
                                                    <div class="col">R$ <?php echo number_format($produto['preco_unitario'],2,",")?> a unidade</div>
                                                    <div class="col"><?php echo $produto['quantidade']?> unidades</div>
                                                    <div class="col">R$ <?php echo number_format(($produto['preco_unitario']*$produto['quantidade']),2,",")?></div>
                                                </div>
                                            </div>
                                        <?php 
                                        }
                                     ?>

                             </div>
                        </div>
                    </div>
                <?php } 
                ?>
            </div>
        </div>

    <?php } else {
        #Usuário não está logado
    }

    ?>

    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>