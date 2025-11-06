<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Fatorial</title>
</head>
<body>

    <h1>Fatorial de um Número (N!)</h1>
    <p>Insira um número inteiro não-negativo. Se for negativo, você quebra tudo.</p>

    <form method="post" action="">
        <label for="n">Número Inteiro (N):</label>
        <input type="number" id="n" name="n" required min="0" step="1" value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : ''; ?>"><br><br>

        <input type="submit" name="calcular" value="Calcular Fatorial">
    </form>

    <hr>

    <?php
    if (isset($_POST['calcular'])) {
      
        $n = (int)$_POST['n'];
        
        
        $resultado_fatorial = 1;
        
        $saida = ''; 

      
        if ($n < 0) {
            $saida = '**ERRO:** Fatorial não é definido para números negativos. Tente ser mais produtivo.';
        } elseif ($n == 0) {
            
            $saida = "O fatorial de **0** é **1**.";
        } else {
          
            for ($i = $n; $i >= 1; $i--) {
              
                $resultado_fatorial *= $i; 
            }
            

            $fatorial_formatado = number_format($resultado_fatorial, 0, ',', '.');
            
            $saida = "O fatorial de **$n** é **$fatorial_formatado**.";
        }

     
        echo '<h2>Resultado do Cálculo:</h2>';
        
        if (strpos($saida, 'ERRO') !== false) {
            echo "<p style='color: red; font-weight: bold;'>$saida</p>";
        } else {
            echo "<p style='font-size: 1.5em;'>$saida</p>";
        }
    }
    ?>

</body>
</html>