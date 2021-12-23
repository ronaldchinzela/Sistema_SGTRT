/*=============================================
                  EDITAR LICENCIA
=============================================*/
$(".tablas").on("click", ".btnEditarLicencia", function(){

	var idLicencia = $(this).attr("idLicencia");

	var datos = new FormData();
    datos.append("idLicencia", idLicencia);

    $.ajax({

      url:"ajax/licencias.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idLicencia").val(respuesta["id_licencia"]);
	       $("#editarCodigo").val(respuesta["cod_licencia"]);
	       $("#editarLicencia").val(respuesta["nom_licencia"]);

         $("#editarTipo").html(respuesta["tipo"]);
         $("#editarTipo").val(respuesta["tipo"]);

	       $("#editarCosto").val(respuesta["costo"]);
	  }

  	})

})

  /*=============================================
                  ELIMINAR LICENCIA
  =============================================*/
  //creando alerta suave sweetalert
  $(".tablas").on("click", ".btnEliminarLicencia", function(){

    //capturando el id de la licencia
    var idLicencia = $(this).attr("idLicencia");

    //mostrarndo la alerta para el id seleccionado
    swal({
      title: '¿Está seguro de borrar la licencia?',
      allowOutsideClick: false,
      allowEscapeKey: false,
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar licencia!'
    }).then(function(result){

      //redireccionando a la página de licencia-spla en caso la acción sea ejecutada
      if(result.value){

        window.location = "index.php?ruta=licencia-spla&idLicencia="+idLicencia;

      }

    })

})
