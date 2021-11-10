<?php

class ControladorConsumos{

	/*=============================================
			  MOSTRAR CONSUMO DE RECURSOS
	=============================================*/

	static public function ctrMostrarConsumos($item, $valor){

		$tabla = "consumo_recursos";

		$respuesta = ModeloConsumos::mdlMostrarConsumos($tabla, $item, $valor);

		return $respuesta;

	}

}