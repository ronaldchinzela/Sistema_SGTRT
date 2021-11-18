/*=============================================
                  SUBIENDO CSV
=============================================*/

$(document).ready(function(){

	var dataTable = $('#datos_mantenimiento').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url: "obtener_registros.php",
            type: "POST"
        },
        
        "columnsDefs":[
            {
                "targets": [0, 3, 4],
                "orderable":false,
            },
        ]
    });
});

