<?php

require_once "../controladores/Mantenimientos.controlador.php";
require_once "../modelos/Mantenimientos.modelo.php";
require_once "../controladores/proyecto.controlador.php";
require_once "../modelos/proyecto.modelo.php";
/*require_once "../controladores/fourwalls.controlador.php";
require_once "../modelos/fourwalls.modelo.php";
require_once "../controladores/nexsus.controlador.php";
require_once "../modelos/nexsus.modelo.php";
require_once "../controladores/hp.controlador.php";
require_once "../modelos/hp.modelo.php";*/

class AjaxMantenimientos{

/*=============================================
	          VALIDAR ALP EXISTENTE
=============================================*/	

	public $validarAlp;

	public function ajaxValidarAlp(){

		//$item = "id_mantenimiento";
		//$valor = $this->validarAlp;

		$respuesta = ControladorMantenimientos::ctrMostrarMantenimientos("id_mantenimiento", $this->validarAlp);
		$respuestaProyecto = ControladorProyectos::ctrMostrarProyectos("idproyecto", $respuesta["idproyecto"]);
		/*$respuestaFourwalls = ControladorFourwalls::ctrMostrarFourwalls("idfourwalls", $respuesta["idfourwalls"]);	
		$respuestaNexsus = ControladorNexsus::ctrMostrarNexsus("idnexus", $respuesta["idnexus"]);
		$respuestaHp = ControladorHp::ctrMostrarHp("idhp", $respuesta["idhp"]);*/

		echo json_encode(["idproyecto" => $respuestaProyecto]);

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
