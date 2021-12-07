<?php

require_once "conexion.php";

class ModeloMantenimientos{

	/*=============================================
					CREAR MANTENIMIENTO
	=============================================*/

	static public function mdlIngresarMantenimiento($tabla, $datos){

		if($tabla == "proyecto"){

			$stmt1 = Conexion::conectar();
			$statement = $stmt1 -> prepare("INSERT INTO $tabla(idproyecto, nombre) 
												VALUES (:idproyecto, :nombre)");
		  
			$statement->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
			$statement->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		  
			$statement -> execute();
			$statement = null;
			$stmt1 = null;

		}else if($tabla == "fourwalls"){

		$stmt1 = Conexion::conectar();
		$statement = $stmt1 -> prepare("INSERT INTO $tabla(equipo, serie, costo, 
												fec_inicio, fec_fin, idproyecto) 
											VALUES (:equipo, :serie, :costo, 
													:fec_inicio, :fec_fin, :idproyecto)");
	  
		$statement->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$statement->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$statement->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$statement->bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_STR);
		$statement->bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_STR);
		$statement->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
	  
		$statement -> execute();
		$statement = null;
		$stmt1 = null;
		
		}else if($tabla == "nexus"){
	   
		$stmt2 = Conexion::conectar();
		$statement2 = $stmt2 -> prepare("INSERT INTO $tabla(punto_red, costo, idproyecto) 
					VALUES (:punto_red,:costo, :idproyecto)");
	  	
		$statement2->bindParam(":punto_red", $datos["punto_red"], PDO::PARAM_STR);
		$statement2->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$statement2->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
	    
	    $statement2 -> execute();
	    $statement2 = null;
	    $stmt2 = null;
	
	   }else if($tabla == "hp"){
	   
		$stmt3 = Conexion::conectar();
		$statement3 = $stmt3 -> prepare("INSERT INTO $tabla(equipo, serie, costo, 
						 fec_inicio, fec_fin, idproyecto) 
						 VALUES (:equipo, 
						 :serie, :costo, :fec_inicio, :fec_fin, :idproyecto)");
	  

		$statement3->bindParam(":equipo", $datos["equipo"], PDO::PARAM_STR);
		$statement3->bindParam(":serie", $datos["serie"], PDO::PARAM_STR);
		$statement3->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$statement3->bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_STR);
		$statement3->bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_STR);
		$statement3->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
	  
		if(!$statement3 -> execute()){
			print_r($stmt3 -> errorInfo());
		}
		$statement3 = null;
		$stmt3 = null;
		
		 return "ok";
	  
		}else{
	  
		 return "error";
		
		}
   }

}
	



