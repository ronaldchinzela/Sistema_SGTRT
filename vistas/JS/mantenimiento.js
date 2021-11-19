/*=============================================
                  SUBIENDO CSV
=============================================*/
    function uploadPruebas()
    {
        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url:"modelos/import.php",
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
  
                      window.location = "prueba";
  
                  }
  
                });
            }
        });
}

//VALIDANDO LOS ARCHIVOS QUE SE SUBEN EN EL FILE SEAN CSV
function validarCSV()
{
    //Obteniendo lo que hay en el input file
    var archivoInput = document.getElementById('archivoInput');

    //obteniendo el valor del archivoInput
    var archivoRuta = archivoInput.value;

    //Determinando las extensiones permitidas en la carga de archivos
    var extensionesPermitidas = /(.csv)$/i;

    //Si la extensión es diferente a .csv
    if(!extensionesPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado un archivo .csv');        
        archivoInput.value = '';
        return false;
    }

    //HABILITANDO EL BOTÓN DE ENVÍO CUANDO SE A SELECCIONADO UN ARCHIVO
    const file = document.getElementById("archivoInput");
    const btn = document.getElementById("enviarr");

    if(file.files.length != 0) {
        btn.disabled = false;
    }else{
        btn.disabled = true;
    }

}




