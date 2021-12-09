<?php
session_start();
include "conexion.php";
$chat="";
$idcliente=$_SESSION['numcliente'];
$consulta="select a.fecha,a.tipo,a.mensaje,b.nombre as cliente from chat as a left join clientes as b on a.idcliente=b.idclientes where a.idcliente=$idcliente order by a.idchat asc";
$recordset = mysqli_query($link,$consulta);
while($registro = mysqli_fetch_array($recordset)){
    $fecha=$registro["fecha"];
    $tipo=$registro["tipo"];
    $mensaje=$registro["mensaje"];
    $cliente=$registro["cliente"];

    $chat.='<li class="list-group-item d-flex justify-content-between lh-condensed">';
    $chat.='	<div>';
    $chat.='       <h6 class="my-0">'.$mensaje.'</h6>';
    if($tipo==1){
    	$chat.='       <small class="text-muted">'.$cliente.'</small>';
    }else{
    	$chat.='       <small class="text-muted">Administrador</small>';
    }
    
    $chat.='   </div>';    
    $chat.='</li>';

}  
echo $chat;

?>