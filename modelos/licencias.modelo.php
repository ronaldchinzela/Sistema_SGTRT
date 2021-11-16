<?php

require_once "conexion.php";

class ModeloLicencias{

	/*=============================================
					CREAR LICENCIA
	=============================================*/

	static public function mdlIngresarLicencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cod_licencia, nom_licencia, tipo, costo) 
											   VALUES (:cod_licencia, :nom_licencia, :tipo, :costo)");

		$stmt->bindParam(":cod_licencia", $datos["cod_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":nom_licencia", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
					MOSTRAR LICENCIAS
	=============================================*/

	static public function mdlMostrarLicencias($tabla, $item, $valor){

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
					EDITAR LICENCIA
	=============================================*/

	static public function mdlEditarLicencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cod_licencia = :cod_licencia, 
															     nom_licencia = :nom_licencia, 
																 tipo = :tipo, costo = :costo 
																 WHERE id_licencia = :id_licencia");

		$stmt->bindParam(":id_licencia", $datos["id_licencia"], PDO::PARAM_INT);
		$stmt->bindParam(":cod_licencia", $datos["cod_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":nom_licencia", $datos["nom_licencia"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
					BORRAR LICENCIA
	=============================================*/

	static public function mdlBorrarLicencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_licencia = :id_licencia");

		$stmt -> bindParam(":id_licencia", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}