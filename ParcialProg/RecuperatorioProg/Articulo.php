<?php

namespace Elementos
{
    class Articulo
    {
        public $precio;
        public $cantidad;
        public $nombre;
        public $id;

    

        public function GetPrecio()
        {
            return $this->precio;
        }
        public function GetId()
        {
            return $this->id;
        }
        
        public function GetCantidad()
        {
            return $this->cantidad;
        }
        
        public function GetNombre()
        {
            return $this->nombre;
        }

        

        public function ToString()
        {
            return '"precio":'.$this->GetPrecio().',"cantidad":'.$this->GetCantidad().',"nombre":"'.$this->GetNombre().'","id":'.$this->GetId();
        }
    }
    




}








?>