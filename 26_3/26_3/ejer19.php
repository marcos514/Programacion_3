<?php

abstract class FiguraGeometrica
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct()
    {
        $this->_color="Red";
        $this->_perimetro=0;
        $this->_superficie=0;
    }

    public function GetColor()
    {
        return $this->_color;
    }
    public function SetColor($color)
    {
        $this->_color=$color;
    }

     abstract function Dibujar();

     abstract function CalcularDatos();

    public function ToString()
    {
        return "Color: ". $this->_color."</br>Perimetro: ".$this->_perimetro."</br>Superficie: ".$this->_superficie;
    }
}


class Rectangulo extends FiguraGeometrica
{
    private $_ladoUno;
    private $_ladoDos;
    public function __construct($L1,$L2)
    {
        parent::__construct();
        $this->_ladoUno=$L1;
        $this->_ladoDos=$L2;
        $this->CalcularDatos();

    }

    public function CalcularDatos()
    {
        $this->_perimetro=$this->_ladoUno*2+$this->_ladoDos*2;
        $this->_superficie=$this->_ladoUno*$this->_ladoDos;
    }

    public function Dibujar()
    {
        $retorno="<div style='color:".$this->GetColor()."'>";
        for($i=0;$i<=$this->_ladoDos;$i++)
        {
            for($j=0;$j<=$this->_ladoUno;$j++)
            {
                $retorno=$retorno."*";
            }
            $retorno=$retorno."</br>";
        }
        return  $retorno."</div>";
    }
    public function ToString()
    {
        return parent::ToString()."</br>".$this->Dibujar();
    }
}

class Triangulo extends FiguraGeometrica
{
    private $_base;
    private $_altura;
    public function __construct($h)
    {
        parent::__construct();
        $this->_base=$h+$h-1;
        $this->_altura=$h;
        $this->CalcularDatos();
    }

    public function CalcularDatos()
    {
        $this->_perimetro=$this->_base+sqrt(pow($this->_base/2,2)+pow($this->_altura,2))*2;
        $this->_superficie=($this->_altura*$this->_base)/2;
    }

    public function Dibujar()
    {
        $retorno="<div style='color:".$this->GetColor()."'>";
        if($this->_base%2==0)
        {
            $max=$this->_base/2;
        }
        else
        {
            $max=$this->_base/2 +0.5;
        }
        $min=$max;


        for($i=0;$i<=$this->_altura;$i++)
        {
            for($j=0;$j<=$this->_base;$j++)
            {
                if($j<$max&&$j>$min)
                {
                    $retorno=$retorno."*";
                }
                else
                {
                    $retorno=$retorno."&nbsp;";
                }
                
            }
            $retorno=$retorno."</br>";
            if($min-1>=0)
            {
                $min--;
            }
            if($max+1<=$this->_base)
            {
                $max++;
            }
        }
        return  $retorno."</div>";
    }
    public function ToString()
    {
        return parent::ToString()."</br> ". $this->Dibujar();
    }
}

$cuadrado=new Rectangulo(10,10);
echo $cuadrado->ToString();
$triangulo=new Triangulo(5);
echo $triangulo->ToString();



?>