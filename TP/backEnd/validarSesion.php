<?php
session_start();
$var=isset($_SESSION);
if(!$var)
{
    header("Location: ../frontend/login.html");
}


?>