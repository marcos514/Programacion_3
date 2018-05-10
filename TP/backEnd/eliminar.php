<?php
include_once "Empleado.php";
include_once "Persona.php";
include_once "Fabrica.php";
$fabrica=new Fabrica("Marcos S.A",7);
$fabrica->TraerDeArchivo("./archivos/empleados.txt");
$empleadoLugar=$fabrica->GetIndexEmpeado_Legajo((int)$_GET["legajo"]);
if($empleadoLugar!=-1)
{
    $empleado=$fabrica->GetEmpleados()[$empleadoLugar];
    unlink(trim($empleado->GetPathFoto()));
    if($fabrica->EliminarEmpleado($fabrica->GetEmpleados()[$empleadoLugar]))
    {
        

        $fabrica->GuardarEnArchivo("./archivos/empleados.txt");
        echo "<a href='mostrar.php'><h2>Mostrar los empleados</h2></a>";
        echo "<h2><a href='../frontEnd/index.php'>Volver a agregar un empleado</a></h2>";
    }
    else
    {
        echo "<h1>ERROR AL ELIMINAR EL EMPLEADO</h1>";
        echo "<a href='mostrar.php'><h2>Mostrar los empleados</h2></a>";
        echo "<h2><a href='../frontEnd/index.php'>Volver a agregar un empleado</a></h2>";
    }  
}
else
{
    echo "<h1>ERROR AL ELIMINAR EL EMPLEADO</h1>";
    echo "<a href='mostrar.php'><h2>Mostrar los empleados</h2></a>";
    echo "<h2><a href='../frontEnd/index.php'>Volver a agregar un empleado</a></h2>";
}




?>