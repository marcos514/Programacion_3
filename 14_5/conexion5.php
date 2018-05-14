<?php
include_once "cds.php";
try 
{
    //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
    $usuario='root';
    $clave='';
    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
    $sentencia=$objetoPDO->Prepare('SELECT titel AS titulo,interpret AS interprete,jahr AS anio,id FROM cds');
    $sentencia->Execute();
    echo "OBJETO <BR>";
    while ($a = $sentencia->fetchObject("cds")) 
    {
        echo $a->Mostrar();
    }

} 
catch (PDOException $e) 
{
    echo "Error!!!\n" . $e->getMessage();
}



?>