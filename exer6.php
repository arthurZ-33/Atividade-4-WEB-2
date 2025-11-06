<?php 


$numero = null;
$erro = [];
$resultado = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $numero = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT);
    
    
    if ($numero === false || $numero === null) {
     
        $erro[] = "Errou.Insira um número inteiro";
    }


    if (empty($erro)) {
        
        if ($numero % 2 == 0) {
            $resultado = "O número **{$numero}** é PAR. Parabéns pelo básico.";
        } else {
            $resultado = "O número **{$numero}** é ÍMPAR. Uau, que proeza.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 6</title>
</head>
<body>
    
<form action="exer6.php" method="post">
<label for="numero">Digite um número</label>
<input type="number" id="numero" name="n" value="<?=($numero)?>">

<button type="submit">Calcular par ou impar</button>

</form>
<?php
echo "$resultado";
?>

</body>
</html>