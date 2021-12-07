<?php

require_once "../controladores/Mantenimientos.controlador.php";
require_once "../modelos/Mantenimientos.modelo.php";
require_once "../controladores/proyecto.controlador.php";
require_once "../modelos/proyecto.modelo.php";

class AjaxMantenimientos{

/*=============================================
	          VALIDAR ALP EXISTENTE
=============================================*/	

	public $validarAlp;

	public function ajaxValidarAlp(){

		$item = "idproyecto";
		$valor = $this->validarAlp;


		$respuesta = ControladorProyectos::ctrMostrarProyectos($item, $valor);
		/*$respuestaFourwalls = ControladorFourwalls::ctrMostrarFourwalls("idfourwalls", $respuesta["idfourwalls"]);	
		$respuestaNexsus = ControladorNexsus::ctrMostrarNexsus("idnexus", $respuesta["idnexus"]);
		$respuestaHp = ControladorHp::ctrMostrarHp("idhp", $respuesta["idhp"]);*/

		echo json_encode($respuesta);

		/*echo json_encode(["idproyecto" => $respuestaProyecto,
						  "idfourwalls" => $respuestaFourwalls,
						  "idnexus" => $respuestaNexsus,
						  "idhp" => $respuestaHp]);*/

	}

}
/*=============================================
            OBJETO DE VALIDAR ALP 
=============================================*/

if(isset( $_POST["validarAlp"])){

	$valAlp = new AjaxMantenimientos();
	$valAlp -> validarAlp = $_POST["validarAlp"];
	$valAlp -> ajaxValidarAlp();
}
