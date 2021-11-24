<?php

require_once "../controladores/walls.controlador.php";
require_once "../modelos/walls.modelo.php";
require_once "../controladores/fourwalls.controlador.php";
require_once "../modelos/fourwalls.modelo.php";

class AjaxMantenimientos{

/*=============================================
	        VALIDAR NO REPETIR ALP
=============================================*/	

	public $validarAlp;

	public function ajaxValidarAlp(){

		$item = "alp";
		$valor = $this->validarAlp;

		$respuesta = ControladorWalls::ctrMostrarWalls($item, $valor);

		echo json_encode($respuesta);

	}

	//VER FOURWALLS
	public $idFourwalls;

	public function ajaxVerFourwalls(){

		$item = "idfourwalls";
		$valor = $this->idFourwalls;

		$respuesta = ControladorFourwalls::ctrMostrarFourwalls($item, $valor);

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

    /*=============================================
				    FOURWALLS
    =============================================*/	
	if(isset($_POST["idFourwalls"])){

		$fourwalls = new AjaxFourwalls();
		$fourwalls -> idFourwalls = $_POST["idFourwalls"];
		$fourwalls -> ajaxVerFourwalls();
	}