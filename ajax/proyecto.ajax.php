<?php

require_once "../controladores/proyecto.controlador.php";
require_once "../modelos/proyecto.modelo.php";

class AjaxProyectos{

	/*=============================================
					EDITAR PROYECTO
	=============================================*/	

	public $idProyecto;

	public function ajaxEditarProyecto(){

		$item = "idproyecto";
		$valor = $this->idProyecto;

		$respuesta = ControladorProyectos::ctrMostrarProyectos($item, $valor);
		//$respuesta["costo"] = number_format($respuesta["costo"], 2);
		echo json_encode($respuesta);


	}

}

/*=============================================
		 CREANDO OBJETO EDITAR PROYECTO
=============================================*/	

if(isset($_POST["idProyecto"])){

	$proyecto = new AjaxProyectos();
	$proyecto -> idProyecto = $_POST["idProyecto"];
	$proyecto -> ajaxEditarProyecto();

}