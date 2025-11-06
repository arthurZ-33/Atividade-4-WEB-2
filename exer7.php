<?php
$resultado = '';
$dia = "";
$erro = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['dia'])) {
        $erro[] = "Campo não preenchido ou formato inválido, seu muggle!";
    } else {

        $dia_raw = filter_input(INPUT_POST, 'dia', FILTER_SANITIZE_NUMBER_INT);
        $dia = (int) $dia_raw;
    }


    if (empty($erro)) {
        switch ($dia) {
            case 1:
                $resultado = "Domingo. Dia de dormir até a hora do almoço. Missão: Nenhuma.";
                break;

            case 2:
                $resultado = "Segunda. Início do pesadelo. Que a Força esteja com você.";
                break;

            case 3:
                $resultado = "Terça. 'Eu sou o inevitável'. Quase no meio.";
                break;

            case 4:
                $resultado = "Quarta. O pico da montanha. É como chegar na metade de um livro do Tolkien.";
                break;

            case 5:
                $resultado = "Quinta. Quase lá! O *boss* final está à vista.";
                break;

            case 6:
                $resultado = "Sexta. GAME OVER (para o trabalho). Vitória!";
                break;

            case 7:
                $resultado = "Sábado. O verdadeiro dia de herói. Seja épico!";
                break;

            default:
                $erro[] = "Número fora de 1 e 7. Por que você está tentando quebrar meu código, seu *hacker* de meia tigela?";
                break;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 7 - O Desafio do Dia</title>
</head>

<body>
    <form action="exer7.php" method="post"> <label for="dia">Digite um número de 1 a 7 para selecionar o dia (Não tente
            trapacear!)</label>
        <input type="number" id="dia" name="dia" value="<?= ($dia_raw ?? '') ?>">

        <button type="submit">Verificar, se você ousar</button>
    </form>

    <?php

    if (!empty($erro)) {
        echo "<p style='color: red; font-weight: bold;'>⚠️ ERRO DE SISTEMA (Ou de Você):</p>";
        echo "<ul>";
        foreach ($erro as $msg) {
            echo "<li>$msg</li>";
        }
        echo "</ul>";
    }

    if (!empty($resultado)) {
        echo "<p style='color: green; font-weight: bold;'>🚀 Resultado Épico:</p>";
        echo "<p>$resultado</p>";
    }
    ?>

</body>

</html>