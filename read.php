<?php
include 'db.php';

$sql = "SELECT * FROM times";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "TIMES:<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo " <tr>
                        <td> {$row['id']} </td>
                        <td> {$row['nome']} </td>
                        <td> {$row['cidade']} </td>
                        <td>
                            <a href='update.php?id={$row['id']}&&table=times'>Editar<a>
                            <a href='delete.php?id={$row['id']}&&table=times'>Excluir</a>
                        </td>
                    </tr>";
    }
    echo "</table><br>";
} else {
    echo "Nada encontrado";
}

$sql = "SELECT * FROM jogadores";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "JOGADORES:<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Posição</th>
            <th>Número da camisa</th>
            <th>ID do time</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo " <tr>
                        <td> {$row['id']} </td>
                        <td> {$row['nome']} </td>
                        <td> {$row['posicao']} </td>
                        <td> {$row['numero_camisa']} </td>
                        <td> {$row['time_id']} </td>
                        <td>
                            <a href='update.php?id={$row['id']}&&table=jogadores'>Editar<a> |
                            <a href='delete.php?id={$row['id']}&&table=jogadores'>Excluir</a>
                        </td>
                    </tr>";
    }
    echo "</table><br>";
} else {
    echo "Nada encontrado";
}

$sql = "SELECT * FROM partidas";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "PARTIDAS:<table border='1'>
        <tr>
            <th>ID</th>
            <th>ID time da casa</th>
            <th>ID time de fora</th>
            <th>Data</th>
            <th>Gols time da casa</th>
            <th>Gols time de fora</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo " <tr>
                        <td> {$row['id']} </td>
                        <td> {$row['time_casa_id']} </td>
                        <td> {$row['time_fora_id']} </td>
                        <td> {$row['data_jogo']} </td>
                        <td> {$row['gols_casa']} </td>
                        <td> {$row['gols_fora']} </td>
                        <td>
                            <a href='update.php?&id={$row['id']}&&table=partidas'>Editar<a>
                            <a href='delete.php?&id={$row['id']}&&table=partidas'>Excluir</a>
                        </td>
                    </tr>";
    }
    echo "</table>";
}

$conn->close();
