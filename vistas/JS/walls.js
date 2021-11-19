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




