

<?php
include_once "Empleado.php";
include_once "Persona.php";
include_once "Fabrica.php";
$fabrica=new Fabrica("Marcos S.A",7);
$fabrica->TraerDeArchivo("archivo.txt");
$totalEmpleados=$fabrica->GetEmpleados();
$html="Empleados";
for($i=0;$i<count($totalEmpleados)-1;$i++)
{
    $html=$html."<h2><a href='eliminar.php?legajo=".$totalEmpleados[$i]->GetLegajo().">".$totalEmpleados[$i]->ToString()." --- ELIMINAR</a></h2>";
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



<html>
    <body>
        <?php echo $html;?>
    </body>
</html>
