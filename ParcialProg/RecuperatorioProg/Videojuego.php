<?php
namespace Elementos
{
    include_once "Articulo.php";
    class Videojuegos extends Articulo 
    {
        public $genero;
        public $path;


        public function GetPath()
        {
            return $this->path;
        }

        public function GetEstandar()
        {
            return json_decode($this->ToString());
        }

        public static function SetEstandar($id,$precio,$cantidad,$nombre,$genero,$path)
        {
            $videojuego=new Videojuegos();
            $videojuego->id=$id;
            $videojuego->precio=$precio;
            $videojuego->cantidad=$cantidad;
            $videojuego->nombre=$nombre;
            $videojuego->genero=$genero;
            $videojuego->path=$path;
            return $videojuego;
        }
        
        public function GetGenero()
        {
            return $this->genero;
        }


        public function ToString()
        {
            return '{'.parent::ToString().',"path":"'.$this->GetPath().'","genero":"'.$this->GetGenero().'"}';
        }

        public function GuardarArchivo()
        {
            $archivo=fopen("videojuegos.txt","a");
            if($archivo!=false)
            {
                fwrite("\n".$archivo,$this->ToString());
            }
            return false;
        }


    }
}






?>