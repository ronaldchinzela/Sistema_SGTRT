/*=============================================
                EDITAR PROYECTO
=============================================*/
$(".tablas").on("click", ".btnEditarProyecto", function(){

	var idProyecto = $(this).attr("idProyecto");

	var datos = new FormData();
    datos.append("idProyecto", idProyecto);

    $.ajax({

      url:"ajax/proyecto.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        //console.log(respuesta);
      
      	 $("#editarCodigo").val(respuesta["idproyecto"]);
	       $("#editarProyecto").val(respuesta["nombre"]);

	  }

  	})

})

  /*=============================================
                  ELIMINAR PROYECTO
  =============================================*/
  //creando alerta suave sweetalert
  $(".tablas").on("click", ".btnEliminarProyecto", function(){

    //capturando el id de la licencia
    var idProyecto = $(this).attr("idProyecto");

    //mostrarndo la alerta para el id seleccionado
    swal({
      title: '¿Está seguro de borrar este  proyecto??',
      allowOutsideClick: false,
      allowEscapeKey: false,
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar proyecto!'
    }).then(function(result){

      //redireccionando a la página de proyectos en caso la acción sea ejecutada
      if(result.value){

        window.location = "index.php?ruta=proyectos&idProyecto="+idProyecto;

      }

    })

})
