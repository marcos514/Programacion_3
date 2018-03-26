<?php
    function PotenciaNumero($base,$exponente)
    {
        return pow($base,$exponente);
    }

    for($i=1;$i<=4;$i++)
    {
        for($j=1;$j<=4;$j++)
        {
            echo $i." elebado a ".$j." es = ". PotenciaNumero($i,$j)."</br>";
        }
        
    }

?>