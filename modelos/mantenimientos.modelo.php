<?php

require_once "conexion.php";

class ModeloMantenimientos{

	/*=============================================
					CREAR COSTOS
	=============================================*/

	static public function mdlIngresarFourwalls($tabla, $datos){

		 
		$stmt2 = Conexion::conectar()-> prepare("INSERT INTO $tabla(equipo, serie, costo, fec_inicio, fec_fin, idproyecto) 
											     VALUES (:equipo, :serie, :costo, :fec_inicio, :fec_fin, :idproyecto)");
	  
		$stmt2->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt2->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt2->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt2->bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_STR);
		$stmt2->bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_STR);
		$stmt2->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
	  
		if($stmt2->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt2->close();
		$stmt2 = null;

	}

	static public function mdlIngresarNexsus($tabla, $datos){
	   
		$stmt3 = Conexion::conectar() -> prepare("INSERT INTO $tabla(punto_red, costo, idproyecto) 
												  VALUES (:punto_red,:costo, :idproyecto)");
	  	
		$stmt3->bindParam(":punto_red", $datos["punto_red"], PDO::PARAM_STR);
		$stmt3->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt3->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
	    
		if($stmt3->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt3->close();
		$stmt3 = null;

	}

	static public function mdlIngresarHp($tabla, $datos){

	   
		$stmt4 = Conexion::conectar() -> prepare("INSERT INTO $tabla(equipo, serie, costo, 
																	 fec_inicio, fec_fin, idproyecto) 
												  VALUES (:equipo, :serie, :costo, :fec_inicio, :fec_fin, :idproyecto)");
	  

		$stmt4->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$stmt4->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$stmt4->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt4->bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_STR);
		$stmt4->bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_STR);
		$stmt4->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
	  
		if($stmt4->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt4->close();
		$stmt4 = null;

	}
   }


	



