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
$sql3 = "SELECT quantidade, tipo_de_comida, c.nome FROM comida AS cm
        INNER JOIN convidados AS c ON cm.convidado_id = c.id";
$resultado = $conn->query($sql3);
$totalcarne=0;
$totalpao=0;
if ($resultado->num_rows > 0) {
    // Loop através dos resultados
    while ($linha = $resultado->fetch_assoc()) {
        $quantidade = $linha["quantidade"];
        $tipo_de_comida = $linha["tipo_de_comida"];
        $nomeConvidado = $linha["nome"];
        if($tipo_de_comida=="carne"){
            $totalcarne=$totalcarne+$quantidade;
        }
        if($tipo_de_comida=="pao_com_alho"){
            $totalpao=$totalpao+$quantidade;    
        }   
    }
        echo "O convidado $nomeConvidado pediu $quantidade de $tipo_de_comida <br>";
       
    $valortol=$totalpao*3+$totalcarne*10;
    echo "Vai custar no total o churrasco $valortol de reais"; 
} else {
    echo "Nenhum registro encontrado na tabela 'comida'";
}

$conn->close();
?>
