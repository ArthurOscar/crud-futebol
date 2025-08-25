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
            if (isset($_POST['deletarJogadores']) && $_POST['deletarJogadores'] === 'sim') {
                $sql = "DELETE FROM jogadores WHERE time_id=$id";
                if ($conn->query($sql) === true) {
                    echo "Jogadores excluídos com sucesso.<br>";
                } else {
                    echo "Erro: " . $sql . "<br>" . $conn->error;
                }
                header("Location: read.php");
            }
            echo "Não é possível excluir este time: existem jogadores vinculados.<br>";
            echo "<form method='POST'><button name='deletarJogadores' value='sim'>Excluir Jogadores</button><button><a href='read.php'>Voltar</a></button></form>";
            exit;
        }
        $consulta = $conn->prepare("SELECT COUNT(*) FROM partidas WHERE time_casa_id = $id or time_fora_id = $id");
        $consulta->execute();
        $consulta->bind_result($quantidade);
        $consulta->fetch();
        $consulta->close();

        if ($quantidade > 0) {
            if (isset($_POST['deletarPartidas']) && $_POST['deletarPartidas'] === 'sim') {
                $sql = "DELETE FROM partidas WHERE time_casa_id OR time_fora_id=$id";
                if ($conn->query($sql) === true) {
                    echo "Jogadores excluídos com sucesso.<br>";
                } else {
                    echo "Erro: " . $sql . "<br>" . $conn->error;
                }
                header("Location: read.php");
            }
            echo "Não é possível excluir este time: existem partidas vinculados.<br>";
            echo "<form method='POST'><button name='deletarPartidas' value='sim'>Excluir Partidas</button><button><a href='read.php'>Voltar</a></button></form>";
            exit;
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