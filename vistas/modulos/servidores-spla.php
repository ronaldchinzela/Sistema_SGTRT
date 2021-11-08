<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
      
<h1 class="h1-titulo">
   SERVIDORES - LICENCIA SPLA
</h1>

</section>

<section class="content">

<div class="box">

<div class="box-header with-border">
    

</div>

<!-- botón consultar-->
<input class="btn btn-primary" id="ver-listado-1" type="button" value="Volver" onclick="location.href='licencia-spla'">

    <!-- Tabla de usuarios -->
    <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
            <tr>
                <th class="th003">ALP</th>
                <th class="th004">Proyecto</th>
                <th class="th005">VM</th>
                <th class="th006">CPU</th>
                <th class="th007">Código de licencia</th>
                <th class="th008">tipo</th>
                <th class="th008">lic. req</th>  
                <th class="th008">3000</th>                                                 
            </tr>
            </thead>

            <tbody>

            <!-- LISTANDO HP DE LA BD -->
            <?php
                  $item = null;
                  $valor = null;
        
                  $hp = ControladorHp::ctrMostrarHp($item, $valor);

                  foreach($hp as $key => $value) {
                    
                    echo ' <tr>

                    <td>'.$value["nom_proyecto"].'</td>
                    <td>'.$value["equipo"].'</td>
                    <td>'.$value["serie"].'</td>
                    <td>S/.&nbsp;&nbsp'.$value["costo"].'</td>
                    <td>'.$value["fec_inicio"].'</td>
                    <td>'.$value["fec_fin"].'</td>

                    <td> </td>
                    <td> </td>

                  </tr>';
                }
            ?>     
            
            </tbody>

        </table>
    </div>

</div>

</section>

</div>

