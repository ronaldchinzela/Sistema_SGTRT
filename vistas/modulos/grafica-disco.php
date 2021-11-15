<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<h1 class="h1-grafica">
UNMONRB103
</h1>

    </section>

    <!-- Main content -->
    <section class="content" id="section-1">

 <!-- Fecha inicio-->
 <h6 id="h6-grafica"><b>Fecha Inicio:</b></h6><input id="fecha-grafica" type="date">
                            
<!-- Fecha fin-->
<h6 id="h6-grafica-fin"><b>Fecha Fin:</b></h6><input id="fecha-grafica-fin" type="date">


<!-- botón volver a reporte de consumo-->
<input class="btn btn-primary" id="volver-1" type="button" value="Volver" onclick="location.href='consumo-recursos'">
<input class="btn btn-primary" id="volver-1" type="button" value="Generar reporte" onclick="location.href='#'">
<input class="btn btn-primary" id="ver-2" type="button" value="Ver cpu" onclick="location.href='grafica'">
<input class="btn btn-primary" id="ver-2" type="button" value="Ver memoria" onclick="location.href='grafica-memoria'">


      <div class="box">
        <div class="col-md-0">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" id="h3-cpu"><b>DISCO</b></h3>

            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
      </div>

    </section>
    </div>
    <!-- /.content -->

    <script>

    $(document).ready(function(){


        //Solicitud de la data en Ajax
        $.ajax({
            url: "ajax/graficos.ajax.php",
            method: "GET",
            success: function(respuesta){
                console.log(respuesta);
            }
        });


        // LINE CHART
        var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
            {y: '2011 Q1', item1: 2666},
            {y: '2011 Q2', item1: 2778},
            {y: '2011 Q3', item1: 4912},
            {y: '2011 Q4', item1: 3767},
            {y: '2012 Q1', item1: 6810},
            {y: '2012 Q2', item1: 5670},
            {y: '2012 Q3', item1: 4820},
            {y: '2012 Q4', item1: 15073},
            {y: '2013 Q1', item1: 10687},
            {y: '2013 Q2', item1: 8432}
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
        });

    })

    </script>