<?php

include "conecta.php";

$consultasql = "select * from funcionario where demissao is null";

$funcionario = $conn ->query($consultasql);

$row = $funcionario -> fetch();

$num_rows = $funcionario -> rowCount();

if(isset($_POST['bt-enviar']))
{

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cargo = $_POST['cargo'];
    $escala= $_POST['escala'];
    $turno = $_POST['turno'];
    $admissao = $_POST['admissao'];
    $salario = $_POST['salario'];
    $vt = $_POST['vt'];
    $vr = $_POST['vr'];
    $va = $_POST['va'];
    $insertsql = "insert cliente (nome, cpf, cargo, escala, turno, admissao, salario, vt, vr, va,)" values ('$nome, $cpf, $cargo, $escala, $turno, $admissao, $salario, $vt, $vr, $va,')
    $resultado = $conn -> query($insertsql);
    header('locations: funcionario.php');

}

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funcionarios (<?php echo $num_rows?>)</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        td{

            border-bottom: 1px solid red;
        }

    </style>
</head>
<body>
       <form action="#" method="post">

        <div class="campo">

        <label for="nome">Nome
            <input type="text" name="nome" id=""></label>

        </div>

        <div class="campo">

        <label for="cpf">Cpf
            <input type="number" name="cpf" id=""></label>

        </div>

        <div>

        <label for="cargo">Cargo
            <input type="text" name="cargo" id=""></label>

        </div>

        <div>

        <label for="escala">Escala
            <input type="text" name="escala" id=""></label>

        </div>

        <div>

        <label for="turno">Turno
            <input type="time" name="turno" id=""></label>

        </div>

        <div>

        <label for="admissao">Admissao
            <input type="text" name="admissao" id=""></label>

        </div>

        <div>

        <label for="salario">Salario
            <input type="float" name="salario" id=""></label>

        </div>

        <div>

        <label for="vt">Vale transporte
            <input type="float" name="vt" id=""></label>

        </div>

        <div>

        <label for="vr">Vale refeição
            <input type="float" name="vt" id=""></label>

        </div>

        <div>

        <label for="va">Vale alimentação
            <input type="float" name="va" id=""></label>

        </div>

        
        nome, cpf, cargo, escala, turno, admissao, salario, vt, vr, va
       </form>  
    
</body>
</html>