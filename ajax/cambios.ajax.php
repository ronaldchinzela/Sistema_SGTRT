<?php

require_once "../controladores/cambios.controlador.php";
require_once "../modelos/cambios.modelo.php";

class AjaxCambios{

	/*=============================================
					EDITAR CAMBIO
	=============================================*/	

	public $idCambio;

	public function ajaxEditarCambio(){

		$item = "idtipo";
		$valor = $this->idCambio;

		$respuesta = ControladorCambios::ctrMostrarCambios($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
			CREANDO OBJETO EDITAR CAMBIO
=============================================*/	

if(isset($_POST["idCambio"])){

	$cambio = new AjaxCambios();
	$cambio -> idCambio = $_POST["idCambio"];
	$cambio -> ajaxEditarCambio();

}