/*=============================================
                  EDITAR CAMBIO
=============================================*/
$(".tablas").on("click", ".btnEditarCambio", function(){

	var idCambio = $(this).attr("idCambio");

	var datos = new FormData();
    datos.append("idCambio", idCambio);

    $.ajax({

      url:"ajax/cambios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idCambio").val(respuesta["idtipo"]);
	       $("#editarCambio").val(respuesta["valor"]);
	  }

  	})

})