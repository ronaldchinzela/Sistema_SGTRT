<?php
     
     require_once "conexion.php";

     class GraficosModelo{

        static public function mdlListarTiemposGraficos(){

            //ejecutando procedimiento almacenado en la conexión a la BD
            $stmt = Conexion::conectar()->prepare("CALL procedure_ListarTiemposGraficos");

            $stmt -> execute();

            return $stmt -> fetchAll();

            $stmt = null;
        }


     }