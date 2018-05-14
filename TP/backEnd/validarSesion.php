<?php
session_start();
if(isset($_SESSION["DNIEmpleado"])? false:true)
{
    header("Location: ../frontend/login.html");
}


?>