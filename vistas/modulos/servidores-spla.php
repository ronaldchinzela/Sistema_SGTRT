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
                <th class="th008">Total</th>                                                 
            </tr>
            </thead>

            <tbody>

            <!-- LISTANDO SERVIDORES DE LA BD -->
            <?php
                  $item = null;
                  $valor = null;
        
                  $Servidores = ControladorServidoresLic::ctrMostrarServidoresLic($item, $valor);

                  foreach($Servidores as $key => $value) {
                    
                    echo ' <tr>

                    <td>'.$value["alp"].'</td>
                    <td>'.$value["nom_proyecto"].'</td>
                    <td>'.$value["vm"].'</td>
                    <td>'.$value["cpu"].'</td>
                    <td>'.$value["cod_lic"].'</td>';

                    $item = "id_licencia";
                    $valor = $value["id_licencia"];
  
                    $licencia = ControladorLicencias::ctrMostrarLicencias($item, $valor);

                    echo '<td>'.$licencia["tipo"].'</td>';

                    echo'<td>'.$value["lic_req"].'</td>
                    <td>S/&nbsp;&nbsp'.$value["total"].'</td>

                  </tr>';
                }
            ?>     
            
            </tbody>

        </table>
    </div>

</div>

</section>

</div>

