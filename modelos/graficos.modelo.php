<?php
     
     require_once "conexion.php";

     class GraficosModelo{

        static public function mdlListarTiemposGraficos(){

            //ejecutando procedimiento almacenado en la conexión a la BD y lo retornamos al controlador
            $stmt = Conexion::conectar()->prepare("SELECT * FROM procedure_listartiempograficas()");

            $stmt -> execute();

            return $stmt -> fetchAll();

            $stmt = null;
        }


     }