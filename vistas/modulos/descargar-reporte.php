<?php

//MEDIANTE ESTE MÓDULO SE EJECUTARÁN LOS CONTROLADORES Y MODELOS DE LOS REPORTES A IMPRIMIR
require_once "../../controladores/consumo_recursos.controlador.php";
require_once "../../modelos/consumo_recursos.modelo.php";

$reporte = new ControladorConsumos();
$reporte -> ctrDescargarReporte();