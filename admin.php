<?php
include "conexion.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Administracion del Chat</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
   
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        
        <h2>Admin Chat</h2>        
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Chat</span>
          
          </h4>
          <!--
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            
            
            
          </ul>
        -->
          <div id="chat"></div>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" id="txtmensaje" placeholder="Mensaje">
              <div class="input-group-append">
                <button type="button" class="btn btn-secondary" onclick="responder();">Responder</button>                
              </div>
            </div>

            <div class="input-group">
              
              <div class="input-group-append">
                <button type="button" class="btn btn-primary" onclick="cerrarchat();">Cerrar Chat</button>                
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Usuario</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nombre de Usuario</label>
                <select class="form-control" id="combocliente" onchange="mostrar_chat(this.value);">
                  <option value="0">Seleccione</option>
                  <?php
                        $consulta="select a.idcliente,b.nombre from chat as a left join clientes as b on a.idcliente=b.idclientes group by a.idcliente";
                        $recordset = mysqli_query($link,$consulta);
                while($registro = mysqli_fetch_array($recordset)){
                    $idcliente=$registro["idcliente"];
                    $nombre=$registro["nombre"];
                    echo'<option value="'.$idcliente.'">'.$nombre.'</option>';
                  }

                ?>
                
                </select>
              </div>
              
            </div>           
            

           
            <hr class="mb-4">
            
          </form>
        </div>
      </div>

      
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      function mostrar_chat(idcliente){
        
        $.ajax({
          type : "post",
          url : "mostrar_chat.php",
          data : {
              idcliente : idcliente
          },
          dataType:'text',
          success : function( data ){        
            //alert(data);
            $('#chat').html(data);
            
          }
        });
        
      }

      function responder(){
        var idcliente=$('#combocliente').val();
        var mensaje=$('#txtmensaje').val();

        $.ajax({
          type : "post",
          url : "guarda_respuesta_admin.php",
          data : {
              idcliente : idcliente,
              mensaje:mensaje
          },
          dataType:'text',
          success : function( data ){       
         
            mostrar_chat(idcliente);
            
          }
        });
      }

      function cerrarchat(){
         var idcliente=$('#combocliente').val();       

        $.ajax({
          type : "post",
          url : "cerrarchat.php",
          data : {
              idcliente : idcliente
             
          },
          dataType:'text',
          success : function( data ){       
         
            mostrar_chat(idcliente);
            
          }
        });

      }
    </script>
    
  </body>
</html>
