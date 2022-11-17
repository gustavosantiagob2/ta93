<?php 
include "conecta.php";
    // criando a consulta SQL
    $consultasql = "SELECT * FROM cliente order by nome asc,cod_cliente asc";

    // Buscando e listando os dados da tabela (completa)
    $lista = $conn->query($consultasql);

    // separar em linhas

    $row = $lista->fetch();
    //print_r($row);

    // retornando o número de linhas
    $num_rows = $lista-> rowCount();


    if(isset($_POST['bt-enviar']))
    {

        $nome = $_POST ['nome'];
        $cpf = $_POST['cpf'];
        $insertSql = "insert cliente (nome, cpf) values ('$nome','$cpf')"; 
        $resultado = $conn -> query($insrtSql);
        header('location: cliente.php');

    }




?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes (<?php echo $num_rows?>)</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        td{
            border-bottom: 1px solid red;
        }
    </style>
</head>
<body>
        
        <form action="#" method="post">

            <div hidden >
                <label for="cod">Código
                    <input type="text" name="Cod" id=""></label>
            </div>

            <div class="campo">
                <label for="Nome">Nome
                    <input type="text" name="nome" id=""></label>
            </div>

            <div class="campo">
                 <label for="cpf">CPF
                    <input type="number" name="cpf" id=""></label>
            </div>

            <div class="campo">

                <button type="submit" name="bt-enviar">Enviar</button>
            </div>
        </form>
    <table class="tabelinha td">


        <thead>

                <th>Cod</th>
                <th>Nome</th>
                <th>CPF</th>

        </thead>
        <tbody>

                <?php do {?>

                        <tr>
                            <td>
                                <?php 
                                    echo $row['cod_cliente'];   
                                ?>
                            </td>

                            <td>
                                <?php 
                                    echo $row['nome'];
                                ?>
                            </td>

                            <td>
                                <?php 
                                    echo $row['cpf'];
                                ?>
                            </td>

                        </tr>


                <?php } while ($row = $lista->fetch()) ?>

       </tbody>



    </table>
    
</body>
</html>