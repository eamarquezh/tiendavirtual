<?php
session_start();
include "conexion.php";
$idcliente=$_SESSION['numcliente']; // variable de sesion proveniente de login del sitio

$fecha=date('Y-m-d H:m:s');
$mensaje=$_POST["texto"];
$consulta="insert into chat (fecha,idcliente,tipo,mensaje) values ('$fecha','$idcliente','1','$mensaje')";
mysqli_query($link,$consulta);


?>