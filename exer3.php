<?php
$distancia = "";
$consumo = "";
$erro = [];


function calculo_gasolina($distancia, $consumo)
{
    if($consumo <= 0){
        return['media' => 0, 'formatado' => 'Erro: divisão por zero'];
    }

    $media = $distancia / $consumo;
    $formatado = number_format($media,2, ',', '.');
    return ['media' => $media, 'formatado' => $formatado];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $float_options = [
        'options' => [
        'decimal' => ','
        ]
        ];

    $consumo_float = filter_input(INPUT_POST, 'consumo', FILTER_VALIDATE_FLOAT, $float_options);
    $distancia_float = filter_input(INPUT_POST, 'distancia', FILTER_VALIDATE_FLOAT, $float_options);

    if (is_null($consumo_float) || is_null($distancia_float)) {
        $erro[] = "Algum campo de entrada está faltando.";
    }
          elseif ($consumo_float === false || $distancia_float === false){
            $erro[] = "Digite em um formato compativel";
        }
    

    if(empty($erro) && $consumo_float !== false && $distancia_float !== false && $consumo_float !== null && $distancia_float !==false){
        $resultado = calculo_gasolina($distancia_float, $consumo_float);

        $media = $resultado['media'];
        $media_formatada = $resultado['formatado'];

        echo 'Resultado do consumo de combustivel:'.$media_formatada.'Km/L';

    }else {
        $msg_erro = implode("|", $erro);
        echo 'Erro de validação'.$msg_erro;
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 3</title>
</head>

<body>

    <form action="exer3.php" method="POST">
        <label for="distancia_percorrida">Distancia percorrida</label>
        <input type="text" id="distancia_percorrida" name="distancia">
        <br><br>

        <label for="combustivel_gasto">Quantidade de gasto de combustivel</label>
        <input type="text" id="combustivel_gasto" name="consumo">

        <button type="submit">Calcular consumo médio</button>

    </form>

</body>

</html>