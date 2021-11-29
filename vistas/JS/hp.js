/*=============================================
			EDITAR HP
=============================================*/
$(".tablas").on("click", ".btnEditarHp", function(){

	//Almacenando en una variable el atributo idhp de la BD 
	var idHp = $(this).attr("idHp");

	var datos = new FormData();
	datos.append("idHp", idHp);

	$.ajax({
		url: "ajax/hp.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			$("#idHp").val(respuesta["idhp"]);
				$("#editarNombre").val(respuesta["nom_proyecto"]);
				$("#editarEquipo").val(respuesta["equipo"]);
				$("#editarSerie").val(respuesta["serie"]);
				$("#editarCosto").val(respuesta["costo"]);
				$("#editarFechaInicio").val(respuesta["fec_inicio"]);
				$("#editarFechaFin").val(respuesta["fec_fin"]);
     		

     	}

	})


})

  /*=============================================
                  ELIMINAR HP
  =============================================*/
  //creando alerta suave sweetalert
  $(".tablas").on("click", ".btnEliminarHp", function(){

    //capturando el id del fourwalls
    var idHp = $(this).attr("idHp");

    //mostrarndo la alerta para el id seleccionado
    swal({
      title: '¿Está seguro de borrar este registro?',
      text: "¡Si no lo está puede cancelar la acción!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Hp!'
    }).then(function(result){

      //redireccionando a la página de Hp en caso la acción sea ejecutada
      if(result.value){

        window.location = "index.php?ruta=costo-hp&idHp="+idHp;

      }

    })

})

