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

			$("#idNexsus").val(respuesta["idnexus"]);
				$("#editarNombre").val(respuesta["nom_proyecto"]);
				$("#editarPunto").val(respuesta["punto_red"]);
				$("#editarCosto").val(respuesta["costo"]);
     	}

	})


})
