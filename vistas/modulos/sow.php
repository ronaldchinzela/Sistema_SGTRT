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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<h1>
SOW
</h1>

    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active">Home</li>
    </ol>
</section>

<!-- Contenido temporal para la página de inicio -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
    <h3 class="box-title">Sistema para el control de tarifarios</h3>

    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
        <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
</div>
    <div class="box-body">
    Infraestructura TI
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        SGTRT
    </div>
    <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->