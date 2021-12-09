<?php
session_start();
function existeusus(){
    if (isset($_SESSION['superusuario'])){
        echo '<a class="nav-link active" href="despedida.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                          </svg> Hola '.$_SESSION['superusuario'].' cerrar sesion
                    </a>';
    }  else {
        echo '<a class="nav-link active" href="login.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
          </svg> Iniciar sesion
    </a>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="extra.css">
    <title>Cajas Misteriosas</title>
</head>
<body>
    <?php
        //cokie carrito
        if(isset($_SESSION['carrito'])){
            $miArray=unserialize($_SESSION['carrito']);
                if(isset($_GET['productito'])){
                    array_push($miArray,$_GET["productito"]);
                    $_SESSION['carrito'] =serialize($miArray);
                }
        }
    ?>
    <header>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.svg" alt="" width="32" height="32" class="d-inline-block align-text-top">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" href="comprado.php">comprado</a></li>
                    <li class="nav-item"><a class="nav-link active" href="producto.php">Producto</a></li> 
                    <li class="nav-item"><a class="nav-link active" href="contacto.php">Contacto</a></li>
                    <li class="nav-item"><?php existeusus() ?></li>
                    <li class="nav-item"><a class="nav-link active" href="carrito.php">ir a carrito<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        <?php if(isset($_SESSION['carrito'])) {
                                            $miArray=unserialize($_SESSION['carrito']);
                                                echo count($miArray);
                                                }else{
                                                    echo'0';
                                                } 
                                        ?>
                                        </a>
                    </li> 
                </ul>
            </div>
        </div>
        </nav>
    <main class="container-fluid row">
    
        <h1 class="display-1 text-center">Productos Cajas misteriosas</h1>
        <p></p>
        <section class="col-sm">
        <?php
        $conexion = new mysqli('localhost', 'root', '', 'tiendavirtual');

        if ($conexion->connect_errno) {
        
            echo "!:( oh noo! error: ".$conexion->connect_errno;
            exit;
        }
        
        $consulta = "SELECT * FROM categorias";
        
        if (!$resultado = $conexion->query($consulta)) {
            echo "Lo sentimos, no se pudo realizar la consulta.";
            exit;
        }
        
        echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">';
        echo'<div class="container-fluid">';
        echo'<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
        echo'<span class="navbar-toggler-icon"></span>';
        echo'</button>';
        echo'<div class="collapse navbar-collapse" id="navbarNav2">';
        echo'<ul class="navbar-nav">';
        while ($array_registro = $resultado->fetch_assoc()) {
            echo'<li class="nav-item"><a class="nav-link active" href="producto.php?myid='.$array_registro['idcategoria'].'">'.$array_registro['descripcion'].'</a></li>';
        }  
        echo'</ul>';
        echo'<form class="d-flex" method="get" action="producto.php">';
        echo'<input class="form-control me-2" type="search" placeholder="buscar" aria-label="buscar" name="busq">';
        echo'<button class="btn btn-secondary" type="submit">buscar</button>';
        echo'</form>';
        echo'</div>';
        echo'</div>';
        echo'</nav>';

        
        if (isset($_GET['myid'])) {
            $va=$_GET['myid'];
            $consulta = "SELECT * FROM productos where idcategoria = '$va'";
            if (!$resultado = $conexion->query($consulta)) {
                echo "Lo sentimos, no se pudo realizar la consulta.";
                exit;
            }
            $c=1;
            while ($array_registro = $resultado->fetch_assoc()) {
            if ($c==1) {
                echo '<div class="row">';
            }
            echo '<div class="col-lg-4">';
            echo '<div class="card" style="width: 15rem;">';
            echo '<img src="img/cajas/'.$array_registro['urlimagen'].'.png" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">$'.$array_registro['precio'].'</h5>';
            echo '<p class="card-text">'.$array_registro['descripcion'].'</p>';
            if(isset($_SESSION['carrito'])){
                    echo '<a href="producto.php?myid='.$va.'&productito='.$array_registro['idproducto'].'" class="btn btn-warning">Agregar a carrito</a>';
                }else{
                    $miArray=array();
                    $_SESSION['carrito'] =serialize($miArray);
                    echo '<a href="producto.php?myid='.$va.'&productito='.$array_registro['idproducto'].'" class="btn btn-warning">Agregar a carrito</a>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            ++$c;
            if ($c==4) {
                echo '</div>';
                echo '<p></p>';
                $c=1;
            }
            }
            } else {
            $va = '0';
            
        }


        if (isset($_GET['busq'])) {
            $va=$_GET['busq'];
            $consulta = "select * from productos where descripcion like '%$va%'";
            if (!$resultado = $conexion->query($consulta)) {
                echo "Lo sentimos, no se pudo realizar la consulta.";
                exit;
            }
            $c=1;
            while ($array_registro = $resultado->fetch_assoc()) {
                if ($c==1) {
                    echo '<div class="row">';
                }
                echo '<div class="col-lg-4">';
                echo '<div class="card" style="width: 15rem;">';
                echo '<img src="img/cajas/'.$array_registro['urlimagen'].'.png" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">$'.$array_registro['precio'].'</h5>';
                echo '<p class="card-text">'.$array_registro['descripcion'].'</p>';
                if(isset($_SESSION['carrito'])){
                    echo '<a href="producto.php?busq='.$va.'&productito='.$array_registro['idproducto'].'" class="btn btn-warning">Agregar a carrito</a>';
                }else{
                    $miArray=array();
                    $_SESSION['carrito'] =serialize($miArray);
                    echo '<a href="producto.php?busq='.$va.'&productito='.$array_registro['idproducto'].'" class="btn btn-warning">Agregar a carrito</a>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
                ++$c;
                if ($c==4) {
                    echo '</div>';
                    echo '<p></p>';
                    $c=1;
                }
                }
                } else {
                $va = '0';
            
        }
        
        

        $resultado->free(); 
        $conexion->close();
        ?>
        </section>
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalchat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">chatea con nosotros</h5>
                    <a  data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                        <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                    </a>
                    </div>
                    <div class="modal-body">
                    <div class="container">
                        <div id="chat" class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
                            <div class="col-xs-12 col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading top-bar">
                                        <div class="">
                                            <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat</h3>
                                        </div>
                                        <div class="col-md-8 col-xs-8" style="text-align: right;">
                                            <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                                            <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                                        </div>
                                    </div>
                                    <div class="panel-body msg_container_base">
                                        <div id="mschat"></div>                    
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <div class="input-group">
                                            <input id="texto" type="text" class="form-control input-sm chat_input" placeholder="Escribe tu texto aqui..." />
                                            <span class="input-group-btn">
                                            <button class="btn btn-primary btn-sm" id="btn-chat" onclick="enviar()">Enviar</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>


                        <!-- Optional JavaScript -->
                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                        <script src="code.js?ver=<?php echo rand(1,300);?>"></script>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </main>
    <p></p>
    
    <footer class="text-center text-Secondary fixed-bottom bg-light">
        <?php
        if(isset($_SESSION['numcliente'])){
            echo'<a href="#" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#modalchat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                </svg>Chat   
            </a>';
        }else{
            echo'<a href="#" class="btn-flotante" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-text" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8zm0 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                </svg>inicia sesion para chatear   
            </a>';
        }
        ?>
     
    <p>  </p>
    <p> </p>
        <div class="container p-4"></div>
        <img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" />
        <div class="text-center p-3">
            Esta pagina fue diseñada para cajas misteriosas y esta bajo la licencia <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Licencia Creative Commons Atribución 4.0 Internacional.</a>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>