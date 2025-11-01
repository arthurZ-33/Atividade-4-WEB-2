<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="exer1.php"  method="post">
<label for="reais">Insira o valor em reais</label>
<input type="text" id="reais" name="valor_reais">

</form>

</body>
</html>

<?php 
//processamento
$reais = "";
$dolar = null;
$erros = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST{'reais'}) && !empty(trim($_POST['reais']))){
        $reais_str = str_replace(',', '.', trim($_POST['reais']));
        $reais_validados = filter_var($reais_str, FILTER_VALIDATE_FLOAT);

    }
}



?>