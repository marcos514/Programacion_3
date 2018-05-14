<?php
try 
{
    //CREO INSTANCIA DE PDO, INDICANDO ORIGEN DE DATOS, USUARIO Y CONTRASEÑA
    $id=1;
    $usuario='root';
    $clave='';
    $objetoPDO = new PDO('mysql:host=localhost;dbname=cdcol;charset=utf8', $usuario, $clave);
    $sentencia=$objetoPDO->Prepare('SELECT titel AS titulo,interpret AS interprete,jahr AS anio,id FROM cds where id= :id');
    $sentencia->bindValue("id",1);
    $sentencia->bindColumn(1,$columnaTitulo);
    $sentencia->bindColumn(2,$columnaInterprete);
    $sentencia->bindColumn(3,$columnaAnio);
    $sentencia->bindColumn(4,$columnaId);
    $sentencia->Execute();
    echo "DE UNA <BR>";
    while ($sentencia->fetch(PDO::FETCH_BOUND)) 
    {
        echo "Titulo: ".$columnaTitulo." - Interprete: ". $columnaInterprete ." - Año: ". $columnaAnio ." - Id: ".$columnaId."<br>";
    }
    $sentencia->bindValue("id",4);
    $sentencia->Execute();
    echo "DE UNA <BR>";
    while ($a=$sentencia->fetch(PDO::FETCH_BOUND)) 
    {
        echo "Titulo: ".$a["titulo"]." - Interprete: ". $a["interprete"] ." - Año: ". $a["anio"] ."<br>";
        echo "Titulo: ".$columnaTitulo." - Interprete: ". $columnaInterprete ." - Año: ". $columnaAnio ." - Id: ".$columnaId."<br>";
        var_dump($a["titulo"]);
    }

} 
catch (PDOException $e) 
{
    echo "Error!!!\n" . $e->getMessage();
}



?>