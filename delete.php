<?php
include 'db.php';
$id = $_GET['id'];
$tabela = $_GET['table'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($tabela === "times") {
        $consulta = $conn->prepare("SELECT COUNT(*) FROM jogadores WHERE time_id = $id");
        $consulta->execute();
        $consulta->bind_result($quantidade);
        $consulta->fetch();
        $consulta->close();

        if ($quantidade > 0) {
            echo "Não é possível excluir este time: existem jogadores vinculados.<br>";
            die("<button><a href='read.php'>Voltar</a></button>");
        }
        $consulta = $conn->prepare("SELECT COUNT(*) FROM partidas WHERE time_casa_id = $id or time_fora_id = $id");
        $consulta->execute();
        $consulta->bind_result($quantidade);
        $consulta->fetch();
        $consulta->close();

        if ($quantidade > 0) {
            echo "Não é possível excluir este time: existem partidas vinculados.<br>";
            die("<button><a href='read.php'>Voltar</a></button>");
        }
    }
    $resposta = $_POST['resposta'];
    if ($resposta === "sim") {
        $sql = "DELETE FROM $tabela WHERE id=$id";
        if ($conn->query($sql) === true) {
            echo "Registro excluído com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    header("Location: read.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
</head>

<body>
    <form method="POST">
        <label for="excluir">Tem certeza que deseja excluir?</label><br>
        <button name="resposta" value="sim">sim</button>
        <button name="resposta" value="nao">não</button>
    </form>
</body>

</html>