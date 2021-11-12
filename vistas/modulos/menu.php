<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            
        <!-- creando accesos con privilegios a los usuarios logeados -->
        <?php
            //Si el usuario es administrador o analista, tendrá acceso al módulo de reportes
            if($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Analista"){
               
                //BOTÓN MENÚ DE INICIO
                echo'<li class="inicio-caja">

                <a href="inicio">

                <i class="fa fa-home"></i>
                <span>Inicio</span>

                </a>
                    </li>
                    <!-- MÓDULO REPORTES -->
                    <li class="treeview">
                        <a href="#">
                            <i class="app-menu__icon fa fa-file-text-o"></i>
                            <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <!-- menú desplegable reportes -->
                        <ul class="treeview-menu">
                            <li>
                                <a href="consumo-recursos">
                                    <i class="fa fa-share"></i>
                                    <span>Consumo Recursos TI</span>
                                </a>
                            </li>
                            <li>
                                <a href="tarifario">
                                    <i class="fa fa-share"></i>
                                    <span>Tarifario TI</span>
                                </a>
                            </li>
                            <li>
                                <a href="resumen-servidores">
                                    <i class="fa fa-share"></i>
                                    <span>Resumen de Servidores</span>
                                </a>
                            </li>
                        </ul>
                    </li>';
            }

            //MÓDULO USUARIOS
            //Si el usuario es administrador, tendrá acceso al resto de módulos
            if($_SESSION["rol"] == "Administrador"){
    
            echo'<li class="treeview">
                <a href="#">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span>Usuarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                </a>
                <!-- menú desplegable Usuarios -->
                <ul class="treeview-menu">
                    <li>
                        <a href="usuarios">
                            <i class="fa fa-share"></i>
                            <span>Gestionar Usuario</span>
                        </a>
                    </li>                  
                </ul>
            </li>

            <!-- MÓDULO CALCULADORA SOW -->          
            <li class="treeview">
                <a href="#">
                    <i class="app-menu__icon fa fa-cogs"></i>
                    <span>Calculadora SOW</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <!-- menú desplegable calculadora sow -->
                <ul class="treeview-menu">
                    <li>
                        <a href="sow">
                            <i class="fa fa-share"></i>
                            <span>SOW</span>
                        </a>
                    </li>
                    <li>
                        <a href="costo-mantenimiento">
                            <i class="fa fa-share"></i>
                            <span>Costo mantenimiento</span>
                        </a>
                    </li>
                    <li>
                        <a href="licencia-spla">
                            <i class="fa fa-share"></i>
                            <span>Licencia SPLA</span>
                        </a>
                    </li>';


                }
                    ?>
                </ul>
            </li>
        </ul>
    </section>

</aside>