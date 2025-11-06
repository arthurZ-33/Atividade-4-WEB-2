<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Média do Semestre</title>
</head>
<body>

    <div class="container">
        <h1>Média de 5 Notas</h1>
        <p>Insira suas 5 notas. Seja sincero, o computador não julga (eu julgo).</p>

        <form method="post" action="">
            <label for="nota1">Nota 1:</label>
            <input type="number" id="nota1" name="notas[]" required min="0" max="10" step="0.1" value="<?php echo isset($_POST['notas'][0]) ? htmlspecialchars($_POST['notas'][0]) : ''; ?>">

            <label for="nota2">Nota 2:</label>
            <input type="number" id="nota2" name="notas[]" required min="0" max="10" step="0.1" value="<?php echo isset($_POST['notas'][1]) ? htmlspecialchars($_POST['notas'][1]) : ''; ?>">

            <label for="nota3">Nota 3:</label>
            <input type="number" id="nota3" name="notas[]" required min="0" max="10" step="0.1" value="<?php echo isset($_POST['notas'][2]) ? htmlspecialchars($_POST['notas'][2]) : ''; ?>">

            <label for="nota4">Nota 4:</label>
            <input type="number" id="nota4" name="notas[]" required min="0" max="10" step="0.1" value="<?php echo isset($_POST['notas'][3]) ? htmlspecialchars($_POST['notas'][3]) : ''; ?>">

            <label for="nota5">Nota 5:</label>
            <input type="number" id="nota5" name="notas[]" required min="0" max="10" step="0.1" value="<?php echo isset($_POST['notas'][4]) ? htmlspecialchars($_POST['notas'][4]) : ''; ?>">

            <input type="submit" name="calcular" value="Calcular a Realidade">
        </form>

        <hr>

        <?php
        if (isset($_POST['calcular'])) {
            $notas = $_POST['notas'];
            $soma_total = 0;
            $erro = '';

            
            if (count($notas) != 5) {
                $erro = 'Atenção! Esperava-se exatamente 5 notas, mas algo deu errado no envio. A vida é cruel.';
            }

            
            if (!$erro) {
                foreach ($notas as $nota_str) {
                    
                    $nota = (float)$nota_str; 

                    
                    if (!is_numeric($nota_str) || $nota < 0 || $nota > 10) {
                         $erro = 'Uma ou mais notas estão inválidas (não são números ou estão fora do intervalo 0-10). Seu futuro está em risco.';
                         $soma_total = 0; 
                         break; 
                    }

                  
                    $soma_total += $nota;
                }
            }

           
            echo '<h2>Resultado:</h2>';
            
            if ($erro) {
                echo "<p class='resultado reprovado' style='color: #f44336; font-weight: bold;'>$erro</p>";
            } else {
                $quantidade_notas = count($notas);
                $media = $soma_total / $quantidade_notas;
                
               
                $media_formatada = number_format($media, 2, ',', '.');
                
                $mensagem_status = '';
                $classe_status = 'aprovado';

                if ($media >= 7.0) {
                    $mensagem_status = "PARABÉNS! Sua média de **$media_formatada** garante a sua passagem. Você ganhou o jogo.";
                } elseif ($media >= 5.0) {
                    $mensagem_status = "RECUPERAÇÃO. Sua média de **$media_formatada** é medíocre. Estude, você tem uma segunda chance, seu sortudo.";
                    $classe_status = 'reprovado';
                } else {
                    $mensagem_status = "REPROVADO. Sua média de **$media_formatada** é um fracasso esmagador. Boa sorte no próximo semestre. O fracasso é o melhor professor, dizem.";
                    $classe_status = 'reprovado';
                }

                echo "<div class='resultado $classe_status'><p style='font-size: 1.2em;'>$mensagem_status</p></div>";
            }
        }
        ?>

    </div>
</body>
</html>