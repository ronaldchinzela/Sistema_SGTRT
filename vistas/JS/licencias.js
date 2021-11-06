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
