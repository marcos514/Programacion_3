<?php
include_once "Empleado.php";
include_once "Persona.php";
class Fabrica
{
    private $_cantidadMaxima;
    public $_empleados;
    private $_razonSocial;

    public function __construct($razonSocial)
    {
        $this->_razonSocial=$razonSocial;
        $this->_cantidadMaxima=5;
        $this->_empleados=array();
    }

    public function AgregarEmpleado($emp)
    {
        if(count($this->_empleados)+1<=$this->_cantidadMaxima)
        {
            array_push($this->_empleados,$emp);
            $this->EliminarEmpleadoRepetido();
        }
    }

    public function CalcularSueldo()
    {
        $sueldos=0;
        foreach($this->_empleados as $persona)
        { 
            $sueldos=$sueldos+$persona->GetSueldo();
        }
        return $sueldos;
    }

    public function EliminarEmpleado($emp)
    {
        $eliminado=false;
        for($i=0;$i<$this->_empleados->count;$i++)
        {
            if($emp->GetDni()==$this->_empleados[$i]->GetDni())
            {
                unset($this->_empleados[$i]);
                $eliminado=true;
                break;
            }
        }
        return $eliminado;
    }

    private function EliminarEmpleadoRepetido()
    {
        $this->_empleados=array_unique($this->_empleados, SORT_REGULAR);
    }


    public function ToString()
    {
        $retorno="<br>Empleados de ".$this->_razonSocial;
        
       // for($i=0;$i<count($this->_empleados);$i++)
       foreach($this->_empleados as $persona)
        {
            $retorno.=$persona->ToString();
        }
        $retorno=$retorno."<br>Y la suma de los sueldos es: ".$this->CalcularSueldo();
        return $retorno;
    }




}






?>