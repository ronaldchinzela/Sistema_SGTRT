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
      
      PROYECTOS
    
    </h1>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProyecto">
          
          Agregar nueva proyecto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
            <th style="width:10px">&#8470;</th>
            <th>ALP</th>
            <th>Nombre del proyecto</th>
            <th style="width:155px">Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $Proyectos = ControladorProyectos::ctrMostrarProyectos($item, $valor);

            foreach ($Proyectos as $key => $value) {
              

              echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["idproyecto"].'</td>
                      <td>'.$value["nombre"].'</td>

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-warning btnEditarLicencia" data-toggle="modal" data-target="#modalEditarLicencia" idLicencia="'.$value["idproyecto"].'"><i class="fa fa-pencil"></i>&nbsp;&nbsp;<b>Editar</b></button>
                          
                          <button class="btn btn-danger btnEliminarLicencia" idLicencia="'.$value["idproyecto"].'"><i class="fa fa-times"></i>&nbsp;&nbsp;<b>Eliminar</b></button>
                       
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

<!--=================================================================================================================================================
                                                    MODAL AGREGAR PROYECTO
==================================================================================================================================================-->

<div id="modalAgregarProyecto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">REGISTRO - NUEVO PROYECTO</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
                          
          <!-- ENTRADA PARA EL CÓDIGO DE DE LICENCIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar el código" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DE LICENCIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-pencil-square-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoLicencia" placeholder="Ingresar el nombre de la licencia" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-server"></i></span> 

                <select class="form-control input-lg" name="nuevoTipo" required>
                  
                  <option value="">Selecionar sistema operativo</option>

                  <option value="Office">Office</option>

                  <option value="Sqlserver">Sqlserver</option>

                  <option value="Remote">Remote</option>
                  
                  <option value="Sqlserver - 2">Sqlserver - 2</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-money"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCosto" onkeypress="return solonumeroCosto(event);" maxlength="11" onpaste="return false" placeholder="Ingresar el costo" required>

              </div>

            </div>

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Registrar Licencia</button>

        </div>

      </form>

      <?php

        $crearLicencia = new ControladorLicencias();
        $crearLicencia -> ctrCrearLicencia();

      ?>

    </div>

  </div>

</div>

<!--=================================================================================================================================================
                                                    MODAL EDITAR LICENCIA
==================================================================================================================================================-->

<div id="modalEditarLicencia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
                  CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">EDITAR - LICENCIA - SPLA</h4>

        </div>

        <!--=====================================
                    CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
                          
          <!-- ENTRADA PARA EL CÓDIGO DE DE LICENCIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-code"></i>&nbsp;&nbsp;Código de Licencia&nbsp;</span> 

                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" required>
                <input type="hidden" id="idLicencia" name="idLicencia">

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DE LICENCIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-folder-open-o"></i>&nbsp;&nbsp;Nombre de licencia</span> 

                <input type="text" class="form-control input-lg" name="editarLicencia" id="editarLicencia" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Tipo de licencia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 

                <select class="form-control input-lg" name="editarTipo" required>

                  <option value="" id="editarTipo"></option>
                  <option value="Office">Office</option>
                  <option value="Sqlserver">Sqlserver</option>
                  <option value="Remote">Remote</option>             
                  <option value="Sqlserver - 2">Sqlserver - 2</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-money"></i>&nbsp;&nbsp;Costo de licencia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 

                <input type="text" class="form-control input-lg" name="editarCosto" onkeypress="return solonumeroCosto(event);" maxlength="11" onpaste="return false" id="editarCosto" required>

              </div>

            </div>

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>

      <?php

          $editarLicencia = new ControladorLicencias();
          $editarLicencia -> ctrEditarLicencia();

      ?>


    </div>

  </div>

</div>


<?php

  $borrarLicencia = new ControladorLicencias();
  $borrarLicencia -> ctrBorrarLicencia();

?>