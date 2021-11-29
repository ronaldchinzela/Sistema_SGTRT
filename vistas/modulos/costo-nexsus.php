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
   Costo Mantenimiento - Nexsus
</h1>

</section>

<section class="content">

<div class="box">

<div class="box-header with-border">
    

</div>

<!-- botón consultar-->
<input class="btn btn-primary" id="ver-listado-1" type="button" value="Ver listado" onclick="location.href='costo-mantenimiento'">

    <!-- Tabla de usuarios -->
    <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
            <tr>
                <th style="width:10px">&#8470;</th>
                <th style="width:90px">ALP</th>
                <th>Nombre del proyecto</th>
                <th style="width:125px">Punto de red</th>
                <th style="width:135px">Costo</th>
                <th style="width:145px">Acciones</th>                                            
            </tr>
            </thead>

            <tbody>

            <!-- LISTANDO LOS NEXSUS DE LA BD -->
            <?php
                  $item = null;
                  $valor = null;
        
                  $nexsus = ControladorNexsus::ctrMostrarNexsus($item, $valor);

                  foreach($nexsus as $key => $value) {
                    
                    echo ' <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["idnexus"].'</td>
                    <td>'.$value["nom_proyecto"].'</td>
                    <td>'.$value["punto_red"].'</td>
                    <td><b>$</b>&nbsp;&nbsp'.$value["costo"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarNexsus" idNexsus="'.$value["idnexus"].'" data-toggle="modal" data-target="#modalEditarNexsus"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Editar</button>
                        
                        <button class="btn btn-danger btnEliminarNexsus" idNexsus="'.$value["idnexus"].'"><i class="fa fa-times"></i>&nbsp;&nbsp;Eliminar</button>
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

<!--====================================================================================================================
                                                    MODAL EDITAR NEXSUS
=====================================================================================================================-->

<div id="modalEditarNexsus" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
                 CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">Editar Nexsus</h4>

        </div>

        <!--=====================================
                    CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PROYECTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-file-code-o"></i>&nbsp;&nbsp;Proyecto&nbsp;&nbsp;&nbsp;</span> 

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" required>

                 <input type="hidden"  name="idNexsus" id="idNexsus" required> 

              </div>

            </div>

             <!-- ENTRADA PARA EL PUNTO DE RED -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-dot-circle-o"></i>&nbsp;&nbsp;Punto Red</span> 

                <input type="text" class="form-control input-lg" name="editarPunto" id="editarPunto" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO DEL EQUIPO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-money"></i>&nbsp;&nbsp;Costo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 

                <input type="text" class="form-control input-lg" name="editarCosto" id="editarCosto" min="0" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

            $editarNexsus = new ControladorNexsus();
            $editarNexsus -> ctrEditarNexsus();

        ?> 

      </form>

    </div>

  </div>

</div>
<?php

  $borrarNexsus = new ControladorNexsus();
  $borrarNexsus -> ctrBorrarNexsus();

?>