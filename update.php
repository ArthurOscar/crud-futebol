<?php
include 'db.php';
$id = $_GET['id'];
$tabela = $_GET['table'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($tabela === "times") {
        $nome_time = $_POST['nome_time'];
        $cidade_time = $_POST['cidade_time'];

        $sql = "UPDATE $tabela SET nome ='$nome_time', cidade ='$cidade_time' WHERE id = $id";

        if ($conn->query($sql) === true) {
            echo "Registro editado com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: create.php");
    }
    if ($tabela === "jogadores") {
        $nome_jogador = $_POST['nome_jogador'];
        $posicao = $_POST['posicao_jogador'];
        $camisa = $_POST['camisa_jogador'];


        $sql = "UPDATE $tabela SET nome ='$nome_jogador', posicao ='$posicao', numero_camisa ='$camisa' WHERE id = $id";

        if ($conn->query($sql) === true) {
            echo "Registro editado com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: create.php");
    }
    if ($tabela === "partidas") {
        $casa = $_POST['casa'];
        $fora = $_POST['fora'];
        $data = $_POST['data'];
        $gols_casa = $_POST['casa_gols'];
        $gols_fora = $_POST['fora_gols'];

        $sql = "UPDATE $tabela SET time_casa_id = '$casa', time_fora_id = '$fora', data_jogo= '$data', gols_casa = '$gols_casa', gols_fora = '$gols_fora' WHERE id = $id";

        if ($conn->query($sql) === true) {
            echo "Registro editado com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: create.php");
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <?php
    if($tabela === "times"){
    echo "<form method='POST'>
        <label for='times'>Editar:</label><br>
        <input type='text' placeholder='Nome' name='nome_time'><br>
        <input type='text' placeholder='Cidade' name='cidade_time'><br>
        <button type='submit' name='botao'>Enviar</button>
    </form>";
    }
    if($tabela === "jogadores"){
    echo "<form method='POST'>
        <label for='times'>Editar:</label><br>
        <input type='text' placeholder='Nome' name='nome_jogador'><br>
        <input type='text' placeholder='Posição' maxlenght='3' name='posicao_jogador'><br>
        <input type='number' placeholder='Número camisa' maxlenght='3' name='camisa_jogador'><br>
        <button type='submit' name='botao'>Enviar</button>
    </form>";
    }
    if($tabela === "partidas"){
    echo "<form method='POST'>
        <label for='times'>Editar:</label><br>
        <input type='number' placeholder='ID time da casa' name='casa'><br>
        <input type='number' placeholder='ID time de fora' name='fora'><br>
        <input type='date' name='data'><br>
        <input type='number' placeholder='Gols time da casa' name='casa_gols'><br>
        <input type='number' placeholder='Gols time de fora' name='fora_gols'><br>
        <button type='submit' name='botao'>Enviar</button>
    </form>";
    }
    ?>
</body>

</html>