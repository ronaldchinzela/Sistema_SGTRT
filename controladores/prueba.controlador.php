<?php
     
     class ControladorPruebas{
     
        static public function ctrMostrarPruebas($item, $valor){

            $tabla = "pruebas";
            $respuesta = ModeloPruebas::MdlMostrarPruebas($tabla, $item, $valor);

            return $respuesta;
        }
    
    
}