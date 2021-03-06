<?php

require_once "conexion.php";

class ModeloNexsus{

	/*=============================================
				     MOSTRAR NEXSUS
	=============================================*/

	static public function mdlMostrarNexsus($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT n.idnexus, n.punto_red, n.costo, n.idproyecto, p.nombre
			FROM nexus AS n JOIN proyecto AS p ON n.idproyecto = p.idproyecto WHERE n.idproyecto = :idNexus AND n.eliminado = false");

			$stmt -> bindParam(":idNexus", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
					EDITAR NEXSUS
	=============================================*/

	static public function mdlEditarNexsus($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET punto_red = :punto_red, 
																 costo = :costo WHERE idnexus = :idnexus");

		$stmt -> bindParam(":idnexus", $datos["idnexus"], PDO::PARAM_INT);
		//$stmt -> bindParam(":nom_proyecto", $datos["nom_proyecto"], PDO::PARAM_STR);
		$stmt -> bindParam(":punto_red", $datos["punto_red"], PDO::PARAM_INT);
		$stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
					BORRAR NEXSUS
	=============================================*/

	/*static public function mdlBorrarNexsus($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idnexus = :idnexus");

		$stmt -> bindParam(":idnexus", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			
			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}*/

}

