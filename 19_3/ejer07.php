<?php
 echo date("d M o g a");
 $mes=(int)date("m");
 if($mes<4)
 {
 	echo " verano";
 }
 else if($mes <7)
 {
 	echo " otoño";
 }
 else if($mes <10)
 {
 	echo " invierno";
 }
 else if($mes <=12)
 {
 	echo " primavera";
 }
 
?>
 