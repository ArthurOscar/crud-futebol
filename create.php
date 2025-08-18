<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_time = $_POST['nome_time'];
    $cidade_time = $_POST['cidade_time'];

    $sql = "INSERT INTO times(nome,cidade) VALUES('$nome_time','$cidade_time')";
    if($conn -> query($sql) === true){
        echo "Novo registro criado, $nome_time adicionado ao banco de dados";
    } else{
        echo "Erro" . $sql . "<br>" . $conn->error;
    }
    $conn -> close();
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar registros</title>
</head>

<body>
    <form method="POST" action="create.php">
        <label for="times">Adicionar time:</label><br>
        <input type="text" placeholder="Nome" name="nome_time"><br>
        <input type="text" placeholder="Cidade" name="cidade_time"><br>
        <button type="submit" name="botao">Enviar</button>
    </form>
    <a href="read.php">Ver registros</a>
</body>

</html>