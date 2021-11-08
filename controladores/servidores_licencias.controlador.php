<?php

class ControladorServidoresLic{


	/*=============================================
				 MOSTRAR SERVIDORES
	=============================================*/

	static public function ctrMostrarServidoresLic($item, $valor){

		$tabla = "servidores_licencia";

		$respuesta = ModeloServidoresLic::mdlMostrarServidoresLic($tabla, $item, $valor);

		return $respuesta;
	
	}
}
