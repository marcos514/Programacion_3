<?php
class Cds
{
    public $titulo;
    public $interprete;
    public $anio;
    public $id;

    public function Mostrar()
    {
        return "Titulo: ".$this->titulo." - Interprete: ". $this->interprete ." - Año: ". $this->anio ."<br>";
    }
}




?>