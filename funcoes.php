<?php 
function geraCoeficienteParcela(float $taxa, int $periodo): float
{
    return pow((1+($taxa/100)),$periodo)/$periodo;
}
echo geraCoeficienteParcela(2.0,6);
?>