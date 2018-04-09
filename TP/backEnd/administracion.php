<?php
include_once "Empleado.php";
include_once "Persona.php";

    $sexo=$_POST["cmbSexo"];
    if($sexo=="M")
    {
        $sexo="Masculino";
    }
    else
    {
        $sexo="Femenino";
    }
    $empleado=new Empleado($_POST["txtNombre"],$_POST["txtApellido"],$_POST["txtDni"],$sexo,$_POST["txtLegajo"],$_POST["txtSueldo"],$_POST["rdoTurno"]);
    $archivo=fopen("archivo.txt","a");
    
    fwrite($archivo,$empleado->ToString()."\r\n");




?>