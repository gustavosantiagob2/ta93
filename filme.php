<?php 
include "conecta.php";

$consultasql = "SELECT * FROM FILME ORDER BY LANCAMENTO DESC";

$filme = $conn -> query($consultasql);

$row = $filme -> fetch();   

$num_rows = $filme -> rowCount();
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filmes</title>
</head>
<body>
    <table>

         <thead>
                <th>cod_filme</th>
                <th>titulo</th>
                <th>sinopese</th>
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
                        <td><?php echo $row['sinopese']?></td>
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
