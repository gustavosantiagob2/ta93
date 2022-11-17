<?php 
include "conecta.php";

$consultasql = "SELECT * FROM FILME ORDER BY LANCAMENTO DESC";

$filme = $conn -> query($consultasql);

$row = $filme -> fetch();   

$num_rows = $filme -> rowCount();


if(isset($_POST['bt-enviar']))
{
    $cod_filme = $_POST ['cod_filme'];
    $titulo = $_POST ['titulo'];
    $sinopse = $_POST ['sinopse'];
    $lancamento = $_POST ['lancamento'];
    $pais_origem = $_POST ['pais_origem'];
    $duracao = $_POST ['duracao'];
    $preco = $_POST ['preco'];
    $insertsql = " insert filme (cod_filme ,titulo, sinopse, lancamento ,pais_origem, duracao, preco) values ( '$cod_filme','$titulo', '$sinopse', '$lancamento' ,'$pais_origem', '$duracao', '$preco')";
    $insertsql = $conn -> query($insertsql);
    header('location: filme.php');

}
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filmes</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        td{
            border-bottom: 1px solid red ;
        }
    </style>
</head>
<body>

    <form action="#" method="post">

        <div class="campo">
            <label for="titulo">titulo
                <input type="text" name="titulo" id=""></label>
        </div>

        <div class="campo">
            <label for="sinopse">sinopse
                <input type="text" name="sinopse" id=""></label>
        </div>

        <div class="campo">
        <label for="lancamento">lançamento
            <input type="date" name="lancamento" id=""></label>
        </div>

        <div class="campo">
        <label for="pais_origem">pais de origem
            input type="text" name="pais_origem" id=""></label> 
        </div>

        <div class="campo">
        <label for="duracao">duração
            <input type="time" name="duracao" id=""></label>
        </div>

        <div class="campo">
        <label for="preco">preço
            <input type="float" name="preco" id=""></label>
        </div>

        <div class="campo">
            <button type="submit" name="bt-enviar">Enviar</button>
        </div>
    </form>

  
<table class="tabelinha td ">

<thead>
       <th>cod_filme</th>
       <th>titulo</th>
       <th>sinopse</th>
       <th>lancamento</th>
       <th>pais_origem</th>
       <th>duracao</th>
       <th>preco</th>
       <th>cod_classificacao</th>
       </thead> 



       <tbody>
           <?php do {?>
           <tr>

               <td><?php echo $row['cod_filme']?></td> 
               <td><?php echo $row['titulo']?></td>
               <td><?php echo $row['sinopse']?></td>
               <td><?php echo $row['lancamento']?></td>
               <td><?php echo $row['pais_origem']?></td>
               <td><?php echo $row['duracao']?></td>
               <td><?php echo $row['preco']?></td>
               <td><?php echo $row['cod_classificacao']?></td>


           </tr>
           <?php } while ($row = $filme->fetch()) ?>

       </tbody>
  
</table>
    
</body>
</html>
