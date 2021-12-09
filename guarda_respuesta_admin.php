<?php
session_start();
include "conexion.php";
$idcliente=$_SESSION['numcliente']; 
$mensaje=$_POST["mensaje"];
$fecha=date('Y-m-d H:m:s');
$consulta="insert into chat (fecha,idcliente,tipo,mensaje) values ('$fecha','$idcliente','2','$mensaje')";
mysqli_query($link,$consulta);

?>