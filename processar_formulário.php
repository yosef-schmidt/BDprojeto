<?php
// Conexão com o banco de dados
$host = "localhost"; // Endereço do servidor MySQL
$usuario = "root"; // Nome de usuário do MySQL
$senha = "nova_senha"; // Senha do MySQL
$banco = "churrasco"; // Nome do banco de dados

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o nome do formulário
    $nome = $_POST['nome'];

    // SQL para inserir o nome na tabela
    $sql = "INSERT INTO convidados (nome) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "Nome inserido com sucesso!";
    } else {
        echo "Erro ao inserir o nome: " . $conn->error;
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>
