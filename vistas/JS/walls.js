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

//TRAER REGISTROS FOURWALLS POR ID
/*$(".verFourwalls").click(function(e){

  e.preventDefault();

	var idFourwalls = $(this).attr("idFourwalls");
	
  var datos = new FormData();
  datos.append("idFourwalls", idFourwalls);
	
  $.ajax({

		url:"ajax/mantenimiento.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

     console.log("respuesta", respuesta);
			
			$("#traerNombre").html(respuesta["nom_proyecto"]);
			$("#traerEquipo").html(respuesta["equipo"]);
			$("#traerSerie").html(respuesta["serie"]);
			$("#traerCosto").html(respuesta["costo"]);
			$("#traerFecIni").html(respuesta["fec_inicio"]);
			$("#traerFecFin").html(respuesta["fec_fin"]);


		}

	});

})*/

/*$(".verFourwalls").click(function(e){

  e.preventDefault();
  
  let id = $(this).attr("idFourwalls");
  document.getElementById("idFourwalls").value = id;

  document.getElementById("#idFourwalls").submit();

})*/

/*=============================================
      REVISAR SI EL CÓDIGO ALP YA EXISTE
=============================================*/

$("#nuevoAlp").change(function(){
  
  //$("val").remove();

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

        if(respuesta){

          //$("#nuevoMantenimiento") HACE REFERENCIA AL ID DEL INPUT
          //idproyecto HACE REFERENCIA AL ID DEL AJAX
          //nombre HACE REFERENCIA AL NOMBRE DEL CAMPO DE LA TABLA
          $("#nuevoMantenimiento").val(respuesta.nombre);

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
  
    // > 47 && < 58 equivale a números del 0 al 9
    // 8 equivale a retroceso
    //13 al retorno 
    //46 equivale al punto
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
  //VALIDANDO FORMATO DE FECHA, CANTIDAD DE CARACTERES SEGÚN LOS CAMPOS DE LA BD
  function validar(){
    var alp,proyecto,equipoFourwalls,serieFourwalls,equipoHp,serieHp,fecha,expresion;

    alp = document.getElementById("nuevoAlp").value;
    proyecto = document.getElementById("nuevoMantenimiento").value;
    equipoFourwalls = document.getElementById("nuevoEquipoFourwalls").value;
    serieFourwalls = document.getElementById("nuevoSerieFourwalls").value;
    equipoHp = document.getElementById("nuevoEquipoHp").value;
    serieHp = document.getElementById("nuevoSerieHp").value;
    fecha = document.getElementById("nuevoFechaInicioFourwalls").value;

    expresion = /[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]/;

    if(alp === ""){
      alert("El código ALP no puede estar vacío");
      return false;
    }
    else if(proyecto.length>100){
        alert("El nombre del proyecto sobrepasa los 100 caracteres");
        return false;
    }
    else if(equipoFourwalls.length>100){
      alert("El nombre del equipo fourwalls sobrepasa los 100 caracteres");
      return false;
    }
    else if(serieFourwalls.length>100){
      alert("La serie fourwalls sobrepasa los 100 caracteres");
      return false;
    }
    else if(equipoHp.length>100){
      alert("El nombre del equipo HP sobrepasa los 100 caracteres");
      return false;
    }
    else if(serieHp.length>100){
      alert("La serie HP sobrepasa los 100 caracteres");
      return false;
    }
    else if(!expresion.test(fecha)){
      alert("El formato de fecha no es válido");
      return false;
    }
  }




