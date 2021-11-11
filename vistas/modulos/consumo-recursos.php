<div class="content-wrapper">

<section class="content-header">
      
<h1 class="h1-titulo">
   REPORTE - CONSUMO RECURSOS TI
</h1>

</section>

<section class="content">

<div class="box">

<div class="box-header with-border">
    

</div>


<!-- BOTONES Y CONSULTAS -->



<!-- botón consultar-->
<input class="btn btn-primary" type="button" value="consultar" onclick="location.href='consumo-recursos'">


    <!-- Tabla de usuarios -->
    <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
            <tr>
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
         
                 $walls = ControladorConsumos::ctrMostrarConsumos($item, $valor);

                 foreach ($walls as $key => $value) {

                   echo '<tr>
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