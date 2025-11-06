<?php 
$ano_nascimento = "";
$erro = [];


function calculoIdade($ano_nascimento){
    $idade = 2025 - $ano_nascimento;
    return ['idade' => $idade];
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ano_nascimento = filter_input(INPUT_POST, 'ano_nascimento', FILTER_SANITIZE_NUMBER_INT);

    if(is_null($ano_nascimento)){
        $erro[]= "Erro o campo está faltando";
    }elseif($ano_nascimento === ""){
        $erro[]= "Erro, digite números inteiros";
    }
    if(empty($erro) && $ano_nascimento >= 2025){
        $erro[] = "Sério isso?Você não é mais uma criança de 12 anos pra dizer que nasceu em 1500 e bolinha!";
    }


    if(empty($erro) && $ano_nascimento !== false && $ano_nascimento !== null){
        $resultado = calculoIdade($ano_nascimento);
       $idade = $resultado['idade'];


       if(is_numeric($idade)){
        if($idade >= 18 && $idade < 70){
            echo 'Voto obrigatorio xiruzão, você já está com '.$idade.' na cara';
           }elseif($idade <= 16 || $idade >= 70){
            echo "Não pode votar por que você saiu das fraldas ontem ou ta fazendo hora extra na terra";
           }elseif($idade >= 16 && $idade <= 18){
            echo "Se decide se você vai sair ou não das fraldas guri!";
           }
       }
       
    }


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