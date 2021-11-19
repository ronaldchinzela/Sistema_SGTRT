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
            <th class="th02">ALP</th>
            <th class="th03">Proyecto</th>
            <th class="th04">Costo Mensual 4Walls</th>
            <th class="th05">Costo Nexsus</th>
            <th class="th06">Costo HP DC Care</th>
            <th class="th08">Total Dólares</th>                                              
            <th class="th07">Total Soles</th>
        </tr>
        </thead>

            <tbody>

    <!-- HACIENDO EL LLAMADO A LA LISTA DE COSTO MANTENIMIENTO DE LA BD -->
    <?php
        $item = null;

        $valor = null;

        $walls = ControladorWalls::ctrMostrarWalls($item, $valor);

        foreach ($walls as $key => $value) {

        echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$value["alp"].'</td>
                <td>'.$value["nom_proyecto"].'</td>';

                //TRAYENDO COSTO DE FOURWALLS 
                //La variable $item almacena el id de la llave foranea
                //La variable $valor almacena el nombre del campo de la llave foranea de la tabla actual, donde traerá
                //el registro extraido de la llave foránea  
                $item = "idfourwalls";
                $valor = $value["costo_fourwalls"];

                $fourwalls = ControladorFourwalls::ctrMostrarFourwalls($item, $valor);
                if(is_array($fourwalls)){
                echo '<td><a href="costo-fourwalls" class="href-costos-mantenimiento"><b>$</b>&nbsp;&nbsp'.$fourwalls["costo"].'</a></td>';
                }
                //TRAYENDO COSTO DE NEXUS
                $item = "idnexus";
                $valor = $value["costo_nexus"];

                $nexsus = ControladorNexsus::ctrMostrarNexsus($item, $valor);
                if(is_array($nexsus)){
                    echo '<td><a href="costo-nexsus" class="href-costos-mantenimiento"><b>$</b>&nbsp;&nbsp'.$nexsus["costo"].'</a></td>';
                }
                    //TRAYENDO COSTO DE HP
                    $item = "idhp";
                    $valor = $value["costo_hp"];

                    $hp = ControladorHp::ctrMostrarHp($item, $valor);
                    if(is_array($hp)){
                    echo '<td><a href="costo-hp" class="href-costos-mantenimiento"><b>$</b>&nbsp;&nbsp'.$hp["costo"].'</a></td>';
                }
                    //IMPRIMIENDO COLUMNA TOTAL_SOL Y TOTAL_DOLAR
                    if(is_array($fourwalls)){
                        echo'
                        
                        <td><b>$</b>&nbsp;&nbsp;'.$fourwalls["costo"] + $nexsus["costo"] + $hp["costo"].'</td>
                        
                        <td><b>S/.</b>&nbsp;&nbsp;'.$value["total_sol"].'</td>
                        </tr>';  
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
                                               MODAL AGREGAR MANTENIMIENTO
==================================================================================================================================================-->

<div id="modalAgregarMantenimiento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

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
