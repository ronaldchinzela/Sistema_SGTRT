<?php
    
    class GraficosControlador{

        static public function ctrListarTiemposGraficos(){

            //SOLICITANDO LA RESPUESTA AL MODELO MEDIANTE LA CONEXIÓN:
            $respuesta = GraficosModelo::mdlListarTiemposGraficos();

            //RETORNANDO LA RESPUESTA HACIA EL CONTROLADOR
            return $respuesta;



        
        

        }

    }