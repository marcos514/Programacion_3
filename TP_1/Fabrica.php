<?php
include_once "Empleado.php";
include_once "Persona.php";
class Fabrica
{
    private $_cantidadMaxima;
    private $_empleados;
    private $_razonSocial;

    public function __construct($razonSocial)
    {
        $this->_razonSocial=$razonSocial;
        $this->_cantidadMaxima=5;
        $this->_empleados[]=array();
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
        for($i=0;$i<$this->_empleados->count;$i++)
        {
            $sueldos+=$this->empleados[$i]->_sueldo;
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
        $comp[]=$this->_empleados;
        $this->_empleados=array_unique($comp);
    }


    public function ToString()
    {
        $persona=new Empleado("Marcos","Rey",41435394,"M",10,22222,"Mañana");
        $a="<br>Empleados de ".$this->_razonSocial;
        foreach($this->_empleados as $persona)
        {
            
            $a=$a."<br>".$persona->toString();
            $this->AgregarEmpleado($persona);
        }
        $a=$a."<br>Y la suma de los sueldos es: ".$this->CalcularSueldo();
        return $a;
    }




}






?>