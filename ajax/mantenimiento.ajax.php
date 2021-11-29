<?php

require_once "../controladores/Mantenimientos.controlador.php";
require_once "../modelos/Mantenimientos.modelo.php";

class AjaxMantenimientos{

/*=============================================
	        VALIDAR NO REPETIR ALP
=============================================*/	

	public $validarAlp;

	public function ajaxValidarAlp(){

		$item = "id_mantenimiento";
		$valor = $this->validarAlp;

		$respuesta = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor);

		echo json_encode($respuesta);

	}

}
/*=============================================
            VALIDAR NO REPETIR ALP
=============================================*/

if(isset( $_POST["validarAlp"])){

	$valAlp = new AjaxMantenimientos();
	$valAlp -> validarAlp = $_POST["validarAlp"];
	$valAlp -> ajaxValidarAlp();

}
