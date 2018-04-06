<?php
include_once "Fabrica.php";
include_once "Persona.php";
include_once "Empleado.php";

$persona=new Empleado("Marcos","Rey",111111111111111111111111111,"M",10,22222,"Mañana");
$persona1=new Empleado("Josias","Rivola",999999999,"M",8888888,7777777777,"Mañana");
$fabrica=new Fabrica("Marcos S.A.");
$fabrica->AgregarEmpleado($persona);
var_dump($fabrica);

//$fabrica->AgregarEmpleado($persona);
echo "<br><br><br>";
var_dump($fabrica);
$fabrica->AgregarEmpleado($persona1);


echo($fabrica->ToString());
var_dump($fabrica);
?>