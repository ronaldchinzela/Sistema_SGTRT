<?php

//LLAMANDO A LOS CONTROLADORES DE LAS VISTAS 
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";

//LLAMANDO A LOS MODELOS DE LAS VISTAS
require_once "modelos/usuarios.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();