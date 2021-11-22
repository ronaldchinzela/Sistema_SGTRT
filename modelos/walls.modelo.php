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

	static public function mdlIngresarMantenimiento($tabla1, $tabla2, $tabla3, $tabla4, $datos1, $datos2, $datos3, $datos4){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla1(idfourwalls, nom_proyecto, equipo, serie, costo, 
																  fec_inicio, fec_fin) 
											   VALUES (:alp, :nom_proyecto, :equipo, :serie, :costo, 
											   	       :fec_inicio, :fec_fin)");

		$stmt1->bindParam(":alp", $datos1["alp"], PDO::PARAM_INT);
		$stmt1->bindParam(":nom_proyecto", $datos1["nom_proyecto"], PDO::PARAM_STR);
		$stmt1->bindParam(":equipo", $datos1["equipo"], PDO::PARAM_STR);
		$stmt1->bindParam(":serie", $datos1["serie"], PDO::PARAM_STR);
		$stmt1->bindParam(":costo", $datos1["costo"], PDO::PARAM_STR);
		$stmt1->bindParam(":fec_inicio", $datos1["fec_inicio"], PDO::PARAM_STR);
		$stmt1->bindParam(":fec_fin", $datos1["fec_fin"], PDO::PARAM_STR);

		if($stmt1 == true)
	{
		$stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(idnexus,nom_proyecto,punto_red, costo) 
											   VALUES (:alp, :nom_proyecto, :punto_red,:costo)");

		$stmt2->bindParam(":alp", $datos2["alp"], PDO::PARAM_INT);
		$stmt2->bindParam(":nom_proyecto", $datos2["nom_proyecto"], PDO::PARAM_STR);
		$stmt2->bindParam(":punto_red", $datos2["punto_red"], PDO::PARAM_STR);
		$stmt2->bindParam(":costo", $datos2["costo"], PDO::PARAM_STR);

	}

	if($stmt2 == true)
	{
		$stmt3 = Conexion::conectar()->prepare("INSERT INTO $tabla3(idhp, nom_proyecto, equipo, serie, costo, 
																   fec_inicio, fec_fin) 
																   VALUES (:alp, :nom_proyecto, :equipo, 
																   :serie, :costo, :fec_inicio, :fec_fin)");

		$stmt3->bindParam(":alp", $datos3["alp"], PDO::PARAM_INT);
		$stmt3->bindParam(":nom_proyecto", $datos3["nom_proyecto"], PDO::PARAM_STR);
		$stmt3->bindParam(":equipo", $datos3["equipo"], PDO::PARAM_STR);
		$stmt3->bindParam(":serie", $datos3["serie"], PDO::PARAM_STR);
		$stmt3->bindParam(":costo", $datos3["costo"], PDO::PARAM_STR);
		$stmt3->bindParam(":fec_inicio", $datos3["fec_inicio"], PDO::PARAM_STR);
		$stmt3->bindParam(":fec_fin", $datos3["fec_fin"], PDO::PARAM_STR);
	}

	if($stmt3 == true)
	{
		$stmt4 = Conexion::conectar()->prepare("INSERT INTO $tabla4(alp, nom_proyecto, costo_fourwalls, costo_nexus, costo_hp) 
																   VALUES (:alp, :nom_proyecto, :costof, :coston,:costoh)");

		$stmt4->bindParam(":alp", $datos4["cod_licencia"], PDO::PARAM_INT);
		$stmt4->bindParam(":nom_proyecto", $datos4["nom_licencia"], PDO::PARAM_STR);
		$stmt4->bindParam(":costof", $datos4["tipo"], PDO::PARAM_STR);
		$stmt4->bindParam(":coston", $datos4["nom_licencia"], PDO::PARAM_STR);
		$stmt4->bindParam(":costoh", $datos4["tipo"], PDO::PARAM_STR);
	}

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

}

	



