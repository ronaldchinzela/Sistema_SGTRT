<?php

class ControladorWalls{

	/*=============================================
					MOSTRAR 4WALLS
	=============================================*/

	static public function ctrMostrarWalls($item, $valor){

		$tabla = "mantenimiento";

		$respuesta = ModeloWalls::mdlMostrarWalls($tabla, $item, $valor);

		return $respuesta;

	}

}