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
			(SELECT SUM(f.costo) FROM fourwalls AS f WHERE p.idproyecto = f.idproyecto) AS costoFourwalls,
			(SELECT SUM(n.costo) FROM nexus AS n WHERE p.idproyecto = n.idproyecto) AS costoNexus,
			(SELECT SUM(h.costo) FROM hp AS h WHERE p.idproyecto = h.idproyecto) AS costoHp
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

}