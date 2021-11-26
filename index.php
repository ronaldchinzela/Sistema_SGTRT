<?php

//LLAMANDO A LOS CONTROLADORES DE LAS VISTAS 
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/Mantenimientos.controlador.php";
require_once "controladores/fourwalls.controlador.php";
require_once "controladores/nexsus.controlador.php";
require_once "controladores/hp.controlador.php";
require_once "controladores/licencias.controlador.php";
require_once "controladores/servidores_licencias.controlador.php";
require_once "controladores/consumo_recursos.controlador.php";
require_once "controladores/prueba.controlador.php";
require_once "controladores/cambio.controlador.php";
require_once "controladores/proyecto.controlador.php";

//LLAMANDO A LOS MODELOS DE LAS VISTAS
require_once "modelos/usuarios.modelo.php";
require_once "modelos/Mantenimientos.modelo.php";
require_once "modelos/fourwalls.modelo.php";
require_once "modelos/nexsus.modelo.php";
require_once "modelos/hp.modelo.php";
require_once "modelos/licencias.modelo.php";
require_once "modelos/servidores_licencias.modelo.php";
require_once "modelos/consumo_recursos.modelo.php";
require_once "modelos/prueba.modelo.php";
require_once "modelos/cambio.modelo.php";
require_once "modelos/proyecto.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
