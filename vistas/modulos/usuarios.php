<?php
     //destruyendo la sesión cuando el usuario sin privilegios navege a traves de la url
     if($_SESSION["rol"] == "Analista"){
        echo'<script>
            window.location = "inicio";
        </script>';
        return; 
    }
?>

<div class="content-wrapper">

<section class="content-header">
      
<h1 class="h1-titulo">
   Gestionar usuarios
</h1>

    <ol class="breadcrumb">
    </ol>
</section>

<section class="content">

<div class="box">

<div class="box-header with-border">
    
    <!-- botón para agregar un nuevo usuario -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
        Agregar nuevo usuario
    </button>

</div>

    <!-- Tabla de usuarios -->
    <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
                <tr>
                    <th style="width:10px">&#8470;</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>estado</th>
                    <th style="width:155px">Acciones</th>
                </tr>
            </thead>

            <tbody>

                <!-- MOSTRANDO LA LISTA DE USUARIOS DE LA BASE DE DATOS -->
                <?php                    
                     $item = null;
                     $valor = null;

                     $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                     //VARIABLE $Key hace referencia a la variable $item
                     foreach ($usuarios as $key => $value){
                        //DENTRO DE LA VARIABLE $value INGRESAMOS EL NOMBRE DEL CAMPO DE LA TABLA DE LA BD QUE VAMOS A TRAER
                        echo'
                            <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["usuario"].'</td>';

                                echo '<td>'.$value["rol"].'</td>';

                                    if($value["estado"] != 0){

                                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["idusuario"].'" estadoUsuario="0">Activo</button></td>';
                    
                                    }else{
                    
                                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["idusuario"].'" estadoUsuario="1">Inactivo</button></td>';
                    
                                    }        
                                
                                //cerrando el echo de $value["rol"]
                                echo '
   
                                     <td>
                                    
                                        <div class="btn-group">

                                            <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["idusuario"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i>&nbsp;&nbsp;<b>Editar</b></button>
                                            <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["idusuario"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i>&nbsp;&nbsp;<b>Eliminar</b></button>
                                       
                                        </div>
                                        
                                    </td>
                                    
                                </tr>';                           
                     }
                ?>

            </tbody>

        </table>
    </div>

</div>

</section>

</div>

<!--======================================================================================================================================
                                                 MODAL AGREGAR NUEVO USUARIO
=======================================================================================================================================-->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content" id="modal-content-usuario">

    <form role="form" method="post" id="dimensiones-form-usuario">

<!--===========================================
        CABECERA DEL MODAL
============================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="center-titulo">Nuevo usuario</h4>
      </div>

<!--===========================================
        CUERPO DEL MODAL
============================================-->
    <div class="modal-body">
        
        <div class="box-body" id="formulario-usuarios">

        <!-- ENTRADA PARA EL USUARIO -->

        <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="visibility:hidden"><i class="fa fa-key"></i></span> 

                <input type="hidden" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>

        <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-user">&nbsp;&nbsp;&nbsp;Nombres&nbsp;&nbsp;</i></span>
                    <input type="text" onkeypress="return soloLetrasNomApe(event);" onpaste="return false" maxlength="60" class="form-control input-lg" id="ingresartextoInput" name="nuevoNombre" placeholder="Ingresar el nombre" required>

                </div>

            </div>
        <!-- ENTRADA PARA EL APELLIDO -->
            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-id-card">&nbsp;&nbsp;Apellidos</i></span>
                    <input type="text" onkeypress="return soloLetrasNomApe(event);" onpaste="return false" maxlength="60" class="form-control input-lg" id="ingresartextoInput" name="nuevoApellido" placeholder="Ingresar los apellidos" required>

                </div>

            </div>
             <!-- ENTRADA PARA EL CORREO -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-envelope">&nbsp;&nbsp;Correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                    <input type="text" class="form-control input-lg" id="ingresartextoInput" name="nuevoCorreo" placeholder="Ingresar el correo" required>

                </div>

                </div>
            <!-- ENTRADA PARA EL CELULAR -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-phone">&nbsp;&nbsp;Teléfono&nbsp;&nbsp;&nbsp;</i></span>
                    <input type="text" class="form-control input-lg" id="ingresartextoInput" name="nuevoCelular" minlength="7" maxlength="9" id="numero" onkeypress="return solonumeros(event)" onpaste="return false" placeholder="Ingresar número telefónico" required>

                </div>

                </div>
            <!-- ENTRADA PARA LA CONTRASEÑA -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-lock">&nbsp;&nbsp;Password&nbsp;&nbsp;</i></span>
                    <input type="password" class="form-control input-lg" id="ingresartextoInput" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                </div>

                </div>
            <!-- ENTRADA PARA EL ROL -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-address-book-o">&nbsp;&nbsp;Rol&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                        <select class="form-control input-lg" id="ingresartextoInput" name="nuevoPerfil" required>
                            <option value="">Seleccionar rol</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Analista">Analista</option>
                        </select>

                </div>

                </div>

            </div>
      
        </div>

<!--===========================================
        PIE DEL MODAL
============================================-->
      <div class="modal-footer" id="pieUsuario">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Generar usuario</button>
      </div>

        <!-- OBJETOS PARA INVOCAR LOS MÉTODOS Y CLASES -->
        <?php
             $crearUsuario = new ControladorUsuarios();
             $crearUsuario -> ctrCrearUsuario();
        ?>

      </form>
    </div>

  </div>
</div>


<!--======================================================================================================================================
                                                     MODAL EDITAR USUARIO
=======================================================================================================================================-->
<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content" id="modal-content-usuario">

    <form role="form" method="post" id="dimensiones-form-usuario">

<!--===========================================
        CABECERA DEL MODAL EDITAR USUARIO
============================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="center-titulo">Actualizar usuario</h4>
      </div>

<!--===========================================
        CUERPO DEL MODAL EDITAR USUARIO
============================================-->
    <div class="modal-body">
        
        <div class="box-body" id="formulario-usuarios">

         <!-- ENTRADA PARA EL USUARIO -->

         <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" style="visibility:hidden"><i class="fa fa-key"></i></span> 

                <input type="hidden" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>


        <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-user">&nbsp;&nbsp;&nbsp;Nombres&nbsp;&nbsp;</i></span>
                    <input type="text" onkeypress="return soloLetrasNomApe(event);" onpaste="return false" maxlength="60" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                    <input type="hidden"  name="idUsuario" id="idUsuario" required> 
                </div>

            </div>
        <!-- ENTRADA PARA EDITAR EL APELLIDO -->
            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-id-card">&nbsp;&nbsp;Apellidos</i></span>
                    <input type="text" onkeypress="return soloLetrasNomApe(event);" onpaste="return false" maxlength="60" class="form-control input-lg" id="editarApellido" name="editarApellido" value="" required>

                </div>

            </div>
             <!-- ENTRADA PARA EDITAR EL CORREO -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-envelope">&nbsp;&nbsp;Correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span>
                    <input type="text" class="form-control input-lg" id="editarCorreo" name="editarCorreo" value="" required>

                </div>

                </div>
            <!-- ENTRADA PARA EDITAR EL CELULAR -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-phone">&nbsp;&nbsp;Teléfono&nbsp;&nbsp;&nbsp;</i></span>
                    <input type="text" class="form-control input-lg" id="editarCelular" name="editarCelular" minlength="7" maxlength="9" onkeypress="return solonumeros(event)" onpaste="return false"  value="" required>

                </div>

                </div>
            <!-- ENTRADA PARA EDITAR LA CONTRASEÑA -->
                <div class="form-group">
                
                <div class="input-group">
                
                    <span class="input-group-addon" id="spamIcon"><i class="fa fa-lock">&nbsp;&nbsp;Password&nbsp;&nbsp;</i></span> 

                    <input type="password" class="form-control input-lg" id="ingresartextoInput" name="editarPassword" placeholder="Escriba la nueva contraseña">

                    <input type="hidden" id="passwordActual" name="passwordActual">

                </div>

                </div>
            <!-- ENTRADA PARA EDITAR EL ROL -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="spamIcon"><i class="fa fa-users">&nbsp;&nbsp;Rol&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <select class="form-control input-lg" id="ingresartextoInput" name="editarPerfil">
                  
                  <option value="" id="editarPerfil"></option>
                            <option value="Administrador">Administrador</option>
                            <option value="Analista">Analista</option>
                        </select>

                </div>

                </div>

            </div>
      
        </div>

<!--===========================================
        PIE DEL MODAL EDITAR USUARIO
============================================-->
      <div class="modal-footer" id="pieUsuario">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
      </div>

        <!-- OBJETOS PARA INVOCAR LOS MÉTODOS Y CLASES -->
        <?php
            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarUsuario();
        ?> 

      </form>
    </div>

  </div>
</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 