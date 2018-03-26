<?php
class Persona
{
    private $_apellido;
    private $_nombre;
    private $_dni;
    private $_sexo;

    public function __construct($nombre,$apellido,$dni,$sexo)
    {
        $this->_apellido=$apellido;
        $this->_nombre=$nombre;
        $this->_dni=$dni;
        $this->_sexo=$sexo;
    }

    public function GetNombre()
    {
        return $this->_nombre;
    }
    public function GetApellido()
    {
        return $this->_apellido;
    }
    public function GetDni()
    {
        return $this->_dni;
    }
    public function GetEdad()
    {
        return $this->_sexo;
    }

    public abstract function Hablar($idioma[]);

    public function ToString()
    {
        return "Nombre y Apellido: ".$this->GetNombre()." -- ".$this->GetApellido."</br>Sexo: ".$this->GetEdad()."</br>Dni: ".$this->GetDni();
    }



}



?>