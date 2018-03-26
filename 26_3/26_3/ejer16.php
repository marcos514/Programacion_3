<?php

function Invertidor($cadena="hola")
{
    $cadeaInvertida="";
    for($i=strlen($cadena);$i>=0;$i--)
    {
        $cadeaInvertida+= substr($cadena,$i,1);
    }
    return $cadeaInvertida;
} 


echo Invertidor("hola");




?>