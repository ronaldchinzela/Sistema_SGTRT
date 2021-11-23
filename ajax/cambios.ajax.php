<?php

require_once "../controladores/cambio.controlador.php";
require_once "../modelos/cambio.modelo.php";

class AjaxCambios{

	/*=============================================
					EDITAR CAMBIO
	=============================================*/	

	public $idCambio;

	public function ajaxEditarCambio(){

		//RECIBIENDO LA RESPUESTA DEL MODELO Y CONTROLADOR

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

	$editar = new AjaxCambios();
	$editar -> idCambio = $_POST["idCambio"];
	$editar -> ajaxEditarCambio();

}