<?php

$usuario = "root";
$senha = "";
$banco = "grupo6";
$local_bd = "localhost";

try {
    $conn = new PDO("mysql:host=$local_bd;dbname=" .$banco,$usuario,$senha);
} catch(PDOException $err) {
    echo "Conexão com banco de dados não realizada, erro " . $err->getMessage();
}

?>