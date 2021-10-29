<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
      
<h1>
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
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>admin</td>
                    <td>Administrador</td>
                    <td><button class="btn btn-success btn-xs">Activo</button></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>admin</td>
                    <td>Administrador</td>
                    <td><button class="btn btn-danger btn-xs">Inactivo</button></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>

</div>

</section>

</div>

<!--===========================================
        MODAL AGREGAR NUEVO USUARIO
============================================-->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

    <form role="form" method="post">

<!--===========================================
        CABECERA DEL MODAL
============================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nuevo usuario</h4>
      </div>

<!--===========================================
        CUERPO DEL MODAL
============================================-->
    <div class="modal-body">
        
        <div class="box-body">
        <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar el nombre" required>

                </div>

            </div>
        <!-- ENTRADA PARA EL APELLIDO -->
            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar los apellidos" required>

                </div>

            </div>
             <!-- ENTRADA PARA EL CORREO -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar el correo" required>

                </div>

                </div>
            <!-- ENTRADA PARA EL CELULAR -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar número telefónico" required>

                </div>

                </div>
            <!-- ENTRADA PARA LA CONTRASEÑA -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                </div>

                </div>
            <!-- ENTRADA PARA EL ROL -->
             <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
                        <select class="form-control input-lg" name="nuevoPerfil">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Generar usuario</button>
      </div>

      </form>
    </div>

  </div>
</div>