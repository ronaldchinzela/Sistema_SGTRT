<header class="main-header">

<!--===========================================
    LOGOTIPO
============================================-->
<a href="inicio" class="logo" id="fondo-logo-canvia">
  <!-- logo mini -->
  <span class="logo-mini">
  <img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:1px 1px"> 
  </span>
  
  <!-- logo normal -->
    <span class="logo-lg">
        <img src="vistas/img/plantilla/logo-largo.png" class="img-responsive" style="padding:1px 0px">
    </span>
</a>

<!--===========================================
    BARRA DE NAVEGACIÓN
============================================-->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Botón de navegación -->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <!-- perfil del usuario logeado-->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    
                    <!-- imagen referencial en la foto del usuario logeado -->
                    <img src="vistas/img/plantilla/anonimo.png" class="user-image">

                    <!-- imprimiendo el nombre y apellido concatenado, del usuario logeado -->
                    <span class="hidden-xs"><?php echo $_SESSION["nombres"]." ".$_SESSION["apellidos"] ?></span>
                </a>
    <!-- menú desplegable del usuario logeado-->
                <ul class="dropdown-menu ">
                    <li class="user-body">
                        <div class="pull-right">
                            <a href="salir" class="btn btn-default btn-flat">Salir</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</nav>
</header>