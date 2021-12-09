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
    
    <title>Cajas Misteriosas</title>
</head>
<body>
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
                    <li class="nav-item"><a class="nav-link active" href="producto.php">producto</a></li> 
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
        <h1 class="display-1 text-center">Cajas misteriosas</h1>
        <p></p>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <img class="img-fluid"  src="img/boxBlack.png" >
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <p></p>
        <section class="col-sm">
            <div class="card bg-light">
                <div class="card-header">
                    <h2 class="display-2">Imagen ?</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">¿quieres ver la imagen?</h5>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImagen">ir a imagen</a>
                </div>
            </div>
        </section>
        <section class="col-sm">
            <div class="card bg-light">
                <div class="card-header">
                    <h2 class="display-2">Video ?</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">¿quieres ver el video?</h5>
                    <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalVideo">ir a video</a>
                </div>
            </div>
        </section>
        <section class="col-sm">
            <div class="card bg-light">
                <div class="card-header">
                    <h2 class="display-2">Audio ?</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">¿quieres escuchar el audio?</h5>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAudio">ir a audio</a>
                </div>
            </div>
        </section>
        <!-- Modal -->
            <div class="modal fade" id="modalAudio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                    <a  data-bs-dismiss="modal"><a href="index.php" class="btn btn-primary">x</a></a>
                    </div>
                    <div class="modal-body">
                        <audio controls><source src="img/cajamisteriosa.mp3" type="audio/mp3">:O.</audio>
                    </div>
                </div>
                </div>
            </div>
        <!-- Modal -->
            <div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                    <a  data-bs-dismiss="modal"><a href="index.php" class="btn btn-primary">x</a></a>
                    </div>
                    <div class="modal-body">
                        <video src="img/cajamisteriosa.mp4"  width=100% controls></video>'
                    </div>
                </div>
                </div>
            </div>
    <!-- Modal -->
            <div class="modal fade" id="modalImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                    <a  data-bs-dismiss="modal"><a href="index.php" class="btn btn-primary">x</a></a>
                    </div>
                    <div class="modal-body">
                        <img src="img/cajamisteriosa.png"  width=100%  alt="' . $descripcion .'">
                    </div>
                </div>
                </div>
            </div>
    </main>
    <p></p>
      <footer class="text-center text-Secondary fixed-bottom bg-light">
      
        <div class="container p-4"></div>
        <img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" />
        <div class="text-center p-3">
            Esta pagina fue diseñada para cajas misteriosas y esta bajo la licencia <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Licencia Creative Commons Atribución 4.0 Internacional.</a>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>