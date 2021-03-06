<?php

require_once "conexion.php";

class ModeloProyectos{


		/*=============================================
						MOSTRAR PROYECTOS
		=============================================*/

	static public function mdlMostrarProyectos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT p.idproyecto, p.nombre, 
			(SELECT SUM(f.costo) FROM fourwalls AS f WHERE p.idproyecto = f.idproyecto AND f.eliminado = false) AS costoFourwalls,
			(SELECT SUM(n.costo) FROM nexus AS n WHERE p.idproyecto = n.idproyecto AND n.eliminado = false) AS costoNexus,
			(SELECT SUM(h.costo) FROM hp AS h WHERE p.idproyecto = h.idproyecto AND h.eliminado = false) AS costoHp
			 FROM proyecto AS p;");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

		/*=============================================
						CREAR PROYECTOS
		==============================================*/
		static public function mdlIngresarProyecto($tabla, $datos){


			$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla(idproyecto, nombre) 
												    VALUES (:idproyecto, :nombre)");
		  
			$stmt1->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
			$stmt1->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		  
			if($stmt1->execute()){

				return "ok";
	
			}else{
	
				return "error";
			
			}
	
			$stmt1->close();
			$stmt1 = null;
	
		}

		/*=============================================
						EDITAR PROYECTO
		=============================================*/

	static public function mdlEditarProyecto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idproyecto = :idproyecto, 
															     nombre = :nombre
																 WHERE idproyecto = :idproyecto");

		$stmt->bindParam(":idproyecto", $datos["idproyecto"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	
		/*=============================================
					BORRAR PROYECTO
		=============================================*/

	static public function mdlBorrarProyecto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idproyecto = :idproyecto");

		$stmt -> bindParam(":idproyecto", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}