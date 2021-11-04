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
