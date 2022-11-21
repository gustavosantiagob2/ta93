    <?php 
include "conecta.php";

$consultasql = "SELECT * FROM filme where deleted is null order by lancamento asc,cod_flme asc";
$consultasqlarq = "SELECT * FROM filme where deleted is not null order by lancamento asc, cod_filme asc";

// Buscando e listando os dados da tabela (completa)
$filme = $conn -> query($consultasql);
$filmearq = $conn -> query($consultasqlarq);
 
// separar em linhas
$row = $filme -> fetch();   
$rowarq = $filmearq -> fetch();

// retornando o número de linhas
$num_rows = $filme -> rowCount();
$num_rows_arq = $filmearq -> rowCount();

// buscar filme por id 
$titulo = ""; 
$sinopse = "";
$lancamento = ""; 
$pais_origem = "";
$duracao = "";
$preco = "";
$cod_classificacao = "";
$cod = 0;
if (isset($_GET['codedit']))
{
    $filme = $conn -> query("select * from filme where cod_filme = ".$_GET['codedit']) -> fetch();
    $titulo = $filme['titulo']; 
    $sinopse = $filme['sinopse'];
    $lancamento = $filme['lancamento']; 
    $pais_origem = $filme['pais_origem'];
    $duracao = $filme['duracao'];
    $preco = $filme['preco'];
    $cod_classificacao = $filme['cod_classificacao'];
    $cod = $_GET['codedit'];
}

// arquivando registro de filmes
if (isset($_GET['codarq']))
{
    $filme = $conn -> query("update filme set deleted = now() where cod_cliente =".$_GET['codarq']) -> fetch();
    header('location: filme.php');
}

// restaurando registro de filmes
if (isset($_GET['codrest']))
{
    $filme = $conn -> query("update filme set deleted = null where cod_filme =".$_GET['codrest']) -> fetch();
    header("location: filme.php");
}
 
// excluindo definitivamente registro de filmes
if (isset($_GET['coddel']))
{
    $filme = $conn -> query("deleted from filme where cod_filme=".$_GET['coddel']) -> fetch();
    header("location: filme.php");
}

// atualiza o registro de filme
if (isset($_POST['alterar'])) 
{
    $cod = $_POST['cod'];
    $titulo= $_POST ['titulo'];
    $sinopse = $_POST ['sinopse'];
    $lancamento = $_POST['lancamento'];
    $pais_origem = $_POST['pais_origem'];
    $duracao = $_POST['duracao'];
    $preco = $_POST['preco'];
    $cod_classificacao = $_POST['cod_classificacao'];
    $resultado = $conn -> query("update filme set titulo ='$titulo', sinopse ='$sinopse', lancamento ='$lancamento', pais_origem ='$pais_origem', duracao ='$duracao',  preco ='$preco', cod_classificacao='$cod_classificacao' where cod_filme = $cod");
    header("location: filme.php");
}

if(isset($_POST['inserir']))
{
    $titulo = $_POST ['titulo'];
    $sinopse = $_POST ['sinopse'];
    $lancamento = $_POST ['lancamento'];
    $pais_origem = $_POST ['pais_origem'];
    $duracao = $_POST ['duracao'];
    $preco = $_POST ['preco'];
    $cod_classificacao = $_POST['cod_classificacao'];
    $insertsql = " insert filme (titulo, sinopse, lancamento ,pais_origem, duracao, preco, cod_classificacao) values ('$titulo', '$sinopse', '$lancamento' ,'$pais_origem', '$duracao', '$preco', '$cod_classificacao')";
    $resultado = $conn -> query($insertsql);
    header('location: filme.php');

}
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filmes (<?php echo $num_rows?>) </title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material_Icons" ref="stylesheet">
</head>
<body>

    <form action="filme.php" method="post">

        <div hidden >
            <label for="cod">Código
                <input type="text" name="cod" id="" values= "<?php echo $cod;?>"></label>

        </div>

        <div class="campo">
            <label for="titulo">titulo
                <input type="text" name="titulo" id="" value ="<?php echo $titulo;?>"></label>
        </div>

        <div class="campo">
            <label for="sinopse">sinopse
                <input type="text" name="sinopse" id="" value=" <?php echo $sinopse;?>"></label>
        </div>

        <div class="campo">
        <label for="lancamento">lançamento
            <input type="date" name="lancamento" id="" value="<?php echo $lancamento;?>"></label>
        </div>

        <div class="campo">
        <label for="pais_origem">pais de origem
            <input type="text" name="pais_origem" id="" value="<?php echo $pais_origem;?>"></label> 
        </div>

        <div class="campo">
        <label for="duracao">duração
            <input type="time" name="duracao" id="" value="<?php echo $duracao;?>"></label>
        </div>

        <div class="campo">
        <label for="preco">preço
            <input type="float" name="preco" id="" value="<?php echo $preco;?>"></label>
        </div>

        <div class="campo">
        <label for="cod_classificacao">Cod_classificação
            <input type="text" name="cod_clssificacao" id="" value="<?php echo $cod_classificacao;?>"></label>
        </div>

        <div class="campo">
            <button type="submit" name="<?php echo $cod==0? 'inserir' : 'alterar' ?>"> <?php echo $cod==0? 'Inserir' : 'Alterar'?> </button>
        </div>
    </form>
    <h4>Filmes Cadastrados</h4>
<table class="tabelinha">
<?php if ($num_rows>0) {?>
<thead>
       <th>cod_filme</th>
       <th>titulo</th>
       <th>sinopse</th>
       <th>lancamento</th>
       <th>pais_origem</th>
       <th>duracao</th>
       <th>preco</th>
       <th>cod_classificacao</th>
       <th colspan="2">Ações</th>
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
               <td><a href="filme.php?codedit=<?php echo $row['cod_filme'];?>">Editar</a></td>
                <td><a href="filme.php?codarq=<?php echo $row['cod_filme'];?>">Arquivar</a></td>
                <td><a href="filme.php?codedit=<?php echo $row['cod_filme'];?>"><span class="material-icons">edit</span></a></td>
                <td><a hrerf="filme.php?codarq=<?php echo $row['cod_filme'];?>"><span class="material-icons">drive_file_move_outline</span></a></td>
           </tr>
           <?php } while ($row = $filme->fetch()) ;
            }else{
                echo '<td colspan=5> Não há filmes Cadastrados ativos </td>';
            }
            ?>
       </tbody>
    </table>
    <h4>Filmes Arquivados</h4>
<table class="tabelinha">
    <?php if ($num_rows_arq>0) {?>
        <thead>
        <th>cod_filme</th>
       <th>titulo</th>
       <th>sinopse</th>
       <th>lancamento</th>
       <th>pais_origem</th>
       <th>duracao</th>
       <th>preco</th>
       <th>cod_classificacao</th>
       <th colspan="2">Ações</th>
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
               <td><a href="filme.php?codrest=<?php echo $rowArq['cod_filme'];?>">Restaurar</a></td>
                <td><a href="filme.php?codrest=<?php echo $rowarq['cod_filme'];?>"><span class="material-icons"> restore_page </span>Restaurar</a></td>
                <td><a href="filme.php?coddel=<?php echo $rowarq['cod_filme'];?>">Deletar</a></td> 
            </tr>
        <?php } while ($rowarq = $filmearq -> fetch());
    }else{
        echo '<td colspan=5> Não há Filmes arquivados/td>';
    }?>
                 
        </tbody>

</table>
