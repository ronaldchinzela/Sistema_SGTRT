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

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla(idfourwalls, nom_proyecto, equipo, serie, costo, 
																  fec_inicio, fec_fin) 
											   VALUES (:alp, :nom_proyecto, :equipo, :serie, :costo, 
											   	       :fec_inicio, :fec_fin)");

		$stmt1->bindParam(":alp", $datos["alp"], PDO::PARAM_INT);
		$stmt1->bindParam(":nom_proyecto", $datos["nom_proyecto"], PDO::PARAM_STR);
		$stmt1->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt1->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt1->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt1->bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_STR);
		$stmt1->bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_STR);

		if($stmt1 == true)
	{
		$stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla(idnexus,nom_proyecto,punto_red, costo) 
											   VALUES (:alp, :nom_proyecto, :punto_red,:costo)");

		$stmt2->bindParam(":alp", $datos["alp"], PDO::PARAM_INT);
		$stmt2->bindParam(":nom_proyecto", $datos["nom_proyecto"], PDO::PARAM_STR);
		$stmt2->bindParam(":punto_red", $datos["punto_red"], PDO::PARAM_STR);
		$stmt2->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);

	}

	if($stmt2 == true)
	{
		$stmt3 = Conexion::conectar()->prepare("INSERT INTO $tabla(idhp, nom_proyecto, equipo, serie, costo, 
																   fec_inicio, fec_fin) 
																   VALUES (:alp, :nom_proyecto, :equipo, 
																   :serie, :costo, :fec_inicio, :fec_fin)");

		$stmt3->bindParam(":alp", $datos["alp"], PDO::PARAM_INT);
		$stmt3->bindParam(":nom_proyecto", $datos["nom_proyecto"], PDO::PARAM_STR);
		$stmt3->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt3->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt3->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt3->bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_STR);
		$stmt3->bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_STR);
	}

	if($stmt3 == true)
	{
		$stmt4 = Conexion::conectar()->prepare("INSERT INTO $tabla(alp, nom_proyecto, costo_fourwalls, costo_nexus, costo_hp) 
																   VALUES (:alp, :nom_proyecto, :costof, :coston,:costoh)");

		$stmt4->bindParam(":alp", $datos["cod_licencia"], PDO::PARAM_INT);
		$stmt4->bindParam(":nom_proyecto", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt4->bindParam(":costof", $datos["tipo"], PDO::PARAM_STR);
		$stmt4->bindParam(":coston", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt4->bindParam(":costoh", $datos["tipo"], PDO::PARAM_STR);
	}

		/* if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null; */

	}

}

	



