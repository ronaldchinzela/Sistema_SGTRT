<?php

require_once "../controladores/hp.controlador.php";
require_once "../modelos/hp.modelo.php";

class AjaxHp{

	/*=============================================
					EDITAR HP
	=============================================*/	

	public $idHp;

	public function ajaxEditarHp(){

		$item = "idhp";
		$valor = $this->idHp;

		$respuesta = ControladorHp::ctrMostrarHp($item, $valor);

		$respuesta["costo"] = number_format($respuesta["costo"], 2);
		echo json_encode($respuesta);

	}
}

/*=============================================
				EDITAR HP
=============================================*/	
if(isset($_POST["idHp"])){

	$hp = new AjaxHp();
	$hp -> idHp = $_POST["idHp"];
	$hp -> ajaxEditarHp();
}
