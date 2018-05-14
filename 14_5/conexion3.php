<?php
include_once "cds.php";
try 
{
    //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
    $usuario='root';
    $clave='';
    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
    $sql=$objetoPDO->query('SELECT titel AS titulo,interpret AS interprete,jahr AS anio,id FROM cds');
    while ($a = $sql->fetchObject("cds")) 
    {
        echo $a->Mostrar()."<br>";
    }

} 
catch (PDOException $e) 
{
    echo "Error!!!\n" . $e->getMessage();
}



?>