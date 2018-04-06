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
        foreach($this->_empleados as $persona)
        { 
            $sueldos=$sueldos+$persona[0]->GetSueldo();
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
        $comp[]=array_merge($this->_empleados);
        $this->_empleados=array_merge(array_unique($comp));
    }


    public function ToString()
    {
        $persona=10;
        $retorno="<br>Empleados de ".$this->_razonSocial;
        
       // for($i=0;$i<count($this->_empleados);$i++)
       foreach($this->_empleados[count($this->_empleados)] as $persona)
        {
            echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
            $retorno.=$persona->ToString();
        }
        $retorno=$retorno."<br>Y la suma de los sueldos es: ".$this->CalcularSueldo();
        return $retorno;
    }




}






?>