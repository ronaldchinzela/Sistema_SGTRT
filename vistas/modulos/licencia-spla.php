<div class="content-wrapper">

  <section class="content-header">
    
    <h1 class="h1-titulo">
      
      LICENCIA - SPLA
    
    </h1>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLicencia">
          
          Agregar nueva licencia

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
            <th>Código licencia</th>
            <th>Nombre de licencia</th>
            <th>Tipo SO</th>
            <th>Costo</th>
            <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $Licencias = ControladorLicencias::ctrMostrarLicencias($item, $valor);

            foreach ($Licencias as $key => $value) {
              

              echo '<tr>

                      <td>'.$value["cod_licencia"].'</td>

                      <td>'.$value["nom_licencia"].'</td>';

                      echo '<td>'.$value["tipo"].'</td>';         

                      echo'<td><b>$</b>&nbsp;'.$value["costo"].'</td>

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-warning btnEditarLicencia" data-toggle="modal" data-target="#modalEditarLicencia" idLicencia="'.$value["id_licencia"].'"><i class="fa fa-pencil"></i>&nbsp;&nbsp;<b>Editar</b></button>

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
                                                    MODAL AGREGAR LICENCIA
==================================================================================================================================================-->

<div id="modalAgregarLicencia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">REGISTRO - LICENCIA - SPLA</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoCosto" placeholder="Ingresar el costo" required>

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
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" required>
                <input type="hidden" id="idLicencia" name="idLicencia">

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DE LICENCIA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarLicencia" id="editarLicencia" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarTipo" required>

                  <option value="" id="editarTipo"></option>
                  <option value="Office">Office</option>
                  <option value="Sqlserver">Sqlserver</option>
                  <option value="Remote">Remote</option>             
                  <option value="Sqlserverdos">Sqlserver - 2</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCosto" id="editarCosto" required>

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

