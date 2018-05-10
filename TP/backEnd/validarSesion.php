<?php
session_start();
$var=isset($_SESSION)? true:false;
if($var)
{
    header("Location: ../frontend/login.html");
}


?>