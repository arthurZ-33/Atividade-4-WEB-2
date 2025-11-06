<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Compras Automatizada</title>
</head>
<body>

    <div class="container">
        <h1>Lista de Compras (Selecione o que Falta)</h1>
        <p>Marque os itens que você precisa desesperadamente.</p>

        <form method="post" action="">
            
            <label>
                <input type="checkbox" name="itens[]" value="Arroz" 
                <?php echo (isset($_POST['itens']) && in_array('Arroz', $_POST['itens'])) ? 'checked' : ''; ?>>
                Arroz (O Básico)
            </label>
            
            <label>
                <input type="checkbox" name="itens[]" value="Feijão"
                <?php echo (isset($_POST['itens']) && in_array('Feijão', $_POST['itens'])) ? 'checked' : ''; ?>>
                Feijão (O Complemento)
            </label>
            
            <label>
                <input type="checkbox" name="itens[]" value="Leite"
                <?php echo (isset($_POST['itens']) && in_array('Leite', $_POST['itens'])) ? 'checked' : ''; ?>>
                Leite (Para o Café da Manhã)
            </label>
            
            <label>
                <input type="checkbox" name="itens[]" value="Ovos"
                <?php echo (isset($_POST['itens']) && in_array('Ovos', $_POST['itens'])) ? 'checked' : ''; ?>>
                Ovos (Proteína Essencial)
            </label>
            
            <label>
                <input type="checkbox" name="itens[]" value="Refrigerante Nerd"
                <?php echo (isset($_POST['itens']) && in_array('Refrigerante Nerd', $_POST['itens'])) ? 'checked' : ''; ?>>
                Refrigerante Nerd (Combustível)
            </label>

            <input type="submit" name="enviar" value="Gerar Lista Final">
        </form>

        <hr>

        <?php
        if (isset($_POST['enviar'])) {
            
            if (isset($_POST['itens'])) {
                $itens_selecionados = $_POST['itens'];
                
                echo '<div class="resultado">';
                echo '<h2>Itens selecionados:</h2>';

                echo '<ul>';
                foreach ($itens_selecionados as $item) {
                    echo "<li>**$item**</li>";
                }
                echo '</ul>';
                
                echo '</div>';
            
            } else {
                echo '<div class="resultado">';
                echo '<p style="color: orange; font-weight: bold;">Você não selecionou NADA. Sua geladeira está cheia ou você vai passar fome?</p>';
                echo '</div>';
            }
        }
        ?>

    </div>
</body>
</html>