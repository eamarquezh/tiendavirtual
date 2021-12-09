<?php
include "conexion.php";
$idcliente=$_POST["idcliente"]; 

$consulta="delete from chat where idcliente='$idcliente'";
mysqli_query($link,$consulta);


?>