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

<!-- BOTONES-->
<input class="boton-listar-consultar" type="button" value="consultar" onclick="location.href='#'">


<!-- IMPORTAR ARCHIVO CSV -->
<form action="csv" enctype="multipart/form-data" method="POST">

<input type="file" name="csv" id="csv">

<button type="submit" class="btn btn-primary" id="enviar" name="enviar">Cargar Data</button>

</form>

    <!-- Tabla de usuarios -->
    <div class="box-body" id="boxxx">
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
                             if(is_array($nexsus)){
                             echo '<td><a href="costo-hp" class="href-costos-mantenimiento"><b>$</b>&nbsp;&nbsp'.$hp["costo"].'</a></td>';
                            }
                             //IMPRIMIENDO COLUMNA TOTAL_SOL Y TOTAL_DOLAR
                                    echo'
                                    <td><b>$</b>&nbsp;&nbsp;'.$value["total_dolar"].'</td>
                                    <td><b>S/.</b>&nbsp;&nbsp;'.$value["total_sol"].'</td>
                                    </tr>';  
                    
                } 
                
            ?>


            </tbody>

        </table>
    </div>

</div>

</section>

</div>