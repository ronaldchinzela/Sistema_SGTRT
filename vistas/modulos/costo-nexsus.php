<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
      
<h1>
   Costo Mantenimiento - Nexsus
</h1>

</section>

<section class="content">

<div class="box">

<div class="box-header with-border">
    

</div>

<!-- botón consultar-->
<input class="boton-nexsus-atras" type="button" value="Ver listado" onclick="location.href='costo-mantenimiento'">
<input class="boton-nexsus-modificar" type="button" value="Modificar" onclick="location.href='costo-mantenimiento'">

    <!-- Tabla de usuarios -->
    <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
            <tr>
                <th class="th003">ALP</th>
                <th class="th004">Proyecto</th>
                <th class="th005">Punto de red</th>
                <th class="th006">Costo</th>                                           
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

                    <td>'.$value["idnexus"].'</td>
                    <td>'.$value["nom_proyecto"].'</td>
                    <td>'.$value["punto_red"].'</td>
                    <td>S/.&nbsp;&nbsp'.$value["costo"].'</td>
                  </tr>';
                }
            ?>     
            
            </tbody>

        </table>
    </div>

</div>

</section>

</div>