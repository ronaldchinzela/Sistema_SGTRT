<?php

require_once "../controladores/fourwalls.controlador.php";
require_once "../modelos/fourwalls.modelo.php";
//require_once "../controladores/proyecto.controlador.php";
//require_once "../modelos/proyecto.modelo.php";

class AjaxFourwalls{

	/*=============================================
					EDITAR 4WALL
	=============================================*/	

	public $idFourwalls;

	public function ajaxEditarFourwalls(){

		$item = "idfourwalls";
		$valor = $_POST["idFourwalls"];
		//$valor = $this->idFourwalls;

		$respuesta = ControladorFourwalls::ctrMostrarFourwalls($item, $valor);
		//$respuesta = ControladorProyectos::ctrMostrarProyectos($item, $valor);
		var_dump($respuesta);
		$respuesta = $respuesta[0];
		$respuesta["costo"] = number_format($respuesta["costo"], 2);
		
		
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
