<?php

//LLAMANDO A LOS CONTROLADORES DE LAS VISTAS 
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/walls.controlador.php";
require_once "controladores/fourwalls.controlador.php";
require_once "controladores/nexsus.controlador.php";
require_once "controladores/hp.controlador.php";
require_once "controladores/licencias.controlador.php";
require_once "controladores/servidores_licencias.controlador.php";
require_once "controladores/consumo_recursos.controlador.php";

//LLAMANDO A LOS MODELOS DE LAS VISTAS
require_once "modelos/usuarios.modelo.php";
require_once "modelos/walls.modelo.php";
require_once "modelos/fourwalls.modelo.php";
require_once "modelos/nexsus.modelo.php";
require_once "modelos/hp.modelo.php";
require_once "modelos/licencias.modelo.php";
require_once "modelos/servidores_licencias.modelo.php";
require_once "modelos/consumo_recursos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
