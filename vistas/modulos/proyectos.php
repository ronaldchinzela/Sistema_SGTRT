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
                      <td>'.sprintf("%'.06d\n", $value["idproyecto"]).'</td>
                      <td>'.$value["nombre"].'</td>

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-warning btnEditarProyecto" data-toggle="modal" data-target="#modalEditarProyecto" idProyecto="'.$value["idproyecto"].'"><i class="fa fa-pencil"></i>&nbsp;&nbsp;<b>Editar</b></button>
                          
                          <button class="btn btn-danger btnEliminarProyecto" idProyecto="'.$value["idproyecto"].'"><i class="fa fa-times"></i>&nbsp;&nbsp;<b>Eliminar</b></button>
                       
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

<div class="modal-content" id="modal-content-mantenimiento">

  <form role="form" method="post" id="dimensiones-form-mantenimiento" onsubmit="return validar();">

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
                      
      <!-- ENTRADA PARA EL CÓDIGO ALP -->
        
        <div class="form-group">
          
          <div class="input-group">
          
            <span class="input-group-addon" id="nuevoAlpSpan"><i class="fa fa-code">&nbsp;&nbsp;Código ALP</i></span> 

            <input type="text" class="form-control input-lg" id="nuevoAlp" name="nuevoCodigo" onkeypress="return solonumeroMantenimiento(event);" maxlength="6" onpaste="return false" placeholder="Ingresar el código ALP">

          </div>

        </div>

        <!-- ENTRADA PARA EL NOMBRE DEL PROYECTO -->
        
        <div class="form-group">
          
          <div class="input-group">
          
            <span class="input-group-addon" id="alpCod"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Proyecto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

            <input type="text" class="form-control input-lg" id="nuevoMantenimiento" name="nuevoMantenimiento" placeholder="Ingresar nombre de proyecto">

          </div>

        </div>
       

      </div>

    </div>

    <!--=====================================
    PIE DEL MODAL
    ======================================-->

    <div class="modal-footer" id="pie-mantenimiento">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      <button type="submit" class="btn btn-primary">Registrar Mantenimiento</button>

    </div>

  </form>

  <?php

    $crearProyecto = new ControladorProyectos();
    $crearProyecto -> ctrCrearProyecto();

  ?>

</div>

</div>

</div>

<!--=================================================================================================================================================
                                                  MODAL EDITAR PROYECTO
==================================================================================================================================================-->

<div id="modalEditarProyecto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content" id="modal-content-mantenimiento">

      <form role="form" method="post" id="dimensiones-form-mantenimiento">

        <!--=====================================
                  CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">EDITAR PROYECTO</h4>

        </div>

        <!--=====================================
                    CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
                          
          <!-- ENTRADA PARA EL CÓDIGO ALP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
              <span class="input-group-addon" id="nuevoAlpSpan"><i class="fa fa-code">&nbsp;&nbsp;Código ALP</i></span> 

                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" required>
                <input type="hidden" id="idProyecto" name="idProyecto">

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DEL PROYECTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
              <span class="input-group-addon" id="alpCod"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Proyecto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" name="editarProyecto" id="editarProyecto" required>

              </div>

            </div>

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" id="pie-mantenimiento">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>

      <?php

          $editarProyecto = new ControladorProyectos();
          $editarProyecto -> ctrEditarProyecto();

      ?>


    </div>

  </div>

</div>


<?php

  $borrarProyecto = new ControladorProyectos();
  $borrarProyecto -> ctrBorrarProyecto();

?>