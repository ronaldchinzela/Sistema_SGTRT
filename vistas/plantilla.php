<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sistema de SGTRT</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- agregándo ícono en la pestaña de navegación -->
  <link rel="icon" href="vistas/img/plantilla/pestaña-icono.png">
<!--===========================================
                PLUGINS DE CSS   
============================================-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!--===========================================
             PLUGINS DE JAVASCRIPT   
============================================-->
<!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>

</head>
<!--===========================================
                CUERPO DEL DOCUMENTO
============================================-->
<body class="hold-transition skin-blue sidebar-mini login-page">

<!-- concatenando las vistas de la carpeta modulos -->
<?php
    //validando si el usuario inició sesión en el sistema
    if(isset($_SESION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    echo '<div class="wrapper">';

    //concatenando el encabezado
    include "modulos/cabezote.php";
    
    //concatenando el menú lateral izquierdo
    include "modulos/menu.php";

    //creando acceso rápido por el navegador haciendo uso del documento .htaccess
    //manadando por GET la ruta de todas las vistas de la página menu.php
     if(isset($_GET["ruta"])){
        if($_GET["ruta"] == "inicio" || 
           $_GET["ruta"] == "consumo-recursos" ||
           $_GET["ruta"] == "tarifario" ||
           $_GET["ruta"] == "resumen-servidores" ||
           $_GET["ruta"] == "usuarios" ||
           $_GET["ruta"] == "sow" ||
           $_GET["ruta"] == "costo-mantenimiento"){

    //concatenando las páginas con la extención .php
    include "modulos/".$_GET["ruta"].".php";
        
        }else{
            //redireccionando a una página sin resultado cuando ingresen una página que no esté declarada en ruta
            include "modulos/404.php";
        }
    }else{
        //en caso no se ingrese ninguna página en la url, redireccionará a inicio
        include "modulos/inicio.php";
    }

    //concatenando el pie de página
    include "modulos/footer.php";

    echo '</div>';
  }else{
      //si la persona no ha iniciado sesión, tendrá que logearse
      include "modulos/login.php";
  }
?>

<script src="vistas/js/plantilla.js"></script>
</body>
</html>
