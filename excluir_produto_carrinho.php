<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
        session_start();
        include_once 'conexao.php';

        $delete_cod = $_GET['cod'];
        #Verificar se o código é -1, o que só pode ocorrer se foi pedido para limpar todo o carrinho
        if($delete_cod == -1) { #Se for igual a -1
            $sql = "DELETE FROM produtos_carrinho WHERE cliente_id = '$_SESSION[user_id]'";
        } else { #Se não for igual a 1
            $sql = "DELETE FROM produtos_carrinho WHERE id = '$delete_cod'";
        }

        $excluir_produto = $conn->prepare($sql);
        $excluir_produto->execute();
        header("Location: carrinho.php");
    ?>
    <h5>Produto Excluído</h5>
    <p>O produto foi excluído do seu carrinho com sucesso.</p>
    
</body>
</html>