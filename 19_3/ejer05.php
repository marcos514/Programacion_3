
<?php
 $a=11;
 $b=20;
 $c=18;
 if($a<$b&&$b<$c)
 {
 	echo $b;
 }
 else if($a>$b&&$b>$c)
 {
 	echo $b;
 }
 else if($a<$c&&$c<$b)
 {
 	echo $c;
 }
 else if($b<$a&&$a<$c)
 {
 	echo $a;
 }
 else if($a>$c&&$c>$b)
 {
 	echo $c;
 }
 else if($b>$a&&$a>$c)
 {
 	echo $a;
 }
 else
 {
 	echo "no hay numero del medio";
 }
?>