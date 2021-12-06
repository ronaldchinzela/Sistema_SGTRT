/*=============================================
			    EDITAR NEXSUS
=============================================*/
$(".tablas").on("click", ".btnEditarNexsus", function(){

	//Almacenando en una variable el atributo idnexus de la BD 
	var idNexsus = $(this).attr("idNexsus");

	var datos = new FormData();
	datos.append("idNexsus", idNexsus);

	$.ajax({
		url: "ajax/nexsus.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
      //console.log(respuesta);
			$("#idNexsus").val(respuesta["idnexus"]);
				$("#editarNombre").val(respuesta["nombre"]);
				$("#editarPunto").val(respuesta["punto_red"]);
				$("#editarCosto").val(respuesta["costo"]);
     	}

	})


})
  /*=============================================
                  ELIMINAR NEXSUS
  =============================================*/
  //creando alerta suave sweetalert
  $(".tablas").on("click", ".btnEliminarNexsus", function(){

    //capturando el id del Nexsus
    var idNexsus = $(this).attr("idNexsus");

    //mostrarndo la alerta para el id seleccionado
    swal({
      title: '¿Está seguro de borrar este registro?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Nexsus!'
    }).then(function(result){

      //redireccionando a la página de Nexsus en caso la acción sea ejecutada
      if(result.value){

        window.location = "index.php?ruta=costo-nexsus&idNexsus="+idNexsus;

      }

    })

})
//LIMITAR INGRESAR SOLO NÚMEROS PUNTO DE RED
function solonumeroNexsusPuntoRed(e){
 
  if(window.event){
    keynum = e.keyCode;
  }
  else{
    keynum = e.which;
  }

  //números de los códigos ASCII
  if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13)
  {
    return true;
  }
  else
  {
    alert("Ingresar solo números");
    return false;
  }

}

