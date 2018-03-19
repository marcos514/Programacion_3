<?php

$vec;
$impar;
for($i=0;$i<10;$i++)
{
	do{
		$impar=rand(0,100000000);
	}while (($impar%2)==0);

	$vec[$i]=$impar;
}
for($i=0;$i<count($vec);$i++)
{
	echo $vec[$i]."<br>";
}
echo "<br><br><br><br>";

$j=1;
for($i=0;$i<10;$i++)
{
	for(;;$j++)
	{
		if(($j%2 )!=0);
		{
			break;
		}
		
	}

	$vec[$i]=$j;
	$j++;
}
for($i=0;$i<count($vec);$i++)
{
	echo $vec[$i]."<br>";
}


?>