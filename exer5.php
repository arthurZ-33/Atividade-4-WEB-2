<?php 
$ano_nascimento = "";
$erro = [];


function calculoIdade($ano_nascimento){
    $ano_atual = date('Y')/
    $idade = $ano_nascimento - $ano_atual;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 5</title>
</head>
<body>

<form action="exer5.php" method="post">
<label for="ano">Insira seu ano de nascimento</label>
<input type="text" id="ano" name="ano_nascimento">

<br><br>

<button type="submit">Verifique se é possivel votar</button>

</form>

</body>
</html>