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
   Costo Mantenimiento - HP Care
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
                <th>Proyecto</th>
                <th>Equipo</th>
                <th class="th005">serie</th>
                <th>Costo de equipo</th>
                <th>fecha de inicio de contrato</th>
                <th>fecha de fin de contrato</th>
                <th style="width:142px">Acciones</th>                                                 
            </tr>
            </thead>

            <tbody>

            <!-- LISTANDO HP DE LA BD -->
            <?php
                  $item = null;
                  $valor = null;

                  $params = [];
                  $split = explode('?', $_SERVER["REQUEST_URI"]);
                  if(isset($split[1])){
                    parse_str($split[1], $params);
                  }
                  
                  if(isset($params["idproyecto"])){
                   $item = "idproyecto";
                   $valor = $params["idproyecto"];
                  }
        
                  $hp = ControladorHp::ctrMostrarHp($item, $valor);

                  foreach($hp as $key => $value) {
                    
                    echo ' <tr>
                         <td>'.($key+1).'</td>
                         <td>'.$value["nombre"].'</td>
                         <td>'.$value["equipo"].'</td>
                         <td>'.$value["serie"].'</td>
                         <td><b>$</b>&nbsp;&nbsp'.number_format($value["costo"],2).'</td>
                         <td>'.$value["fec_inicio"].'</td>
                         <td>'.$value["fec_fin"].'</td>

                     <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarHp" idHp="'.$value["idhp"].'" data-toggle="modal" data-target="#modalEditarHp"><i class="fa fa-pencil"></i>&nbsp;Editar</button>
                        <button class="btn btn-danger btnEliminarHp" idHp="'.$value["idhp"].'" idProyecto="'.$value["idproyecto"].'"><i class="fa fa-times"></i>&nbsp;Eliminar</button>

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
                                                    MODAL EDITAR HP
=====================================================================================================================-->

<div id="modalEditarHp" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
                 CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">Editar HP - Care</h4>

        </div>

        <!--=====================================
                    CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL PROYECTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-file-code-o"></i>&nbsp;&nbsp;Proyecto</span> 

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" readonly>

                 <input type="hidden"  name="idHp" id="idHp" required> 

              </div>

            </div>

             <!-- ENTRADA PARA EL NOMBRE DEL EQUIPO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-laptop"></i>&nbsp;&nbsp;Equipo&nbsp;&nbsp;</span> 

                <input type="text" class="form-control input-lg" name="editarEquipo" id="editarEquipo" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA SERIE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Serie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 

                <input type="text" class="form-control input-lg" name="editarSerie" id="editarSerie" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO DEL EQUIPO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-money"></i>&nbsp;&nbsp;Costo&nbsp;&nbsp;&nbsp;&nbsp;</span> 

                <input type="text" class="form-control input-lg" name="editarCosto" id="editarCosto" min="0" onkeypress="return solonumeroCosto(event);" maxlength="9" onpaste="return false" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE INICIO -->

            <div class="form-group">

              <div class="input-group">
              
                <span class="input-group-addon" id="color-span"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Fecha Inicio</span> 

                <input type="text" class="form-control input-lg" name="editarFechaInicio" id="editarFechaInicio" required>

              </div>

            </div>
            <!-- ENTRADA PARA LA FECHA FIN -->

            <div class="form-group">

            <div class="input-group">

                <span class="input-group-addon" id="color-span"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Fecha Fin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 

                <input type="text" class="form-control input-lg" name="editarFechaFin" id="editarFechaFin" required>

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

            $editarHp = new ControladorHp();
            $editarHp -> ctrEditarHp();

        ?> 

      </form>

    </div>

  </div>

</div>

