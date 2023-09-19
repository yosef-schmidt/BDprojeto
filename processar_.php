<?php

$host = "localhost"; 
$usuario = "yosef"; 
$senha = "sua_senha"; 
$banco = "churrasco"; 
echo "deu certo";
$conn = new mysqli($host, $usuario, $senha, $banco);


if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];

    
    $sql = "INSERT INTO convidados (nome) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "Nome inserido com sucesso!";
    } else {
        echo "Erro ao inserir o nome: " . $conn->error;
    }
}


$conn->close();
?>
