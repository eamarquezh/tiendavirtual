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
<?php
                
    if (isset($_GET['exampleInputEmail1'])) {
        $exampleInputEmail1=$_GET['exampleInputEmail1'];
        $contrasenia=$_GET['exampleInputPassword1'];
    

        $conexion = new mysqli('localhost', 'root', '', 'tiendavirtual');

        
        $consulta = "SELECT count(*) as conteo,idclientes,email,nombre,password FROM  clientes where email = '$exampleInputEmail1'";
        
        if (!$resultado = $conexion->query($consulta)) {
            echo "Lo sentimos, no se pudo realizar la consulta.";
            exit;
        }
        
        $array_registro = $resultado->fetch_assoc();

        $contraseniaBD=$array_registro['password'];

        if(password_verify($contrasenia,$contraseniaBD)){
            //session_destroy();
            session_start();
            echo '<div class="fs-5 badge bg-primary text-center" style="width: 20rem;"> Bienvenido. </div>';
            $_SESSION['superusuario']  = $array_registro['nombre'];
            $_SESSION['numcliente']  = $array_registro['idclientes'];
            $_SESSION['correo']  = $array_registro['email'];
            sleep(3);
            header("Location: carrito.php");
        }else{
            echo '<div class="fs-5 badge bg-danger text-center" style="width: 20rem;"> no lo encontramos. </div>';
        }     

        $resultado->free(); 
        $conexion->close();
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
        <?php
        if(isset($_SESSION['carrito'])){
            $miArray=unserialize($_SESSION['carrito']);
            $longitud = count($miArray);
            if(isset($_GET['elim'])){
                $elim=$_GET['elim'];
                for($i=0; $i<$longitud; $i++)
                    {
                        if($i=$elim){ 
                        $miArray = array_diff($miArray, array($elim));
                        break;
                        } 
                    }
                    $_SESSION['carrito'] =serialize($miArray);
            }   
            $longitud = count($miArray);
            sort($miArray);
            $contenedor='';
            for($i=0; $i<$longitud; $i++)
                {
                if($i<($longitud-1)){
                    $contenedor = $contenedor.$miArray[$i].',';  
                }else{
                    $contenedor = $contenedor.$miArray[$i];   
                }
                }
        }
        $conexion = new mysqli('localhost', 'root', '', 'tiendavirtual');

        if ($conexion->connect_errno) {
        
            echo "!:( oh noo! error: ".$conexion->connect_errno;
            exit;
        }
        
        if(isset($contenedor)){
            $consulta = "select * from productos where idproducto in(".$contenedor.");";
            $array_idproducto= array();
            $array_descripcion= array();
            $array_precio= array();
            $array_cantidad= array();
            $array_urlimagen= array();
        }else{
            exit;
        }
        if (!$resultado = $conexion->query($consulta)) {
            echo "Lo sentimos, al parecer no hay nada aun en el carrito.";
            exit;
        }
        function veces_in_array($elarray,$dato)
        {
            $conto=0;
            $longitud=count($elarray);
            for($i=0; $i<$longitud; $i++)
                {
                    if($dato==$elarray[$i]){
                        $conto = $conto + 1;  
                    }
                }  
            return $conto;
        }
        $suma=0;
        while ($array_registro = $resultado->fetch_assoc()) {
            array_push($array_idproducto,$array_registro['idproducto']);
            array_push($array_descripcion,$array_registro['descripcion']);
            array_push($array_precio,$array_registro['precio']);
            array_push($array_cantidad,veces_in_array($miArray,$array_registro['idproducto']));
            array_push($array_urlimagen,$array_registro['urlimagen']);
            $suma= $suma+$array_registro['precio'];
        } 
        echo '<p class="h2">Total a pagar: $'.$suma.'</p>';
        ?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#idproducto</th>
                <th scope="col">descripción</th>
                <th scope="col">precio</th>
                <th scope="col">cantidad</th>
                <th scope="col">imagen</th>
                <th scope="col">eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $longitud = count($array_idproducto);
                    for($i=0; $i<$longitud; $i++){
                            echo'<tr>';
                            echo'<th scope="row">'.$array_idproducto[$i].'</th>';
                            echo'<th>'.$array_descripcion[$i].'</th>';
                            echo'<th>'.$array_precio[$i].'</th>';
                            echo'<th>'.$array_cantidad[$i].'</th>';
                            echo'<th><img src="img/cajas/'.$array_urlimagen[$i].'.png"  width="50" alt="..."></th>';
                            echo'<th><a class="nav-link active" href="carrito.php?elim='.$array_idproducto[$i].'">Eliminar producto</a></th>';
                            echo'</tr>';
                        }
                ?>
            </tbody>
        </table>
        <section>
        <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg> Datos de envio
                </div>
                <div class="card-body">
                 
                    <form class="form-group" method="get" action="carrito.php">
                        <div class="mb-3">
                            <?php
                            if(isset($_SESSION['superusuario'])){
                                if(isset($_GET['Recibe'])){
                                    echo '<a href="comprado.php" class="btn btn-warning">ver lo que compraste</a>';
                                    echo '<p>  </p>';
                                    echo '<a href="producto.php" class="btn btn-warning">Seguir comprando</a>';
                                }else{
                                echo '<input class="btn btn-primary" type="submit" value="completar mi pedido">';
                                }
                            }else{
                                echo '<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImagen">logearme para completar mi pedido</a>';
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="Recibe" class="form-label">Recibe</label>
                            <input type="text" class="form-control" id="Recibe" name="Recibe">
                        </div>
                        <div class="mb-3">
                            <label for="Calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="Calle" name="Calle">
                        </div>
                        <div class="mb-3">
                            <label for="Colonia" class="form-label">Colonia</label>
                            <input type="text" class="form-control" id="Colonia" name="Colonia">
                        </div>
                        <div class="mb-3">
                            <label for="Estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="Estado" name="Estado">
                        </div>
                        <div class="mb-3">
                            <label for="Municipio" class="form-label">Municipio</label>
                            <input type="text" class="form-control" id="Municipio" name="Municipio">
                        </div>
                        <div class="mb-3">
                            <label for="CP" class="form-label">C.P.</label>
                            <input type="text" class="form-control" id="CP" name="CP">
                        </div>
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="Telefono" name="Telefono">
                        </div>
                    </form>
                        
                </div>
              </div>
              <br>
        </section>
           <!-- Modal -->
           <div class="modal fade" id="modalImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sesion</h5>
                    <a  data-bs-dismiss="modal"><a href="carrito.php" class="btn btn-primary">x</a></a>
                    </div>
                    <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg> Iniciar
                </div>
                <div class="card-body">
                    <form class="form-group" method="get" action="carrito.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ingresa tu correo electronico</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Ingresa tu contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <input class="btn btn-primary" type="submit" value="Iniciar Sesion">
                        </div> 
                    </form>
                        
                </div>
                </div>
                </div>
            </div>
            <?php                       
                if (isset($_GET['Recibe'])) {
                    $hoy = getdate();
                    $elcliente=$_SESSION['numcliente'];
                    $idparapedido= $elcliente.'-'.uniqid().'-'.$hoy['mday'].'-'.$hoy['mon'].'-'.$hoy['year'].'-'.$hoy['hours'].'-'.$hoy['minutes'].'-'.$hoy['seconds'];
                    $xRecibe=$_GET['Recibe'];
                    $xCalle=$_GET['Calle'];
                    $xColonia=$_GET['Colonia'];
                    $xEstado=$_GET['Estado'];
                    $xMunicipio=$_GET['Municipio'];
                    $xCP=$_GET['CP'];
                    $xTelefono=$_GET['Telefono'];
                    $ahora =date('Y-m-d H:i:s');
                

                    $conexion = new mysqli('localhost', 'root', '', 'tiendavirtual');                  

                    
                        $sql = "INSERT INTO tiendavirtual.pedido(idpedido,fecha,idcliente,recibe,calle,colonia,estado,municipio,cp,telefono) VALUES ('$idparapedido', '$ahora', '$elcliente', '$xRecibe','$xCalle','$xColonia','$xEstado','$xMunicipio','$xCP','$xTelefono');";
                        if (mysqli_query($conexion, $sql)) {
                            echo '<div class="fs-5 badge bg-primary text-center" style="width: 20rem;"> se ha registrado tu pedido. </div>';
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                        }

                        for($i=0; $i<$longitud; $i++){
                        $sql = "INSERT INTO tiendavirtual.detallepedido(idpedido,idproducto,cantidad,precio) VALUES ('$idparapedido', '$array_idproducto[$i]', '$array_cantidad[$i]', '$array_precio[$i]');";
                        if (mysqli_query($conexion, $sql)) {
                            echo '<div class="fs-6 badge bg-primary text-center" style="width: 20rem;">'.$array_descripcion[$i].' registrado</div>';
                            echo '<p> </p>';
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                        }
                        }


                    $resultado->free(); 
                    $conexion->close();
                    $_SESSION['carrito'] =serialize($miArray=array());
                }
            ?>
        <p>  </p>
        <p> </p>
        <p> </p>
        <p> </p>
        <p> </p>
        <p> </p>
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