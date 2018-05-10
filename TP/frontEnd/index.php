<?php
include_once "../backend/Fabrica.php";
include_once "../backend/validarSesion.php";
$modificador=isset($_POST)? true:false;
if($modificador)
{

    $fabrica=new Fabrica("Marcos S.A.",7);
    $fabrica->TraerDeArchivo("../backend/archivo.txt");
}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/> 
        <title>Formulario Alta Empleado</title>
        <script src="./javascript/funciones.js" ></script>
        
    </head>
    <body>
        
        <h2>Alta Empleados</h2>
        <form action="../backEnd/administracion.php" id="frmEmpleado" name="frmEmpleado" method="post" enctype="multipart/form-data">
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
                <td colspan="2"><input type="number" name="txtDni" id="txtDni" min="1000000" max="55000000" step="1"><span id="spnDni" style="display:none">*</span></td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td colspan="2"><input type="text" id="txtApellido" name="txtApellido"/><span id="spnApellido" style="display:none">*</span></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td colspan="2"><input type="text" id="txtNombre" name="txtNombre"/><span id="spnNombre" style="display:none">*</span> </td>
            </tr>
            <tr>
                <td>Sexo:</td>
                <td >
                    <select id="cboSexo" name="cmbSexo">
                        <option value="--">Seleccione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
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
                <td colspan="2"><input type="number" name="txtLegajo" id="txtLegajo" min="100" max="550" step="1"><span id="spnLegajo" style="display:none">*</span></td>
            </tr>
            <tr>
                <td>Sueldo:</td>
                <td colspan="2"><input type="number"  id="txtSueldo" name="txtSueldo" min="8000" max="999999999999999999" step="500"><span id="spnSueldo" style="display:none">*</span> </td>
            </tr>
            <tr>
                <td>Turno:</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td style="text-align:right">
                    <input type="radio" id="tManiana" name="rdoTurno" value="Ma&ntilde;ana" checked="checked" />						
                </td>
                <td colspan="2">Mañana</td>
            </tr>
            <tr>
                <td style="text-align:right">
                    <input type="radio" id="tTarde" name="rdoTurno" value="Tarde" />						
                </td>
                <td colspan="2">Tarde</td>
            </tr>
             <tr>
                <td style="text-align:right">
                    <input type="radio" id="tNoche" name="rdoTurno" value="Noche"/>						
                </td>
                <td colspan="2">Noche</td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td colspan="2"><input type="file" accept="image/*" name="imgEmpleado" id="imgEmpleado"></td>
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
                    <input type="button" onclick="AdministrarValidaciones()" name="btnEnviar" value="Enviar"/>
                    <!--submit-->
                </td>
            </tr>
            </table>
        </form> 
        
    </body>
</html>
