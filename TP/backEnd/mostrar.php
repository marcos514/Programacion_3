

<?php
include_once "Empleado.php";
include_once "Persona.php";
include_once "Fabrica.php";
$fabrica=new Fabrica("Marcos S.A",7);
$fabrica->TraerDeArchivo("archivo.txt");

if(count($fabrica->GetEmpleados())>0)
{
    echo ("<html><head>
    <meta charset='utf-8'/> 
    <title>Formulario Alta Empleado</title>
    <script src='./javascript/funciones.js' ></script>
    </head><body><h1>Lista Empleados</h1><table  align='center'><tr><td colspan='2'><h2>Info</h2></td></tr><tr><td colspan='2'><hr /></td></tr>");

    foreach($fabrica->GetEmpleados() as $empleado)
    {
        echo ("<tr><td><h4>".$empleado->ToString()."</h4></td><td><h4><a href='eliminar.php?legajo=".$empleado->GetLegajo()."'>ELIMINAR</a></td></h4></td></tr>");
    }
    echo "<tr><td colspan='2'><hr /></td></tr></table><a href='../frontEnd'><h2>Volver a agregar un empleado</h2></a>";
}
else
{
    echo ("<html><head>
    <meta charset='utf-8'/> 
    <title>Formulario Alta Empleado</title>
    <script src='./javascript/funciones.js' ></script>
    </head><body><h1>ERROR, NO HAY EMPLEADOS PARA MOSTRAR</h1><a href='../frontEnd'><h2>Volver a agregar un empleado</h2></a>");
}


/*$archivo=fopen("archivo.txt","r");
if($archivo!=null)
{
    while (!feof($archivo)) 
    {
        $comp=true;
        $auxEmpleado=explode(" - ",fgets($archivo));
        for($i=0;$i<count($auxEmpleado)-1;$i++)
        {
            if($auxEmpleado[$i]!="")
            {
                $comp=false;
                break;
                
            }
            $auxEmpleado[$i]=trim($auxEmpleado[$i]);
        }
        if($comp)
        {
            break;
        }
        else
        {
            $empleado=new Empleado($auxEmpleado[1],$auxEmpleado[0],$auxEmpleado[3],$auxEmpleado[2],$auxEmpleado[6],$auxEmpleado[4],$auxEmpleado[5]);
            $fabrica=new Fabrica("Marcos S.A",7);
            $fabrica->TraerDeArchivo("archivo.txt");
            $fabrica->AgregarEmpleado($empleado);
            if()
            {
               
            }
            echo "<h2><a href='eliminar.php?legajo=".echo <?php echo $empleado->GetLegajo();?>.">".$empleado->ToString()."</a></h2>";  
        }
        
    }
    echo "<a href='../frontEnd'><h2>Volver a agregar un empleado</h2></a>";
}
fclose($archivo);*/


?>

