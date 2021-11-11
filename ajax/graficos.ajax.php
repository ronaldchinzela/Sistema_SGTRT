<?php
     class AjaxGraficos{

        public function ListarTiemposGraficos(){

            //TREYENDO LA RESPUESTA DEL CONTROLADOR Y SU MÉTODO LISTAR
            $respuesta = GraficosController::ctrListarTiemposGraficos();

            //IMPRIMIENDO LA RESPUESTA EN UN JSON
            echo json_encode($respuesta);
        }  

     }