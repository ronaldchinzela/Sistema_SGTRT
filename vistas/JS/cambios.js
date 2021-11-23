/*=============================================
                  EDITAR CAMBIO
=============================================*/
$(".btnEditarCambio").click(function(){

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

        console.log("respuesta", respuesta);
      
      	 $("#idCambio").val(respuesta["idtipo"]);
	       $("#editarCambio").val(respuesta["valor"]); 
	  }

  	});

})


//LIMITAR INGRESAR SOLO NÚMEROS EN LA CAJA DEL FORMULARIO
function solonumero(e){
 
  if(window.event){
    keynum = e.keyCode;
  }
  else{
    keynum = e.which;
  }

  //
  if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 46)
  {
    return true;
  }
  else
  {
    alert("Ingresar solo números");
    return false;
  }

}
