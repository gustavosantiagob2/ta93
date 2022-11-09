<?php 
    include 'config.php';
    $dataAtual = new DateTime();

    print_r($dataAtual);
    echo '<br>';
    echo $dataAtual->format('d/m/y');
    echo '<br>';
    $dias = 30;

    for ($i=1; $i < 3; $i++) 
    {
        
        echo $i. 'ª parcela - '.(new DateTime('+'.$i. 'month')) -> format ('d/m/Y');
        $dias += 30; // $dias = dias +30;
        echo '<br>';
    }
         
    echo '<br>';
    $dataSistema = new DateTime();
    $dataNasc = new DateTime('2004/03/29');
    print_r($dataNasc);
    echo '<br>';
    $intervalo = $dataNasc -> diff($dataSistema);
    print_r($intervalo);
    echo $intervalo -> format('%y anos, %m meses e %d dias ');


    
?>