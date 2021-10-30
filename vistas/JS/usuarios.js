/*--===========================================
        EDITAR USUARIO
============================================--*/

$(".btnEditarUsuario").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    //EJECUTANDO AJAX PARA TRAER LOS DATOS DE LA BD
    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            //en respuesta invoca los atributos de bindParam colocados en el insert de usuarios.modelo.php
            $("#editarNombre").val(respuesta["nombres"]);
            $("#editarApellido").val(respuesta["apellidos"]);
            $("#editarCorreo").val(respuesta["correo"]);
            $("#editarCelular").val(respuesta["telefono"]);
            $("#passwordActual").val(respuesta["password"]);
            
            $("#editarRol").html(respuesta["rol"]);
            $("#editarRol").val(respuesta["rol"]);


        }

    });

})

/*--===========================================
       SCRIPT PARA ACTIVAR USUARIO
============================================--*/

$(".btnActivar").click(function(){

    //capturando la clase idUsuario de usuarios.php
    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    //realizando la actualización del estado en la BD
    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

        }

    })

    if(estadoUsuario == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Inactivo');
        $(this).attr('estadoUsuario', 1);

    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activo');
        $(this).attr('estadoUsuario', 0);

    }

})



