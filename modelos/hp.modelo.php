<?php

require_once "conexion.php";

class ModeloHp{

	/*=============================================
				     MOSTRAR HP
	=============================================*/

	static public function mdlMostrarHp($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT h.idhp, h.equipo, h.serie, h.costo, h.fec_inicio, h.fec_fin, h.idproyecto, p.nombre
			FROM hp AS h JOIN proyecto AS p ON h.idproyecto = p.idproyecto WHERE h.idproyecto = :idHp AND h.eliminado = false");

			$stmt -> bindParam(":idHp", $valor, PDO::PARAM_STR);

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
	                EDITAR HP
	=============================================*/

	static public function mdlEditarHp($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET equipo = :equipo, serie = :serie, 
																 costo = :costo, fec_inicio = :fec_inicio, 
																 fec_fin = :fec_fin
																 WHERE idhp = :idhp");

		$stmt -> bindParam(":idhp", $datos["idhp"], PDO::PARAM_INT);
		$stmt -> bindParam(":equipo", $datos["equipo"], PDO::PARAM_INT);
		$stmt -> bindParam(":serie", $datos["serie"], PDO::PARAM_INT);
		$stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);
		$stmt -> bindParam(":fec_inicio", $datos["fec_inicio"], PDO::PARAM_INT);
		$stmt -> bindParam(":fec_fin", $datos["fec_fin"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
					BORRAR HP
	=============================================*/

	/*static public function mdlBorrarHp($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idhp = :idhp");

		$stmt -> bindParam(":idhp", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			
			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}*/

}
