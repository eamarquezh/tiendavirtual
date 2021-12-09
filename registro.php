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
    
        <h1 class="display-1 text-center">Registro de datos</h1>
        <p></p>
        <section>
        <div class="card">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg> Registrar
                </div>
                <div class="card-body">
                    <?php
                        
                        if (isset($_GET['exampleInputEmail1'])) {
                            $exampleInputName1=$_GET['exampleInputName1'];
                            $exampleInputName2=$_GET['exampleInputName2'];
                            $exampleInputEmail1=$_GET['exampleInputEmail1'];
                            $exampleInputPassword1=$_GET['exampleInputPassword1'];
                            
                        

                            $conexion = new mysqli('localhost', 'root', '', 'tiendavirtual');

                            
                            $consulta = "SELECT count(*) as conteo FROM  clientes where email = '$exampleInputEmail1'";
                            
                            if (!$resultado = $conexion->query($consulta)) {
                                echo "Lo sentimos, no se pudo realizar la consulta.";
                                exit;
                            }
                            $array_registro = $resultado->fetch_assoc();
                            if(intval($array_registro['conteo']) >= 1){
                                echo '<div class="fs-5 badge bg-danger text-center" style="width: 20rem;"> El correo ya existe. </div>';
                            }else{

                                $ahora =date('Y-m-d H:i:s');
                                $nCompleto=$exampleInputName2.' '.$exampleInputName1;
                                $myPass=password_hash($exampleInputPassword1, PASSWORD_DEFAULT, ["cost" => 15]);
                                $sql = "INSERT INTO `clientes`(`email`, `password`, `nombre`, `fechaalta`) VALUES ('$exampleInputEmail1','$myPass','$nCompleto','$ahora')";
                                if (mysqli_query($conexion, $sql)) {
                                    echo '<div class="fs-5 badge bg-primary text-center" style="width: 20rem;"> tu registro insertado. </div>';
                                    sleep(3);
                                    header("Location: login.php");
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                                }
                            }
                            $resultado->free(); 
                            $conexion->close();
                        }
                    ?>
                    <form class="form-group" method="get" action="registro.php">
                        <div class="mb-3">
                            <label for="exampleInputName1" class="form-label">Ingresa tu nombre o nombres</label>
                            <input type="name" class="form-control" id="exampleInputName1" name="exampleInputName1" aria-describedby="nameHelp" required="required" value="<?php if (isset($_GET['exampleInputName1'])) echo $exampleInputName1 ?>" >
                            <br>
                            <label for="exampleInputName2" class="form-label">Ingresa tus apellidos</label>
                            <input type="name" class="form-control" id="exampleInputName2" name="exampleInputName2" aria-describedby="namelHelp" required="required" value="<?php if (isset($_GET['exampleInputName2'])) echo $exampleInputName2 ?>">
                            <br>
                            <label for="exampleInputEmail1" class="form-label">Ingresa tu correo electronico</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1"  aria-describedby="emailHelp" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Ingresa tu contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" required="required" value="" >
                        </div>
                        <div class="mb-3">
                            <input class="btn btn-primary" type="submit" value="Registrarme">
                        </div> 
                        
                    </form> 
                </div>
              </div>
        </section>
 
    
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