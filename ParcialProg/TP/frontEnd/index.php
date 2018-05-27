<?php
include_once "../backend/Fabrica.php";
include_once("../backend/validarSesion.php");

$modificador=isset($_POST["dni"])? true:false;
$alta_baja="Alta Empleado";
$titulo="HTML5 Formulario Alta Empleado";
$dni="";
$apellido="";
$nombre="";
$sexo="<option value='--'>Seleccione</option>
<option value='M' >Masculino</option>
<option value='F'>Femenino</option>";
$legajo="";
$sueldo="";
$maniana="checked='checked'";
$tarde="";
$noche="";
$foto="";
$boton="Enviar ";
$hidden="";

if($modificador==true)
{
    $camb=1;
    $dniPost=$_POST["dni"];
    $fabrica=new Fabrica("Marcos S.A.",7);
    $fabrica->TraerDeArchivo("../backend/archivos/empleados.txt");
    foreach($fabrica->GetEmpleados() as $empleado)
    {
        if($empleado->GetDni()==$dniPost)
        {
            $alta_baja="Modificar Empleado";
            $titulo="HTML5 Formulario Modificar Empleado";
            $dni="value='".$dniPost."' readonly";
            $apellido='value="'.$empleado->GetApellido().'"';
            $nombre="value='".$empleado->GetNombre()."'  ";
            $legajo="value='".$empleado->GetLegajo()."' readonly ";
            $sueldo="value='".$empleado->GetSueldo()."'  ";
            $foto="value='../backEnd/".$empleado->GetPathFoto()."'  ";
            $boton="Modificar ";
            $hidden='<input type="hidden" id="hdnModificar" name="hdnModificar"/>';
            switch ($empleado->GetTurno()) 
            {
                case 'Tarde':
                $maniana="";
                $tarde="checked='checked'";
                    break;
                case 'Noche':
                    $maniana="";
                    $noche="checked='checked'";
                    break;
            }
            switch ($empleado->GetSexo()) 
            {
                case 'Masculino':
                    $sexo="<option value='--'>Seleccione</option>
                    <option value='M' selected>Masculino</option>
                    <option value='F'>Femenino</option>";
                    break;
                case 'Femenino':
                    $sexo="<option value='--'>Seleccione</option>
                    <option value='M' >Masculino</option>
                    <option value='F' selected>Femenino</option>";
                    break;
            }

        }
    }
}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/> 
        <title><?php echo $titulo;?></title>
        <script src="./javascript/funciones.js" ></script>
        
    </head>
    <body>
        
        <h2><?php echo trim($alta_baja);?></h2>
        <form action="../backEnd/administracion.php" id="frmEmpleado" name="frmEmpleado" method="post" enctype="multipart/form-data">
            <?php echo $hidden?>
            <table  align="center">
            <thread>
                <td colspan="3"><h4>Datos Personales</h4></td>
                <tr>
					<td colspan="3"><hr /></td>
				</tr>
            </thread>
            <tr>
                <td>DNI:</td>
               <!--  <td colspan="2" ><input type="text" id="txtDni"/> </td>-->
                <td colspan="2"><input type="number" name="txtDni" id="txtDni" min="1000000" max="55000000" step="1" <?php echo $dni;?> ><span id="spnDni" style="display:none">*</span></td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td colspan="2"><input type="text" id="txtApellido" name="txtApellido" <?php echo $apellido ?>/><span id="spnApellido" style="display:none" >*</span></td>
                
            </tr>
            <tr>
                <td>Nombre:</td>
                <td colspan="2"><input type="text" id="txtNombre" name="txtNombre" <?php echo $nombre ?> /><span id="spnNombre" style="display:none">*</span></td>
            </tr>
            <tr>
                <td>Sexo:</td>
                <td >
                    <select id="cboSexo" name="cmbSexo">
                        <?php echo $sexo;?>
                    </select>
                    <span id="spnSexo" style="display:none">*</span>					
                </td>
            </tr>
            <thread>
                <td colspan="3" ><h4>Datos Personales</h4></td>
                <tr>
					<td colspan="3"><hr /></td>
				</tr>
            </thread>
            <tr>
                <td>Legajo:</td>
                <td colspan="2"><input type="number" name="txtLegajo" id="txtLegajo" min="100" max="550" step="1" <?php echo $legajo;?>><span id="spnLegajo" style="display:none">*</span></td>
            </tr>
            <tr>
                <td>Sueldo:</td>
                <td colspan="2"><input type="number"  id="txtSueldo" name="txtSueldo" min="8000" max="999999999999999999" step="500" <?php echo $sueldo;?>><span id="spnSueldo" style="display:none">*</span> </td>
            </tr>
            <tr>
                <td>Turno:</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td style="text-align:right">
                    <input type="radio" id="tManiana" name="rdoTurno" value="Ma&ntilde;ana" <?php echo $maniana;?> />						
                </td>
                <td colspan="2">Mañana</td>
            </tr>
            <tr>
                <td style="text-align:right">
                    <input type="radio" id="tTarde" name="rdoTurno" value="Tarde" <?php echo $tarde;?>/>						
                </td>
                <td colspan="2">Tarde</td>
            </tr>
             <tr>
                <td style="text-align:right">
                    <input type="radio" id="tNoche" name="rdoTurno" value="Noche" <?php echo $noche;?>/>						
                </td>
                <td colspan="2">Noche</td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td colspan="2"><input type="file" accept="image/*" name="imgEmpleado" id="imgEmpleado" <?php echo $foto;?>></td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right">
                    <input type="reset" value="Limpiar"/>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right">
                    <input type="button" onclick="AdministrarValidaciones()" name="btnEnviar" value=<?php echo $boton;?>/>
                    <!--submit-->
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right">
                    <a href="../backEnd/cerrarSesion.php"><h5>Cerrar Sesion</h5></a>
                </td>
            </tr>
            </table>
            
        </form> 
        
    </body>
</html>
