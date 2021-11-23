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

		if($tabla == "fourwalls"){

		$stmt1 = Conexion::conectar();
		$statement = $stmt1 -> prepare("INSERT INTO $tabla(idfourwalls, nom_proyecto, equipo, serie, costo, 
												fec_inicio, fec_fin) 
											VALUES (:alp, :nom_proyecto, :equipo, :serie, :costo, 
													:fec_inicio, :fec_fin)");
	  
		$statement->bindParam(":alp", $datos["alp"], PDO::PARAM_INT);
		$statement->bindParam(":nom_proyecto", $datos["nom_proyecto"], PDO::PARAM_STR);
		$statement->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$statement->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$statement->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$statement->bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_STR);
		$statement->bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_STR);
	  
		$statement -> execute();
		$statement = null;
		$stmt1 = null;
		
		}else if($tabla == "nexus"){
	   
		$stmt2 = Conexion::conectar();
		$statement2 = $stmt2 -> prepare("INSERT INTO $tabla(idnexus,nom_proyecto,punto_red, costo) 
					VALUES (:alp, :nom_proyecto, :punto_red,:costo)");
	  
		$statement2->bindParam(":alp", $datos["alp"], PDO::PARAM_INT);
		$statement2->bindParam(":nom_proyecto", $datos["nom_proyecto"], PDO::PARAM_STR);
		$statement2->bindParam(":punto_red", $datos["punto_red"], PDO::PARAM_STR);
		$statement2->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
	   
	   $statement2 -> execute();
	   $statement2 = null;
	   $stmt2 = null;
	
	   }else if($tabla == "hp"){
	   
		$stmt3 = Conexion::conectar();
		$statement3 = $stmt3 -> prepare("INSERT INTO $tabla(idhp, nom_proyecto, equipo, serie, costo, 
						 fec_inicio, fec_fin) 
						 VALUES (:alp, :nom_proyecto, :equipo, 
						 :serie, :costo, :fec_inicio, :fec_fin)");
	  
		$statement3->bindParam(":alp", $datos["alp"], PDO::PARAM_INT);
		$statement3->bindParam(":nom_proyecto", $datos["nom_proyecto"], PDO::PARAM_STR);
		$statement3->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$statement3->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$statement3->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$statement3->bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_STR);
		$statement3->bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_STR);
	  
		$statement3 -> execute();
		$statement3 = null;
		$stmt3 = null;

	   }else if($tabla == "mantenimientos"){

		$stmt4 = Conexion::conectar();
		$statement4 = $stmt4 -> prepare("INSERT INTO $tabla(alp, nom_proyecto, costo_fourwalls, costo_nexus, costo_hp) 
						 VALUES (:alp, :nom_proyecto, :costoFourwalls, :costoNexus,:costoHp)");
	  
		$statement4->bindParam(":alp", $datos["alp"], PDO::PARAM_INT);
		$statement4->bindParam(":nom_proyecto", $datos["alp"], PDO::PARAM_STR);
		$statement4->bindParam(":costoFourwalls", $datos["alp"], PDO::PARAM_STR);
		$statement4->bindParam(":costoNexus", $datos["alp"], PDO::PARAM_STR);
		$statement4->bindParam(":costoHp", $datos["alp"], PDO::PARAM_STR);

		if(!$statement4 -> execute()){
			print_r($stmt4 -> errorInfo());
		}
		$statement4 = null;
		$stmt4 = null;
		
		 return "ok";
	  
		}else{
	  
		 return "error";
		
		}
   }

}
	



