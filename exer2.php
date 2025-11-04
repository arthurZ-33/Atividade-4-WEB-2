
<?php
$base = "";
$altura = "";
$erro = [];

function calculo($base, $altura) { $area = $base * $altura;
    $perimetro = 2 * ($base + $altura); 
    
    return ['area' => $area, 'perimetro' => $perimetro];}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $base_float = filter_input(INPUT_POST, 'valor_base', FILTER_VALIDATE_FLOAT);

    $altura_float = filter_input(INPUT_POST, 'valor_altura', FILTER_VALIDATE_FLOAT);

    if (is_null($base_float) || is_null($altura_float)) {


        if ($base_float === null || $altura_float === null) {
            $erro[] = "Algum campo não foi enviado.";
        }
        
        if ($base_float === false || $altura_float === false) {
            $erro[] = "Formato inserido inválido, seu bárbaro. Use pontos decimais, não a vírgula do seu país.";
        }
    
    } 


    if (empty($erro) && $base_float !== false && $altura_float !== false && $base_float !== null && $altura_float !== null) {

        $resultado = calculo($base_float, $altura_float);

        $area = $resultado['area'];
        $perimetro = $resultado['perimetro'];
        echo 'Sua área é de: ' . $area . ' metros quadrados e seu perimetro é de: '. $perimetro . ' metros';
    }
}
   



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 2</title>
</head>
<body>
    <form action="exer2.php" method="post">
    
    <label for="base">Insira o valor da base</label>
    <input type="text" id="base" name="valor_base">

    <label for="altura">Insira o valor da altura</label>
    <input type="text" id="altura" name="valor_altura">

    <button type="submit">Calcular a área</button>

    </form>

</body>
</html>

