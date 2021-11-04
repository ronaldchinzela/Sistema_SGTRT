/*--===========================================
        EDITAR USUARIO
============================================--*/

$(document).on("click", ".btnEditarUsuario", function(){

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
            
            //el valor de respuesta invoca los atributos de la BD
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarNombre").val(respuesta["nombres"]);
            $("#editarApellido").val(respuesta["apellidos"]);
            $("#editarCorreo").val(respuesta["correo"]);
            $("#editarCelular").val(respuesta["telefono"]);
            $("#passwordActual").val(respuesta["password"]);

            $("#editarPerfil").html(respuesta["rol"]);
			      $("#editarPerfil").val(respuesta["rol"]);

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

  //LIMITAR CANTIDAD DE NÚMEROS EN LA CAJA REGISTRAR NÚMERO DE CELULAR DE usuarios.php
  var input =  document.getElementById('numero');
  input.addEventListener('input',function(){
    if (this.value.length > 9) 
      this.value = this.value.slice(0,9); 
  })
  //LIMITAR INGRESAR SOLO NÚMEROS EN LA CAJA REGISTRAR NÚMERO DE CELULAR DE usuarios.php
  function solonumeros(e){
    
    key = e.keycode || e.which;

    teclado = String.fromCharCode(key);

    numeros = "0123456789";

    especiales = "8-37-38-46"; //array

    teclado_especial = false;
    for(var i in especiales){

      if(key == especiales[i]){
          teclado_especial = true;
      }

    }

      if(numeros.indexOf(teclado) == -1 && !teclado_especial){
        return false;
      }

  }
