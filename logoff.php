<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deysi Trufas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-general">
    <?php
    include 'navbar.php';
    include_once 'conexao.php';

    if(isset($_COOKIE['token_sessao']))  {
        echo "Reconheci que há um token salvo nos cookies";
        $token_sessao = $_COOKIE['token_sessao'];

        $sql = "DELETE FROM sessoes WHERE token = '$token_sessao'";
        $deleta_token = $conn->prepare($sql);
        $deleta_token->execute();
        echo "Token deletado do banco";
        setcookie('token_sessao','',time() - 3600);
        $_SESSION['user_id'] = -1;
        header("Location: index.php");
        header("refresh:0");
    }

    ?>
    <h1>Sessão Encerrada</h1>
    <p>Você foi deslogado. Até a próxima!</p>
    
</body>
</html>