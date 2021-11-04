<?php

require_once "conexion.php";

class ModeloFourwalls{

	/*=============================================
				     MOSTRAR 4WALL
	=============================================*/

	static public function mdlMostrarFourwalls($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
					EDITAR 4WALL
	=============================================*/

	static public function mdlEditarFourwalls($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nom_proyecto = :nom_proyecto, equipo = :equipo, 
																 serie = :serie, costo = :costo, fec_inicio = :fec_inicio, 
																 fec_fin = :fec_fin
																 WHERE idfourwalls = :idfourwalls");

		$stmt -> bindParam(":nom_proyecto", $datos["nom_proyecto"], PDO::PARAM_STR);
		$stmt -> bindParam(":equipo", $datos["equipo"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_INT);
		$stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);
		$stmt -> bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_INT);
		$stmt -> bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_INT);
		$stmt -> bindParam(":idfourwalls", $datos["idfourwalls"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

}

