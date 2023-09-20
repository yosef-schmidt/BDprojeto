<?php

$host = "localhost"; 
$usuario = "yosef"; 
$senha = "sua_senha"; 
$banco = "churrasco"; 

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $opcao = $_POST['opcao'];
    $quantidade = $_POST['quantidade'];

   
    $sql1 = "INSERT INTO convidados (nome) VALUES ('$nome')";

    if ($conn->query($sql1) === TRUE) {
        echo "Nome inserido com sucesso!<br>";
    } else {
        echo "Erro ao inserir o nome: " . $conn->error;
    }

    
    $sql2 = "INSERT INTO comida (quantidade, tipo_de_comida, convidado_id) VALUES ($quantidade, '$opcao', LAST_INSERT_ID())";

    if ($conn->query($sql2) === TRUE) {
        
        echo "Escolha de comida inserida com sucesso!<br>";
    } else {
        
        echo "Erro ao inserir a escolha de comida: " . $conn->error;
    }
}

$conn->close();
?>

