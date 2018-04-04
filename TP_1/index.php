<?php
include_once "Fabrica.php";
include_once "Persona.php";
include_once "Empleado.php";

$persona=new Empleado("Marcos","Rey",41435394,"M",10,22222,"Mañana");
$persona1=new Empleado("Josias","Rivola",41435394,"M",10,22222,"Mañana");
$fabrica=new Fabrica("Marcos S.A.");
$fabrica->AgregarEmpleado($persona);

$fabrica->AgregarEmpleado($persona);

$fabrica->AgregarEmpleado($persona1);

echo($fabrica->toString());

?>