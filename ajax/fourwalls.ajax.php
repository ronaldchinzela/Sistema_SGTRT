<?php

require_once "../controladores/fourwalls.controlador.php";
require_once "../modelos/fourwalls.modelo.php";

class AjaxFourwalls{

	/*=============================================
					EDITAR 4WALL
	=============================================*/	

	public $idFourwalls;

	public function ajaxEditarFourwalls(){

		$item = "idfourwalls";
		$valor = $this->idFourwalls;

		$respuesta = ControladorFourwalls::ctrMostrarFourwalls($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
				EDITAR 4WALL
=============================================*/	
if(isset($_POST["idFourwalls"])){

	$fourwalls = new AjaxFourwalls();
	$fourwalls -> idFourwalls = $_POST["idFourwalls"];
	$fourwalls -> ajaxEditarFourwalls();
}
