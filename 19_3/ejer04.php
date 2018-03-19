
<?php
 $numero=0;
 $resultado;
 for($resultado=0;;$numero++)
 {
 	if(($resultado+$numero)<=1000)
 	{
 		echo "<br>$numero";
 		$resultado+=$numero;
 	}
 	else if(($resultado+$numero)>1000)
 	{
 		echo "<br>Ultimo numero :$resultado";
 		break;
 	}
 }
?>