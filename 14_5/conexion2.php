<?php
try 
{
    //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
    $usuario='root';
    $clave='';
    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
    $sql=$objetoPDO->query('SELECT * FROM cds');
    $result=$sql->fetchAll();
    var_dump($result);
} 
catch (PDOException $e) 
{
    echo "Error!!!\n" . $e->getMessage();
}


?>