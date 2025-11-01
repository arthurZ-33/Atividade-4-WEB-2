<?php
// --- BLOCO DE PROCESSAMENTO (PHP) ---
$reais = "";
$resultado_dolar = null; 
$erros = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // se tem um formulário "reais" e "não está vazio" executa este bloco abaixo
    if (isset($_POST['reais']) && !empty(trim($_POST['reais']))) {
        
        // permite usar virgula nos números sem dar pau
        $reais_str = str_replace(',', '.', trim($_POST['reais']));
        //valida números fracionarios
        $reais_valido = filter_var($reais_str, FILTER_VALIDATE_FLOAT);
        
        //se a variavel ter sido retornada false ou se for menor ou igual a zero, executa o bloco abaixo
        if ($reais_valido === false || $reais_valido <= 0) {
            $erros[] = "Valor inválido. Use apenas números (ex: 70.5).";
             // o htmlspecialchars é uma medida de segurança
            $reais = htmlspecialchars(trim($_POST['reais']));
        } else {
            $reais = $reais_valido;
        }
    } else {
        $erros[] = "O campo de reais é obrigatório.";
    }

    //depois das medidas de segurança e validação, aqui vai a parte principal da conta
    if (count($erros) == 0) {
        $cotacao = 5.39; 
        $resultado_dolar = $reais / $cotacao; 


    }

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ex. 3: Cálculo de reais para dolar</title>
 
</head>

<body>

<div>
        <h2>Conversor de real para dólar</h2>


      //mostra os erros na tela em lista
        <?php
        if (count($erros) > 0) {
            echo "<div class='erro'><ul>";
            foreach ($erros as $erro) { echo "<li>$erro</li>"; }
            echo "</ul></div>";
        }
        ?>

        <form method="post" action="">
            <label for="reais">Valor em reais (R$):</label>
            <input type="text" id="reais" name="reais" placeholder="" value="<?= htmlspecialchars($reais) ?>">
            <input type="submit" value="Calcular valor">
        </form>


        //se o resultado for diferente de nulo e não tiver erros, executa o bloco abaixo
        <?php
        if ($resultado_dolar !== null && count($erros) == 0) {

           //formata o resultado para exibir apenas duas casas depois da virgula
            $dolar_formatado = number_format($resultado_dolar, 2, ',', '.');
            echo "<div class='resultado'>";
            //exibe o valor na tela
            echo "O valor de $reais reais em dólar será de: <strong>US$ $dolar_formatado</strong><br>";
            echo "</div>";
            
        }
        ?>
    </div>

    
</body>

</html>