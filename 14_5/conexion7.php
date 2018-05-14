<?php
include_once "cds.php";
try 
{
    //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
    $id=1;
    $usuario='root';
    $clave='';
    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
    $sentencia=$objetoPDO->Prepare('SELECT titel AS titulo,interpret AS interprete,jahr AS anio,id FROM cds WHERE id = :id');
    $sentencia->bindParam("id",$id,PDO::PARAM_INT);
    $sentencia->Execute();
    echo "OBJETO <BR>";
    while ($a = $sentencia->fetchObject("cds")) 
    {
        echo $a->Mostrar();
    }
    
    echo "OBJETO <BR>";
    $id=4;
    $sentencia->Execute();
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