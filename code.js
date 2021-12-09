$( document ).ready(function() {
    actualizar_chat();
});

function enviar(){  
    var texto=$('#texto').val();   
   
    
    $.ajax({
      type : "post",
      url : "gmensaje.php",
      data : {
          texto : texto
      },
      dataType:'text',
      success : function( data ){        
        actualizar_chat();
        $('#texto').val('');
        
      }
    });



   
}

function actualizar_chat(){
    $.ajax({
      type : "post",
      url : "actualizar_chat.php",      
      dataType:'text',
      success : function( data ){        
        $('#mschat').html(data);
      }
    });
}

$(document).ready(function() {      
    setInterval(actualizar_chat, 10000);
});