

<?php
include_once "Empleado.php";
include_once "Persona.php";
include_once "Fabrica.php";
include_once "../backend/validarSesion.php";
$fabrica=new Fabrica("Marcos S.A",7);
$fabrica->TraerDeArchivo("./archivos/empleados.txt");
if(count($fabrica->GetEmpleados())>0)
{
    echo ("<html><head>
    <meta charset='utf-8'/> 
    <title>Formulario Alta Empleado</title>
    <script src='../backend/validarSesion.php'></script>
    <script >
    function AdministrarModificacion(dni)
    {
        document.getElementById('frmDni'+dni).submit();
    }
</script>
    </head><body><h1>Lista Empleados</h1><table  align='center'><tr><td colspan='2'><h2>Info</h2></td></tr><tr><td colspan='2'><hr /></td></tr>");

    $redirigirMod="Location: ../frontEnd/index.php";
    foreach($fabrica->GetEmpleados() as $empleado)
    {
        echo "<tr>
                <td>
                    <h4>".$empleado->ToString()."</h4>
                </td>
                <td>
                    <img src='".$empleado->GetPathFoto()."' width=90px height=90px />
                </td>
                <td>
                    <h6><a href='eliminar.php?legajo=".$empleado->GetLegajo()."'>ELIMINAR</a></td></h6>
                </td>
                <td>
                <form action='../frontEnd/index.php' id='frmDni".$empleado->GetDni()."' name='frmDni".$empleado->GetDni()."' method='post'><input type='button' onclick='AdministrarModificacion(".$empleado->GetDni().")' name='btnModificar' value='Modificar' > <input type='hidden' id='dni' name='dni' value='".$empleado->GetDni()."'/></form>
                </td>
            </tr>";
    }
    echo "<tr><td colspan='2'><hr /></td></tr></table><a href='../frontEnd/index.php'><h2>Volver a agregar un empleado</h2></a>";
}
else
{
    echo ("<html><head>
    <meta charset='utf-8'/> 
    <title>Formulario Alta Empleado</title>
    <script src='./javascript/funciones.js' ></script>
    </head><body><h1>ERROR, NO HAY EMPLEADOS PARA MOSTRAR</h1><a href='../frontEnd/index.php'><h2>Volver a agregar un empleado</h2></a>");
}


?>

