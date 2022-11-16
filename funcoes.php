<php 
function geraCoeficienteParcela(float $taxa, int $periodo): float
{
    return pow((1+($taxa/100)),$periodo)/$periodo;
}
// echo 600 * geraCoeficienteParcela(1.27,12) * 12;
// echo <br>;
// echo 600 * geraCoeficienteParcela(1.27,12) * 12;
// function atraointervalo($minutos)
{
    // return $minutos>20'atradado!
}

function validadeMatricula(DateTime $data)
{
        $diff = $data -> diif(new DateTime());
        $anos = $diff ->format('%y');
    if ($anos < 6);{
            return 'o garoto não pode ser matriculado';
    {
        else
    {
    
    return 'pode matricular rebento!';
    }
}
validadeMatricula(new DateTime('2020-06-23'));
?>