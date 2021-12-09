<?php
session_start();
include "conexion.php";
$idcliente=$_SESSION['numcliente']; // asignar variable de sesion login

$consulta="select a.fecha,a.tipo,a.mensaje,b.nombre as cliente from chat as a left join clientes as b on a.idcliente=b.idclientes where a.idcliente='$idcliente' order by a.idchat asc;";
$recordset = mysqli_query($link,$consulta);
while($registro = mysqli_fetch_array($recordset)){
    $fecha=$registro["fecha"];
    $tipo=$registro["tipo"];
    $mensaje=$registro["mensaje"];
    $cliente=$registro["cliente"];
    if($tipo==1){
    ?>
        <div class="row msg_container base_sent">
            <div class="col-md-10 col-xs-10">
                <div class="messages msg_sent">
                    <p><?php echo $mensaje;?></p>
                    <time datetime="<?php echo $fecha; ?>"><?php echo $cliente; ?></time>
                </div>
            </div>
            <div class="col-md-2 col-xs-2 avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
            </svg>
            </div>
        </div>
        <hr class="mb-4">
    <?php
    }else{
    ?>
        <div class="row msg_container base_receive">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
            <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
            <div class="col-md-10 col-xs-10">
                <div class="messages msg_receive">
                    <p><?php echo $mensaje; ?></p>
                    <time datetime="<?php echo $fecha; ?>">Administrador</time>
                </div>
            </div>
        </div>
        <hr class="mb-4">
    <?php        
    }               
}

?>