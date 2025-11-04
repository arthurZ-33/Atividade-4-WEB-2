<?php 
//processamento
$reais = "";
$dolar = null;
$erros = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $reais_double = filter_input(INPUT_POST, 'valor_reais', FILTER_VALIDATE_FLOAT);

    if($reais_double === null){
        if(empty(trim($_POST['valor_reais'] ?? ''))){
            $erros[] = "O campos Reais não pode ser vazio.";
        }
    }elseif($reais_double === false){
        $erros[] = "Valor inserido não é um numero válido. Use pontos decimais";
    } 

    if(empty($erros) && $reais_double !== false && $reais_double !== null){
        $taxa_dolar = 5.00;
        $dolar = $reais_double / $taxa_dolar;
        echo 'Seu valor em reais'.$reais_double.'convertido para dólar é: '.$dolar;
    }

    }
?>

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
<button type="submit">Calcular Dólar</button>
</form>

</body>
</html>
