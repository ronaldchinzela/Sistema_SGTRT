<?php

require_once "conexion.php";

class ModeloWalls{

	/*=============================================
				MOSTRAR 4WALLS
	=============================================*/

	static public function mdlMostrarWalls($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY ALP DESC");

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
					CREAR MANTENIMIENTO
	=============================================*/

	static public function mdlIngresarMantenimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(alp, nom_proyecto, equipo, serie, costo, 
																  fec_inicio, fec_fin, punto_red, costo, equipo, 
																  serie, costo, fec_inicio, fec_fin) 
											   VALUES (:alp, :nom_proyecto, :equipo, :serie,:costo, 
											   	       :fec_inicio, :fec_fin, :punto_red,:costo, :equipo, 
													   :serie, :costo, :fec_inicio, :fec_fin)");

		$stmt->bindParam(":alp", $datos["cod_licencia"], PDO::PARAM_INT);
		$stmt->bindParam(":nom_proyecto", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":fec_inicio", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":fec_fin", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":punto_red", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":equipo", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":serie", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":fec_inicio", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":fec_fin", $datos["tipo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

}

	



