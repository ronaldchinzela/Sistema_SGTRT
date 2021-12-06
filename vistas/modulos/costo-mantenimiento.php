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



<button class="btn btn-primary" id="btn-mantenimiento" data-toggle="modal" data-target="#modalAgregarMantenimiento">
          
          Agregar nuevo registro

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
              
                <td>'.$value["idproyecto"].'</td>
                <td>'.$value["nombre"].'</td>
                <td><a href="costo-fourwalls" class="verFourwalls"><b>$</b>&nbsp;&nbsp'.number_format($value["costofourwalls"],2).'</a></td>
                <td><a href="costo-nexsus" class="verNexus"><b>$</b>&nbsp;&nbsp'.number_format($value["costonexus"],2).'</a></td>
                <td><a href="costo-hp" class="verHp"><b>$</b>&nbsp;&nbsp'.number_format($value["costohp"],2).'</a></td>
                <td><b>$</b>&nbsp;&nbsp;'.number_format($value["costofourwalls"] + $value["costonexus"] + $value["costohp"],2).'</td>';


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

<form id="formFourwalls">

<input type="hidden" id="idFourwalls" name="idFourwalls">

</form>

<!--=================================================================================================================================================
                                               MODAL AGREGAR MANTENIMIENTO
==================================================================================================================================================-->

<div id="modalAgregarMantenimiento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content" id="modal-content-mantenimiento">

      <form role="form" method="post" id="dimensiones-form-mantenimiento">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" id="center-titulo">REGISTRO - NUEVO MANTENIMIENTO</h4>

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

                <input type="text" class="form-control input-lg" id="nuevoAlp" name="nuevoCodigo" onkeypress="return solonumeroMantenimiento(event);" maxlength="6" onpaste="return false" placeholder="Ingresar el código ALP" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DEL PROYECTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="alpCod"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Proyecto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoMantenimiento" name="nuevoMantenimiento" placeholder="Ingresar nombre de proyecto" required>

              </div>

            </div>

            <!--<div class="col-xs-6" style="padding-left:0px"> -->
            <!-- ENTRADA PARA EL NOMBRE DEL EQUIPO FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoFourwalls"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Equipo 4walls&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoEquipoFourwalls" name="nuevoEquipoFourwalls" placeholder="Nombre equipo 4walls" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA SERIE FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoFourwalls"><i class="fa fa-barcode">&nbsp;&nbsp;Serie 4walls&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoSerieFourwalls" name="nuevoSerieFourwalls" placeholder="Serie 4walls" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO DEL FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="costoFourwallsSpan"><i class="fa fa-money">&nbsp;&nbsp;Costo 4walls&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCostoFourwalls" name="nuevoCostoFourwalls" onkeypress="return solonumeroCosto(event);" maxlength="11" onpaste="return false" placeholder="Costo 4walls" required>               
              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA INICIO FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoFourwalls"><i class="fa fa-calendar">&nbsp;&nbsp;Fecha inicio 4walls</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoFechaInicioFourwalls" name="nuevoFechaInicioFourwalls" placeholder="Fecha inicio 4walls" required>
              
              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA FIN FOURWALLS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoFourwalls"><i class="fa fa-calendar">&nbsp;&nbsp;Fecha fin 4walls&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoFechaFinFourwalls" name="nuevoFechaFinFourwalls" placeholder="Fecha fin 4walls" required>

              </div>

            </div>

          <!--  </div> -->
            <!-- ENTRADA PARA EL PUNTO DE RED NEXSUS-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoNexus"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Punto de red Nexsus</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoPuntoRedNexsus" name="nuevoPuntoRedNexsus"  onkeypress="return solonumeroPunto(event);" maxlength="3" onpaste="return false"  placeholder="Puntos de red nexsus" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO NEXSUS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoNexus"><i class="fa fa-money">&nbsp;&nbsp;Costo Nexsus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCostoNexsus" name="nuevoCostoNexsus" onkeypress="return solonumeroCosto(event);" maxlength="11" onpaste="return false" placeholder="Costo nexsus" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DE EQUIPO HP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-pencil-square-o">&nbsp;&nbsp;Equipo Nexsus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoEquipoHp" name="nuevoEquipoHp" placeholder="Nombre equipo hp" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA SERIE HP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-barcode">&nbsp;&nbsp;Serie Nexsus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoSerieHp" name="nuevoSerieHp" placeholder="Número serie hp" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COSTO HP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-money">&nbsp;&nbsp;Costo Hp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCostoHp" name="nuevoCostoHp" onkeypress="return solonumeroCosto(event);" maxlength="11" onpaste="return false" placeholder="Costo hp" required>

              </div>

            </div>

           <!-- ENTRADA PARA LA FECHA INICIO HP -->
            
           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-calendar">&nbsp;&nbsp;Fecha inicio HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoFechaInicioHp" name="nuevoFechaInicioHp" placeholder="Fecha inicio hp" required>

              </div>

            </div>
            

            <!-- ENTRADA PARA LA FECHA FIN HP -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon" id="equipoHp"><i class="fa fa-calendar">&nbsp;&nbsp;Fecha fin HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></span> 

                <input type="text" class="form-control input-lg" id="nuevoFechaFinHp" name="nuevoFechaFinHp" placeholder="Fecha fin hp" required>

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

        $crearMantenimiento = new ControladorMantenimientos();
        $crearMantenimiento -> ctrCrearMantenimiento();

      ?>

    </div>

  </div>

</div>
