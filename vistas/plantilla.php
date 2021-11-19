<?php
     session_start();
?>

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

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!--===========================================
             PLUGINS DE JAVASCRIPT   
============================================-->
<!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
<!-- SweetAlert 2 -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

<!-- Morris.js charts -->
<script src="vistas/bower_components/raphael/raphael.min.js"></script>
<script src="vistas/bower_components/morris.js/morris.min.js"></script>

</head>
<!--===========================================
                CUERPO DEL DOCUMENTO
============================================-->
<body class="hold-transition skin-blue sidebar-mini login-page">

<!-- concatenando las vistas de la carpeta modulos -->
<?php
    //validando si el usuario inició sesión en el sistema
    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

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
           $_GET["ruta"] == "costo-mantenimiento" || 
           $_GET["ruta"] == "costo-fourwalls" ||
           $_GET["ruta"] == "costo-nexsus" || 
           $_GET["ruta"] == "costo-hp" ||
           $_GET["ruta"] == "licencia-spla" ||
           $_GET["ruta"] == "servidores-spla" ||
           $_GET["ruta"] == "grafica" ||
           $_GET["ruta"] == "grafica-memoria" ||
           $_GET["ruta"] == "grafica-disco" ||
           $_GET["ruta"] == "prueba" ||
           $_GET["ruta"] == "salir"){

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

<!-- vinculando los archivos js de la carpeta vistas/js/ -->
<script src="vistas/js/plantilla.js"></script>  
<script src="vistas/js/usuarios.js"></script> 
<script type="text/javascript" src="vistas/js/walls.js"></script>
<script src="vistas/js/fourwalls.js"></script>
<script src="vistas/js/nexsus.js"></script>
<script src="vistas/js/hp.js"></script>  
<script src="vistas/js/licencias.js"></script>
<script type="text/javascript" src="vistas/js/mantenimiento.js"></script>
</body>
</html>
