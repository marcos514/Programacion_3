<?php
function AdministrarModificacion($dni)
{
    include_once "Empleado.php";
    include_once "Persona.php";
    include_once "Fabrica.php";
    $fabrica=new Fabrica("Marcos S.A",7);
    $fabrica->TraerDeArchivo("./archivos/empleados.txt");
    $echo='<html>
    <head>
        <meta charset="utf-8" />
        <script>
        window.onload=function(){
                    // Una vez cargada la página, el formulario se enviara automáticamente.
            document.forms["frmDni"].submit();
        }
        </script>
    </head>
    <body>
        <form action="../frontEnd/index.php" id="frmDni" name="frmDni" method="post">';

    $input="a";
    foreach($fabrica->GetEmpleados() as $empleado)
    {
        if($empleado->GetDni()==$dni)
        {
            $input="<input type='hidden' id='hdnModificar' value='$dni'/>";
            break;
        }
    }
    if($input=="a")
    {
        $input="<input type='hidden' id='hdnModificar' value='Error'>";
    }

    echo $echo.$input.'</form>
    </body>
    </html>';

}
?>

