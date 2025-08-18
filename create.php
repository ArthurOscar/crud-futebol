<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['botao_time'])) {
        $nome_time = $_POST['nome_time'];
        $cidade_time = $_POST['cidade_time'];

        $sql = "INSERT INTO times(nome, cidade) VALUES('$nome_time','$cidade_time')";

        if ($conn->query($sql) === true) {
            echo "Registro feito com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: read.php");
    }
    if (isset($_POST['botao_jogadores'])) {
        $nome_jogador = $_POST['nome_jogador'];
        $posicao = $_POST['posicao_jogador'];
        $camisa = $_POST['camisa_jogador'];
        $time = $_POST['ID_time'];


        $sql = "INSERT INTO jogadores(nome, posicao, numero_camisa, time_id) VALUES('$nome_jogador','$posicao','$camisa','$time')";

        if ($conn->query($sql) === true) {
            echo "Registro editado com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: read.php");
    }
    if (isset($_POST['botao_partidas'])) {
        $casa = $_POST['casa'];
        $fora = $_POST['fora'];
        $data = $_POST['data'];
        $gols_casa = $_POST['casa_gols'];
        $gols_fora = $_POST['fora_gols'];

        $sql = "INSERT INTO partidas(time_casa_id,time_fora_id,data_jogo,gols_casa,gols_fora) VALUES('$casa','$fora','$data','$gols_casa','$gols_fora')";

        if ($conn->query($sql) === true) {
            echo "Registro editado com sucesso.";
        } else {
            echo "Erro" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: read.php");
    }
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
        <button type="submit" name="botao_time">Enviar</button>
    </form>
    <form method='POST'>
        <label for='times'>Adicionar Jogadores:</label><br>
        <input type='text' placeholder='Nome' name='nome_jogador'><br>
        <input type='text' placeholder='Posição' maxlenght='3' name='posicao_jogador'><br>
        <input type='number' placeholder='Número camisa' maxlenght='3' name='camisa_jogador'><br>
        <input type="number" placeholder="ID time" name="ID_time"><br>
        <button type='submit' name='botao_jogadores'>Enviar</button>
    </form>
    <form method='POST'>
        <label for='times'>Adicionar Partidas:</label><br>
        <input type='number' placeholder='ID time da casa' name='casa'><br>
        <input type='number' placeholder='ID time de fora' name='fora'><br>
        <input type='date' name='data'><br>
        <input type='number' placeholder='Gols time da casa' name='casa_gols'><br>
        <input type='number' placeholder='Gols time de fora' name='fora_gols'><br>
        <button type='submit' name='botao_partidas'>Enviar</button>
    </form>
    <a href="read.php">Ver registros</a>
</body>

</html>