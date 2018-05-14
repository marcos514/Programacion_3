<?php
session_start();
include_once "Empleado.php";
include_once "Persona.php";
include_once "Fabrica.php";
$verPost=isset($_POST)? true:false;
if($verPost!=false)
{
    $dni=$_POST["txtDni"];
    $apellido=$_POST["txtApellido"];
    
    $fabrica=new Fabrica("Marcos S.A",7);
    $fabrica->TraerDeArchivo("./archivos/empleados.txt");
    if($fabrica->GetIndexEmpleado_DniApellido($dni,$apellido)>=0)
    {
        $_SESSION["DNIEmpleado"]="log";
        header("Location: ./mostrar.php");
    }
    else
    {
        echo "<a href='../frontEnd/login.html'>Error LogIn volver a ingresar</a>";
    }
}
else
{
    echo "<a href='../frontEnd/login.html'>Error LogIn volver a ingresar</a>";
}


?>