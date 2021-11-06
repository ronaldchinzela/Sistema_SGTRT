<?php

require_once "../controladores/licencias.controlador.php";
require_once "../modelos/licencias.modelo.php";

class AjaxLicencias{

	/*=============================================
					EDITAR LICENCIA
	=============================================*/	

	public $idLicencia;

	public function ajaxEditarLicencia(){

		$item = "id_licencia";
		$valor = $this->idLicencia;

		$respuesta = ControladorLicencias::ctrMostrarLicencias($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
			CREANDO OBJETO EDITAR LICENCIA
=============================================*/	

if(isset($_POST["idLicencia"])){

	$licencia = new AjaxLicencias();
	$licencia -> idLicencia = $_POST["idLicencia"];
	$licencia -> ajaxEditarLicencia();

}