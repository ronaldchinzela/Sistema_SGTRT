<?php
     
    require_once "conexion.php";

    class ModeloCambios{

        //MOSTRANDO EL VALOR ACTUAL DE LA TABLA TCAMIO
        static public function mdlMostrarCambios($tabla, $item, $valor){

            if($item != null){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();

            }else{
                //trayendo todos los registros de la base de datos
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt -> execute();

                return $stmt -> fetchAll();

            }        

            $stmt -> close();
            $stmt = null;
        }

        //REGISTRANDO UN NUEVO T.CAMBIO
        static public function mdlIngresarCambio($tabla, $datos){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(valor)
                                                    VALUES (:valor)");
            
            $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);      
    
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
    
    
        }
    
}