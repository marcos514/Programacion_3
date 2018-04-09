<?php
$archivo=fopen("./MisArchivos/palabras.txt","r");
$uno=0;
$dos=0;
$tres=0;
$cuatro=0;
$mascuatro=0;
//echo "<table align='center'>";

while(!feof($archivo))
{
    $palabra= fgets($archivo);
    $palabra=trim($palabra);
    $palabra=substr($palabra,0,strlen($palabra)); 

    $cantLetras=strlen($palabra);
    
    if($cantLetras==1)
    {
        $uno++;
    }
    else if($cantLetras==2)
    {
        $dos++;
    }
    else if($cantLetras==3)
    {
        $tres++;
    }
    else if($cantLetras==4)
    {
        $cuatro++;
    }
    else if($cantLetras>4)
    {
        $mascuatro++;
    }
    //echo "<tr><td>".$palabra."</td><td>".$cantLetras."</td></tr>";
}
fclose($archivo);
?>
<!DOCTYPE html>
<html>
<body>
    <table border="1" align="center">
        <thread>
            <td>Una</td>
            <td>Dos</td>
            <td>Tres</td>
            <td>Cuatro</td>
            <td>Mayor a 4</td>
        </thread>
        <tr>
            <td><?php echo $uno;?></td>
            <td><?php echo $dos;?></td>
            <td><?php echo $tres;?></td>
            <td><?php echo $cuatro;?></td>
            <td><?php echo $mascuatro;?></td>
        </tr>
    </table>
</body>
</html>
