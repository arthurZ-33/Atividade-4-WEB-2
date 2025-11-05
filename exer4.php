<?php 
$nome = "";
$nota1 = "";
$nota2 = "";
$erro = [];

function calcularMedia($nota1, $nota2){
    if($nota1 >= 0 && $nota1 <=10 && $nota2 >= 0 && $nota2 <= 10){
        $media = ($nota1 + $nota2) / 2;
        return['media' => $media];
    }else {
        $erro = "";
        return ['erro' => 'Notas fora do intervalo [0, 10]'];
    }

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $float_options = [
        'options' =>[
            'decimal' => ','
        ]
        ];
        $resultado = ['erro' => ''];

    $nome_text = filter_input(INPUT_POST, 'nome_aluno',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nota1_float = filter_input(INPUT_POST, 'nota1', FILTER_VALIDATE_FLOAT, $float_options);
    $nota2_float = filter_input(INPUT_POST, 'nota2', FILTER_VALIDATE_FLOAT, $float_options);

    if(is_null($nota1_float) || is_null($nota2_float) || is_null($nome_text)){
        $erro[] = "Algum campo de entrada está faltando";
    }elseif($nome_text === false || $nota1_float === false || $nota2_float === false){
        $erro[] = "Erro você utilizou caracteres especiais no campo de nome ou utilizou letras nos formularios de nome";
    }

    if(empty($erro) && $nome_text !== false && $nota1_float !== false && $nota2_float !== false
     && $nome_text !== null && $nota1_float !== null && $nota2_float){
        $resultado = calcularMedia($nota1_float, $nota2_float);

        $media = $resultado['media'];

        echo 'A media do aluno'.$nome_text.'é de :'.$media;
     }
     else{
        if(!empty($resultado['erro'])){ 
            $erro[] = $resultado['erro']; 
       }

       foreach($erro as $msg_erro){
           echo "<li>".$msg_erro."</li>";
       }
     }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 4</title>
</head>
<body>
    <form action="exer4.php" method="post">
        <label for="nome">Insira o nome do aluno</label>
        <input type="text" id="nome" name="nome_aluno">
        <br><br>
        <label for="n1">Insira a primeira nota</label>
        <input type="number" id="n1" name="nota1">
        <br><br>
        <label for="n2">Insira a segunda nota</label>
        <input type="number" id="n2" name="nota2">
        <br><br>
        <button type="submit">Calcular média</button>

    </form>

</body>
</html>