<?php

$vec[0]=0;
$resultado=0;

for($i=0;$i<6;$i++)
{
	$vec[$i]=rand(0,10);
}
$promedio=array_sum($vec) / count($vec);
if($promedio>6)
{
	echo "mayor";
}
else if($promedio <6)
{
	echo "menor";
}
else 
{
	echo "igual";
}
?>