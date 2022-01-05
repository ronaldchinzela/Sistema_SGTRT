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
   Costo Mantenimiento
</h1>

</section>

<section class="content">

<div class="box">

<button class="btn btn-primary" id="btn-mantenimientoCosto" data-toggle="modal" data-target="#modalAgregarFourwalls">
          
          Agregar costo Fourwalls

</button>

<button class="btn btn-primary" id="btn-mantenimientoCosto" data-toggle="modal" data-target="#modalAgregarNexus">
          
          Agregar costo Nexsus

</button>

<button class="btn btn-primary" id="btn-mantenimientoCosto" data-toggle="modal" data-target="#modalAgregarHp">
          
          Agregar costo HP

</button>

<!-- Combox de actividad  -->
<select class="cbo-año">                            
    <option>Año</option>  
    <option>2021</option>
    <option>2020</option> 
    <option>2019</option>
    <option>2018</option>  
    <option>2017</option>                                     
</select><br>

<select class="cbo-mes">                              
    <option>Mes</option>  
    <option>Junio</option>
    <option>Julio</option> 
    <option>Agosto</option>  
    <option>Setiembre</option>  
    <option>Octubre</option>                                   
</select><br>

<!-- BOTONES-->
<input class="boton-listar-consultar" type="button" value="consultar" onclick="location.href='#'">


<!-- IMPORTAR ARCHIVO CSV -->
<form method="POST" enctype="multipart/form-data" id="filesForm">

<input type="file" name="fileName" id="fileId" onchange="return validarCsv()">

<button type="button" onclick="upCSV()" class="btn btn-primary" id="enviar" disabled>Cargar Data</button>

</form>

<!-- Tabla de usuarios -->
<div class="box-body" id="table-id">
    <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>
        <tr>
            <th style="width:10px">&#8470;</th>
            <th>ALP</th>
            <th style="width:160px">Proyecto</th>
            <th style="width:135px">Costo Mensual 4Walls</th>
            <th>Costo Nexsus</th>
            <th>Costo HP DC Care</th>
            <th>Total Dólares</th>                                              
            <th>Total Soles</th>
        </tr>
        </thead>

            <tbody>

    <!-- HACIENDO EL LLAMADO A LA LISTA DE PROYECTOS Y COSTOS DE LA BD -->
    <?php
        $item = null;

        $valor = null;

        $proyectos = ControladorProyectos::ctrMostrarProyectos($item, $valor);

        foreach ($proyectos as $key => $value) {
        echo '<tr>
                <td>'.($key+1).'</td>         
              
                <td>'.sprintf("%'.06d\n", $value["idproyecto"]).'</td> 
                <td>'.$value["nombre"].'</td>';
                
                //TRAER FOURWALLS POR CÓDIGO ALP
                //VALIDANDO SI EL CAMPO COSTO NO ESTÁ VACÍO (NULL) MOSTRARÁ EL COSTO
                if($value["costofourwalls"] != null){
                echo'<td><a href="costo-fourwalls?idproyecto=' .$value["idproyecto"] . '" class="verFourwalls"><b>$</b>&nbsp;&nbsp'.number_format($value["costofourwalls"],2).'</a></td>';
                }

                //SI EL CAMPO COSTO NO TIENE VALOR (ES = NULL) MOSTRARÁ STRING 0
                else {
                  echo '<td style="color:#000"><b>$&nbsp;&nbsp</b>0</td>';
                }
                
                //TRAER NEXSUS POR CÓDIGO ALP            
                if($value["costonexus"] != null){
                echo'<td><a href="costo-nexsus?idproyecto=' .$value["idproyecto"] . '" class="verNexus"><b>$</b>&nbsp;&nbsp'.number_format($value["costonexus"],2).'</a></td>';
                }
                
                else {
                  echo '<td style="color:#000"><b>$&nbsp;&nbsp</b>0</td>';
                }

                //TRAER HP POR CÓDIGO ALP 
                if($value["costohp"] != null){
                echo'<td><a href="costo-hp?idproyecto=' .$value["idproyecto"] . '" class="verHp"><b>$</b>&nbsp;&nbsp'.number_format($value["costohp"],2).'</a></td>';
                }
                else {
                  echo '<td style="color:#000"><b>$&nbsp;&nbsp</b>0</td>';
                }
                
                //SUMA TOTAL DE COSTOS EN DÓLARES
                echo'<td><b>$</b>&nbsp;&nbsp;'.number_format($value["costofourwalls"] + $value["costonexus"] + $value["costohp"],2).'</td>';


                //TRAYENDO TC Y MULTIPLICANDOLO POR EL TOTAL DE LOS COSTOS
                $item = null;
                $valor = null;
            
                $cambios = ControladorCambios::ctrMostrarCambios($item, $valor);
            
                foreach ($cambios as $key => $valueTC){
                
                 echo '<td><b>S/.</b>&nbsp;&nbsp;'.number_format(($value["costofourwalls"] + $value["costonexus"] + $value["costohp"])*$valueTC["valor"],2).'</td>';
                
                }
                  
          } 
              
          
        ?>


        </tbody>

    </table>
</div>


</div>

</section>


</div>

<!--=================================================================================================================================================
                                                MODAL AGREGAR FOURWALLS
==================================================================================================================================================-->
<div id="modalAgregarFourwalls" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content" id="modal-content-fourwalls">

      <form role="form" method="post" id="dimensiones-form-fourwalls" onsubmit="return validarF();">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">REGISTRO - NUEVO FOURWALLS</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
                          
          <!-- ENTRADA PARA EL CÓDIGO ALP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="nuevoAlpSpan"><i class="fa fa-code">&nbsp;&nbsp;Código ALP&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoAlpFourwalls" name="nuevoCodigoFourwalls" onkeypress="return solonumeroMantenimiento(event);" maxlength="6" onpaste="return false" placeholder="Ingresar el código ALP" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DEL EQUIPO FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoFourwalls"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Equipo 4walls</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoEquipoFourwalls" name="nuevoEquipoFourwalls" placeholder="Nombre equipo 4walls" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA SERIE FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoFourwalls"><i class="fa fa-barcode">&nbsp;&nbsp;Serie 4walls&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoSerieFourwalls" name="nuevoSerieFourwalls" placeholder="Serie 4walls" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO DEL FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="costoFourwallsSpan"><i class="fa fa-money">&nbsp;&nbsp;Costo 4walls&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCostoFourwalls" name="nuevoCostoFourwalls" onkeypress="return solonumeroCosto(event);" maxlength="11" onpaste="return false" placeholder="Costo 4walls" required>               
              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA INICIO FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoFourwalls"><i class="fa fa-calendar">&nbsp;&nbsp;Fecha inicio&nbsp;&nbsp;</i></span> 

                <input type="date" class="form-control input-lg" id="nuevoFechaInicioFourwalls" name="nuevoFechaInicioFourwalls" required>
              
              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA FIN FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoFourwalls"><i class="fa fa-calendar">&nbsp;&nbsp;Fecha fin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="date" class="form-control input-lg" id="nuevoFechaFinFourwalls" name="nuevoFechaFinFourwalls" required>

              </div>

            </div>
           
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" id="pie-mantenimiento">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Registrar Fourwalls</button>

        </div>

      </form>

      <?php

        $crearFourwalls = new ControladorMantenimientos();
        $crearFourwalls -> ctrCrearFourwalls();
      
      ?>

    </div>

  </div>

</div>

<!--=================================================================================================================================================
                                                MODAL AGREGAR NEXSUS
==================================================================================================================================================-->

<div id="modalAgregarNexus" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content" id="modal-content-nexus">

      <form role="form" method="post" id="dimensiones-form-nexus">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">REGISTRO - NUEVO COSTO NEXSUS</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
                          
          <!-- ENTRADA PARA EL CÓDIGO ALP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="nuevoAlpSpan"><i class="fa fa-code">&nbsp;&nbsp;Código ALP&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoAlpNexus" name="nuevoCodigoNexus" onkeypress="return solonumeroMantenimiento(event);" maxlength="6" onpaste="return false" placeholder="Ingresar el código ALP" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PUNTO DE RED NEXSUS-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoNexus"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Punto de red&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoPuntoRedNexsus" name="nuevoPuntoRedNexsus"  onkeypress="return solonumeroPunto(event);" maxlength="3" onpaste="return false"  placeholder="Puntos de red nexsus" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO NEXSUS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoNexus"><i class="fa fa-money">&nbsp;&nbsp;Costo Nexsus</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCostoNexsus" name="nuevoCostoNexsus" onkeypress="return solonumeroCosto(event);" maxlength="11" onpaste="return false" placeholder="Costo nexsus" required>

              </div>

            </div>
           
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" id="pie-mantenimiento">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Registrar Nexsus</button>

        </div>

      </form>

      <?php

        $crearNexus = new ControladorMantenimientos();
        $crearNexus -> ctrCrearNexus();

      ?>

    </div>

  </div>

</div>

<!--=================================================================================================================================================
                                                  MODAL AGREGAR HP
==================================================================================================================================================-->

<div id="modalAgregarHp" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content" id="modal-content-hp">

      <form role="form" method="post" id="dimensiones-form-hp" onsubmit="return validarH();">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">REGISTRO - NUEVO COSTO HP</h4>

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

                <input type="text" class="form-control input-lg" id="nuevoAlpHp" name="codigoAlpHp" onkeypress="return solonumeroMantenimiento(event);" maxlength="6" onpaste="return false" placeholder="Ingresar el código ALP" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DE EQUIPO HP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Equipo Hp&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoEquipoHp" name="nuevoEquipoHp" placeholder="Nombre equipo hp" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA SERIE HP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-barcode">&nbsp;&nbsp;Serie Hp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoSerieHp" name="nuevoSerieHp" placeholder="Número serie hp" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO HP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-money">&nbsp;&nbsp;Costo Hp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCostoHp" name="nuevoCostoHp" onkeypress="return solonumeroCosto(event);" maxlength="11" onpaste="return false" placeholder="Costo hp" required>

              </div>

            </div>

           <!-- ENTRADA PARA LA FECHA INICIO HP -->
            
           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-calendar">&nbsp;&nbsp;Fecha inicio&nbsp;</i></span> 

                <input type="date" class="form-control input-lg" id="nuevoFechaInicioHp" name="nuevoFechaInicioHp" required>

              </div>

            </div>
            

            <!-- ENTRADA PARA LA FECHA FIN HP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-calendar">&nbsp;&nbsp;Fecha fin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="date" class="form-control input-lg" id="nuevoFechaFinHp" name="nuevoFechaFinHp" required>

              </div>

            </div>
           
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" id="pie-mantenimiento">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Registrar HP</button>

        </div>

      </form>

      <?php

        $crearHp = new ControladorMantenimientos();
        $crearHp -> ctrCrearHp();

      ?>

    </div>

  </div>

</div>