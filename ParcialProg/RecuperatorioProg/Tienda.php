<?php

class Tienda  
{
    public $_videojuegos;

    public function __construct()
    {
        $this->_videojuegos=array();
    }

    public function TraerArchivo()
    {
        $this->_videojuegos=array();
        $archivo=fopen("videojuegos.txt","r");
        while( ! feof($archivo))
        {
            $json=json_decode(fgets($archivo));
            //$id,$precio,$cantidad,$nombre,$genero,$path
            //validar el ultimo linea de todas
            
            $videojuego=Elementos\Videojuegos::SetEstandar($json->id,$json->precio,$json->cantidad,$json->nombre,$json->genero,$json->path);
            array_push($this->_videojuegos,$videojuego); 
        }
        fclose($archivo);
    }

    public function GuardarArchivo()
    {
        $archivo=fopen("videojuegos.txt","w");
        foreach ($this->_videojuegos as $key) 
        {
            fwrite($archivo,"\n".$key->ToString());
        }
        fclose($archivo);
    }

    public function Eliminar($id)
    {
        $this->TraerArchivo();
        $i=0;
        foreach ($this->_videojuegos as $key ) {
            if($key->GetId()==$id)
            {
                echo"entro";
                unset($this->_videojuegos[$i]);
                break;
            }
            $i++;
        }
        $this->GuardarArchivo();
        
    }
}






?>