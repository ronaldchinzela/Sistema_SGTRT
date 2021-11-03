<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
      
<h1>
   Costo Mantenimiento
</h1>

</section>

<section class="content">

<div class="box">

<div class="box-header with-border">
    

</div>

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

<!-- botón consultar-->
<input class="boton-listar-consultar" type="button" value="consultar" onclick="location.href='costo-mantenimiento'">


    <!-- Tabla de usuarios -->
    <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
            <tr>
                <th class="th02">ALP</th>
                <th class="th03">Proyecto</th>
                <th class="th04">Costo Mensual 4Walls</th>
                <th class="th05">Costo Nexsus</th>
                <th class="th06">Costo HP DC Care</th>
                <th class="th07">Total $</th>
                <th class="th08">Total S/.</th>                                              
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
                            <td>'.$value["alp"].'</td>
                            <td>'.$value["nom_proyecto"].'</td>';

                            
                            $item = "idfourwalls";
                            $valor = $value["costo_fourwalls"];
          
                            $fourwalls = ControladorFourwalls::ctrMostrarFourwalls($item, $valor);

                            echo '<td>'.$fourwalls["costo"].'</td>';
                             echo '<td>'.$value["idnexus"].'</td>
                                    <td>'.$value["idhp"].'</td>
                                    <td>'.$value["total_sol"].'</td>
                                    <td>'.$value["total_dolar"].'</td>
                                </tr>';  
                    
                } 
                
            ?>


            </tbody>

        </table>
    </div>

</div>

</section>

</div>