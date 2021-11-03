<!-- Content Wrapper. Contains page content -->
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
<input class="boton-nexsus-atras" type="button" value="Ver listado" onclick="location.href='costo-mantenimiento'">

    <!-- Tabla de usuarios -->
    <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
            <tr>
                <th class="th003">Proyecto</th>
                <th class="th004">Equipo</th>
                <th class="th005">serie</th>
                <th class="th006">Costo de equipo</th>
                <th class="th007">fecha de inicio de contrato</th>
                <th class="th008">fecha de fin de contrato</th>                                                
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
                  </tr>';
                }
            ?>     
            
            </tbody>

        </table>
    </div>

</div>

</section>

</div>