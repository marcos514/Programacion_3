<?php
include_once "Videojuego.php";
include_once "BD.php";
include_once "Tienda.php";
$BaseDatos=new ManejadorBD();
$accion=isset($_POST["accion"])? $_POST["accion"]:false;

if($accion!=false)
{
    switch ($accion) {
        case 'agregar':


            $extencion=pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION);
            $tmp_name=$_FILES["img"]["tmp_name"];
            
            if(($extencion!="png"&&$extencion!="jpg"&&$extencion!="jpeg") )
            {
                echo "Error";
            }
            else if( $_FILES["img"]["size"]>1000000)
            {
                echo "Error";
            }
            else
            {   
                $videojuego=Elementos\Videojuegos::SetEstandar(0,$_POST["precio"],$_POST["cantidad"],$_POST["nombre"],$_POST["genero"],"");
                $BaseDatos->Insertar($videojuego->ToString());
                $pathFin=trim("Fotos/".$BaseDatos->IdNueva().".jpg");
                $videojuego=Elementos\Videojuegos::SetEstandar($BaseDatos->IdNueva(),$_POST["precio"],$_POST["cantidad"],$_POST["nombre"],$_POST["genero"],$pathFin);
                move_uploaded_file($tmp_name,$pathFin);
                $BaseDatos->Modificar($videojuego->ToString());
                $videojuego->GuardarArchivo();
                echo $videojuego->ToString();
                echo "<img src='$pathFin'>";
            }
            

            break;
        case 'Eliminar':
        
            $id=$_POST["id"];
            $BaseDatos->Eliminar($id);
            echo $id;
            break;
        case 'Traer':
            $var=$BaseDatos->TreaerTodo();
            foreach ($var as $key) 
            {
                echo $key->ToString()."<br>";
            }
            break;
        case 'TraerId':
            $id=$_POST["id"];
            $var=$BaseDatos->TraerPorId($id);
            foreach ($var as $key ) {
                echo $key->ToString();
            }

            break;
        case 'TraerNombre':
            $id=$_POST["nombre"];
            echo $id;
            $var=$BaseDatos->TreaerPorNombre($id);
            foreach ($var as $key ) {
                echo $key->ToString();
            }
            break;
        case 'Modificar':
            $videojuego=Elementos\Videojuegos::SetEstandar($_POST["id"],$_POST["precio"],$_POST["cantidad"],$_POST["nombre"],$_POST["genero"],$_POST["id"].".jpg");
            $BaseDatos->Modificar($videojuego->ToString());
            break;
        case "archivo":
            echo "hola";
            $tienda=new Tienda();
            $tienda->TraerArchivo();
            var_dump($tienda->_videojuegos);
            $tienda->Eliminar(29);

            break;
    }
}













?>