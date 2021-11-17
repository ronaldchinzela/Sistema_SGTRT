<div class="content-wrapper">

<section class="content-header">
      
<h1 class="h1-titulo">
   REPORTE - CONSUMO RECURSOS TI
</h1>

</section>

<section class="content">

<div class="box" id="box-consumo">

<!-- Buscador cliente -->
<h6 id="h6-cliente">Cliente:</h6><input id="input-buscar-cliente" class="form-control form-control-sm ml-5 w-30" type="text" placeholder="  Buscar por cliente"
    aria-label="Search">

<!-- Buscador Hostname -->
<h6 id="h6-buscador-hostname">Hostname/VMware:</h6><input id="input-buscar-hostname" class="form-control form-control-sm ml-5 w-30" type="text" placeholder="  Buscar por VMware"
    aria-label="Search">


 <!-- Fecha inicio-->
 <h6 id="h6-1"><b>Fecha Inicio:</b></h6><input id="fecha-1" type="date">
                            
<!-- Fecha fin-->
<h6 id="h6-fin-1"><b>Fecha Fin:</b></h6><input id="fecha-fin-1" type="date">

<!-- BOTONES Y CONSULTAS -->

<!-- botón consultar-->
<input class="btn btn-primary" id="boton-consultar" type="button" value="consultar" onclick="location.href='#'">

<!-- ENLACE PARA LA EXPORTACIÓN DEL REPORTE EN EXCEL -->
<?php

 //SI EXISTE UNA FECHA INICIAL Y FINAL SELECCIONADA
if(isset($_GET["fechaInicial"])){

  echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

 //DE LO CONTRARIO IMPRIMIR REPORTE SIN RANGO DE FECHA
}else{

   echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

}         

?>
<input class="btn btn-primary" id="reporte-consumo" type="button" value="Generar reporte" onclick="location.href='vistas/modulos/imprimir-reporte.php?reporte=reporte'">
</a>

    <!-- TABLA DE CONSUMO RECURSOS TI -->
    <div class="box-body" id="tabla-recursos">
        
        <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
            <tr>
                <th style="width:10px">&#8470;</th>
                <th class="th02">Activo</th>
                <th class="th03">ALP</th>
                <th class="th04">Proyecto</th>
                <th class="th05">Servidor</th>
                <th class="th06">CPU</th>
                <th class="th07">Memoria</th>
                <th class="th08">Disco</th>
                <th class="th08">Servicio</th>
                <th class="th08">Gráfica</th>                                              
            </tr>
            </thead>

             <tbody>

            <!-- HACIENDO EL LLAMADO A LA TABLA DE CONSUMO RECURSOS DE LA BD -->
            <?php
                 $item = null;

                 $valor = null;
         
                 $consumo = ControladorConsumos::ctrMostrarConsumos($item, $valor);

                 foreach ($consumo as $key => $value) {

                   echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["activo"].'</td>
                            <td>'.$value["alp"].'</td>
                            <td>'.$value["proyecto"].'</td>
                            <td>'.$value["servidor"].'</td>
                            <td>'.$value["cpu"].'</td>
                            <td>'.$value["memoria"].'</td>
                            <td>'.$value["disco"].'</td>
                            <td>'.$value["servicio"].'</td>
                            <td><a href="grafica" class="href-ver-gráfica"><i><b><u>Ver gráfica</u></b></i></a></td>
                            </tr>';  
                    
                } 
                
            ?>

            </tbody>

        </table>

    </div>

  </div>

</section>

</div>