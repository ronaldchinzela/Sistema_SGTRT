<?php

class ControladorProyectos{


    /*=============================================
					MOSTRAR PROYECTOS
	=============================================*/

	static public function ctrMostrarProyectos($item, $valor){

		$tabla = "proyecto";

		$respuesta = ModeloProyectos::mdlMostrarProyectos($tabla, $item, $valor);

		return $respuesta;
	
	}


}