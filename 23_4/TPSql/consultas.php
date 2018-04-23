<?php
$base=@mysql_connect("localhost","root","");

switch(2)
{
    case 1:
        $consulta="SELECT * FROM productos";
        $datos=@mysql_db_query("utn",$consulta);
        while($fila=mysql_fetch_object($datos))
        {
            var_dump($fila);
            echo "<br>";
        }
        break;
    case 2:
    echo "adentro";
        $consulta="INSERT INTO productos(pNumero, pNombre, Precio) VALUES (10,'Fideos',30);";
        echo $consulta;
        echo mysql_db_query("utn",$consulta);

        break;
    case 3:
        $consulta="UPDATE envios SET Cantidad=2000 WHERE Cantidad>=1000";
        echo mysql_db_query("utn",$consulta);
        break;
    default:
        echo "hola";
        break;
}


mysql_close($base);
?>