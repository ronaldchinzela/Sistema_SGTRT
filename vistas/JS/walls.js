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

/*=====================================================================
       REVISAR SI EL CÓDIGO ALP YA EXISTE EN REGISTRO DE PROYECTO
=====================================================================*/

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

        if(respuesta){

          //idproyecto HACE REFERENCIA AL ID DEL AJAX
          //nombre HACE REFERENCIA AL NOMBRE DEL CAMPO DE LA TABLA
          
          //$("#nuevoMantenimiento").val(respuesta.nombre);
          alert("¡El código ALP " + datos.get("validarAlp")+ " ya existe!");
          $("#nuevoAlp").val("");

	    	}

	    }

	})
})
/*=========================================================
      REVISAR SI EL CÓDIGO ALP NO EXISTE EN FOURWALLS
=========================================================*/

$("#nuevoAlpFourwalls").change(function(){
  
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

        if(respuesta == false){

          alert("¡El código ALP " + datos.get("validarAlp")+ " no existe en la tabla proyecto!\nPor favor, regístrelo");
	    
          $("#nuevoAlpFourwalls").val("");

        }
      }

	})
})
/*=========================================================
      REVISAR SI EL CÓDIGO ALP NO EXISTE EN NEXSUS
=========================================================*/

$("#nuevoAlpNexus").change(function(){
  
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

      if(respuesta == false){

        alert("¡El código ALP " + datos.get("validarAlp")+ " no existe en la tabla proyecto!\nPor favor, regístrelo");
    
        $("#nuevoAlpNexus").val("");

      }
    }

})
})
/*=========================================================
      REVISAR SI EL CÓDIGO ALP NO EXISTE EN HP
=========================================================*/

$("#nuevoAlpHp").change(function(){
  
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

      if(respuesta == false){

        alert("¡El código ALP " + datos.get("validarAlp")+ " no existe en la tabla proyecto!\nPor favor, regístrelo");
    
        $("#nuevoAlpHp").val("");

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
  //VALIDANDO CANTIDAD DE CARACTERES SEGÚN LOS CAMPOS DE LA BD
  function validar(){
    var alp,proyecto;

    alp = document.getElementById("nuevoAlp").value;
    proyecto = document.getElementById("nuevoMantenimiento").value;
   

    if(alp === "" || proyecto === ""){
      alert("Los campos no pueden estar vacíos");
      return false;
    }
    else if(proyecto.length>100){
        alert("El nombre del proyecto sobrepasa los 100 caracteres");
        return false;
    }

  }


//VALIDANDO INPUTS DE COSTO FOURWALLS
  function validarF(){
  var  equipoFourwalls,serieFourwalls,fecha1,fecha2,expresion;
     
  equipoFourwalls = document.getElementById("nuevoEquipoFourwalls").value;
  serieFourwalls = document.getElementById("nuevoSerieFourwalls").value;
  //fecha1 = document.getElementById("nuevoFechaInicioFourwalls").value;
  //fecha2 = document.getElementById("nuevoFechaFinFourwalls").value;
  
  //expresion = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/;
  
    if(equipoFourwalls.length>100){
      alert("El nombre del equipo fourwalls sobrepasa los 100 caracteres");
      return false;
    }
    else if(serieFourwalls.length>100){
      alert("La serie fourwalls sobrepasa los 100 caracteres");
      return false;
    }
}

//VALIDANDO INPUTS DE COSTO HP
function validarH(){
  var  equipoHp,serieHp,fecha3,fecha4,expresion2;
     
  equipoHp = document.getElementById("nuevoEquipoHp").value;
  serieHp = document.getElementById("nuevoSerieHp").value;
  //fecha3 = document.getElementById("nuevoFechaInicioHp").value;
  //fecha4 = document.getElementById("nuevoFechaFinHp").value;
  
  //expresion2 = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/;
  
      if(equipoHp.length>100){
        alert("El nombre del equipo HP sobrepasa los 100 caracteres");
        return false;
      }
      else if(serieHp.length>100){
        alert("La serie HP sobrepasa los 100 caracteres");
        return false;
      }
  }
//LIMITAR INGRESAR SOLO NÚMEROS EN FECHA
/*function solonumeroFecha(e){
 
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
  if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 47)
  {
    return true;
  }
  else
  {
    alert("Ingresar solo números en el formato día/mes/año");
    return false;
  }

}*/
//
 /* function ValidarFechasFH()
{
   var fechainicial = document.getElementById("nuevoFechaInicioFourwalls").value;
   var fechafinal = document.getElementById("nuevoFechaFinFourwalls").value;

   if(Date.parse(fechafinal) < Date.parse(fechainicial)) {

   alert("La fecha final debe ser mayor a la fecha inicial");
  }
}*/
