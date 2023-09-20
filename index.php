<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Churras</title>
</head>
<body>
    <h1>Churrasco do Yosef Schmidt Abreu de Medeiros CPET</h1>
    <form action="processar_formulario.php" method="post">
        <p>Coloque seu nome abaixo:</p>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <p>A carne custa 10 R$, pão com alho 3 R$, qual dos dois você quer ?</p>
        <label>
            <input type="radio" name="opcao" value="carne" required> Carne (10 R$)
        </label>
        <label>
            <input type="radio" name="opcao" value="pao_com_alho" required> Pão com alho (3 R$)
        </label>
        
        <p>Quantidade desejada:</p>
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>
        
        <input type="submit" value="Enviar">
    </form>
    <br>
    <br>
    <a href="http://localhost/processar_formulario.php" target="_blank">
        <button>Consltar convidados e comidas</button>
    </a>
</body>
</html>

</html>