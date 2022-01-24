/*=============================================
				  EDITAR 4WALL
=============================================*/
$(".tablas").on("click", ".btnEditarFourwalls", function(){
  //console.log("holaa azuuul");
	//Almacenando en una variable el atributo idfourwalls de la BD 
	var idFourwalls = $(this).attr("idFourwalls");

	var datos = new FormData();
	datos.append("idFourwalls", idFourwalls);
  
	$.ajax({
		url: "ajax/fourwalls.ajax.php",
		method: "POST",
    data: {"idFourwalls": idFourwalls},
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",

    error: function(error){
      console.error(error);
  },

    success: function(respuesta){
        console.log(respuesta);
        
			  $("#editarNombre").val(respuesta["nombre"]);
				$("#editarEquipo").val(respuesta["equipo"]);
				$("#editarSerie").val(respuesta["serie"]);
				$("#editarCosto").val(respuesta["costo"]);
				$("#editarFechaInicio").val(respuesta["fec_inicio"]);
				$("#editarFechaFin").val(respuesta["fec_fin"]);
     	}
    
	})

})
  /*=============================================
                  ELIMINAR FOURWALLS
  =============================================*/
  //creando alerta suave sweetalert
  $(".tablas").on("click", ".btnEliminarFourwalls", function(){

    //capturando el id del fourwalls
    var idFourwalls = $(this).attr("idFourwalls");
    var idproyecto = $(this).attr("idProyecto");
    //mostrarndo la alerta para el id seleccionado
    swal({
      title: '¿Está seguro de borrar este registro?',
      allowOutsideClick: false,
      allowEscapeKey: false,
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Fourwalls!'
    }).then(function(result){

      //redireccionando a la página de fourwalls en caso la acción sea ejecutada
      if(result.value){

        //window.location = "index.php?ruta=costo-fourwalls&idFourwalls="+idFourwalls;
        //console.log(idFourwalls,idproyecto);
        location.href = "index.php?ruta=eliminar-costo-fourwalls&idFourwalls=" + idFourwalls + "&idProyecto=" + idproyecto;

      }

    })

})
