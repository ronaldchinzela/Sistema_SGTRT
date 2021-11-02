/*--===========================================
        EDITAR USUARIO
============================================--*/

$(".btnEditarUsuario").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    //EJECUTANDO AJAX PARA TRAER LOS DATOS DE LA BD
    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            //en respuesta invoca los atributos de bindParam colocados en el insert de usuarios.modelo.php
            $("#editarNombre").val(respuesta["nombres"]);
            $("#editarApellido").val(respuesta["apellidos"]);
            $("#editarCorreo").val(respuesta["correo"]);
            $("#editarCelular").val(respuesta["telefono"]);
            $("#passwordActual").val(respuesta["password"]);
            
            $("#editarRol").html(respuesta["rol"]);
            $("#editarRol").val(respuesta["rol"]);


        }

    });

})

/*--===========================================
       SCRIPT PARA ACTIVAR USUARIO
============================================--*/

$(document).on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      	if(window.matchMedia("(max-width:767px)").matches){
		
      		 swal({
		      	title: "El usuario ha sido actualizado",
		      	type: "success",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then(function(result) {
		        
		        	if (result.value) {

		        	window.location = "usuarios";

		        }

		      });


		}
      }

  	})

    //CAMBIANDO LA APARIENCIA DEL BOTÓN AL PRECIONAR EN EL MISMO
  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Inactivo');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activo');
  		$(this).attr('estadoUsuario',0);

  	}

})
/*--===========================================
       SCRIPT PARA ELIMINAR USUARIO
============================================--*/

$(document).on("click", ".btnEliminarUsuario", function(){

    var idUsuario = $(this).attr("idUsuario");
    var usuario = $(this).attr("usuario");
  
    swal({
      title: '¿Está seguro de borrar el usuario?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario;
  
      }
  
    })
  
  })
