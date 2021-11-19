/*=============================================
                  SUBIENDO CSV
=============================================*/
    function uploadPruebas()
    {
        var Form = new FormData($('#filesForm')[0]);
        //console.log('FormData');
        $.ajax({

            url:"modelos/import.php",
            type: "POST",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            
            {
                swal({
                    title: "El registro ha sido cargado correctamente",
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


