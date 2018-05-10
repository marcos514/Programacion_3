<?php
$extencion=pathinfo($_FILES["archivo"]["name"],PATHINFO_EXTENSION);
if($extencion!="png"&&$extencion!="jpg"&&$extencion!="jpeg")
{
    echo  "<h1>ERROR AL SUBIR ".pathinfo($ruta,PATHINFO_FILENAME)."</h1>";
}
else
{
    $foto=date("Y_m_d_H_i_s_u");
    $archivo=fopen("nombres/fotos.txt","a");
    fwrite($archivo,$foto.".".$extencion."\r\n");
    fclose($archivo);
    move_uploaded_file($_FILES["archivo"]["tmp_name"],"fotos/".$foto.".".$extencion);
    require_once("visor.php");
}


?>