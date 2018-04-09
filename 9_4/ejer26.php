<?php
$alta = isset($_POST["guardar"]) ? TRUE : FALSE;

if($alta)
{
    $archivo=fopen("./MisArchivos/ejer26.txt","w");
    fwrite($archivo,$_POST["escritor"]);
    fclose($archivo);
    $dia=date("o_M_W_D_H_i_s");
    copy("./MisArchivos/ejer26.txt","./MisArchivos/".$dia.".txt");
}



?>
<!DOCTYPE html>
<html>
<body>
    <form method="post">
    <table>
        <tr>
            <td>
                <input type="text" id="escritor" name="escritor">
                <input type="submit" name="guardar" />
            </td>
        </tr>
    </table>


    </form>
    
</body>
</html>