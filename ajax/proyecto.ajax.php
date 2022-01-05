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
		
		//Agregando formato de seis ceros en la  vista para no redondear los números con 0 a  la izquierda
		$respuesta["idproyecto"] = sprintf("%'.06d\n", $respuesta["idproyecto"]);
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