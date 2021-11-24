/*=============================================
                  SUBIENDO CSV
=============================================*/
function upCSV()
{
    var Form = new FormData($('#filesForm')[0]);
    $.ajax({

        url:"modelos/import_mantenimiento.php",
        type: "POST",
        data : Form,
        processData: false,
        contentType: false,
        success: function(data)
        
        {
            swal({
                title: "Los registros han sido cargados correctamente",
                type: "success",
                confirmButtonText: "¡Cerrar!"
              }).then(function(result) {
              
                  if (result.value) {

                  window.location = "costo-mantenimiento";

              }

            });
        }
    });
}

//VALIDANDO LOS ARCHIVOS QUE SE SUBEN EN EL FILE SEAN CSV
function validarCsv()
{
    //Obteniendo lo que hay en el input file
    var fileId = document.getElementById('fileId');

    //obteniendo el valor del archivo file
    var archivoRuta = fileId.value;

    //Determinando las extensiones permitidas en la carga de archivos
    var extensionesPermitidas = /(.csv)$/i;

    //Si la extensión es diferente a .csv
    if(!extensionesPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un archivo .csv');        
        fileId.value = '';
        return false;
    }

    //HABILITANDO EL BOTÓN DE ENVÍO CUANDO SE A SELECCIONADO UN ARCHIVO
    const file = document.getElementById("fileId");
    const btn = document.getElementById("enviar");

    if(file.files.length != 0) {
        btn.disabled = false;
    }else{
            btn.disabled = true;
        }

}

//
$(".tablas").on("click", ".verFourwalls", function(){

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

/*=============================================
      REVISAR SI EL CÓDIGO ALP YA EXISTE
=============================================*/

$("#nuevoAlp").change(function(){

	$(".alert").remove();

	var mantenimiento = $(this).val();

	var datos = new FormData();
	datos.append("validarAlp", mantenimiento);

	 $.ajax({
	    url:"ajax/mantenimiento.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
        console.log("respuesta", respuesta);
	    	//EL AJAX TRAERÁ UN ARRAY CON LOS CÓDIGOS ALP EXISTENTES EN CASO SE INGRESE UNO EN USO
        //SI EL ARRAY EXISTE DEVOLVERÁ ALERTA DE ERROR 
	    	if(respuesta){

	    		$("#nuevoAlp").parent().after('<div class="alert alert-danger">Este alp ya existe en la base de datos</div>');

	    		$("#nuevoAlp").val("");

	    	}

	    }

	})
})

//LIMITAR INGRESAR SOLO NÚMEROS EL CÓDIGO ALP
function solonumeroMantenimiento(e){
 
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
  //LIMITAR INGRESAR SOLO NÚMEROS PUNTO DE RED
function solonumeroPunto(e){
 
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
      alert("Ingresar números enteros");
      return false;
    }
  
  }
  //LIMITAR INGRESAR SOLO NÚMEROS EN COSTO
function solonumeroCosto(e){
 
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




