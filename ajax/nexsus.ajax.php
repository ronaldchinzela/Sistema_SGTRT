<?php

require_once "../controladores/nexsus.controlador.php";
require_once "../modelos/nexsus.modelo.php";

class AjaxNexsus{

	/*=============================================
					EDITAR NEXSUS
	=============================================*/	

	public $idNexsus;

	public function ajaxEditarNexsus(){

		$item = "idnexus";
		$valor = $this->idNexsus;

		$respuesta = ControladorNexsus::ctrMostrarNexsus($item, $valor);

		echo json_encode($respuesta);

	}
}

    /*=============================================
				    EDITAR NEXSUS
    =============================================*/	
if(isset($_POST["idNexsus"])){

	$nexsus = new AjaxNexsus();
	$nexsus -> idNexsus = $_POST["idNexsus"];
	$nexsus -> ajaxEditarNexsus();
}
