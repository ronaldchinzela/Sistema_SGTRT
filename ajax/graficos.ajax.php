<?php

require_once "../controladores/graficos.controlador.php";
require_once "../modelos/graficos.modelo.php";


class AjaxGraficos{

        public function ListarTiemposGraficos(){

            //TREYENDO LA RESPUESTA DEL CONTROLADOR Y SU MÉTODO LISTAR
            $respuesta = GraficosControlador::ctrListarTiemposGraficos();

            //IMPRIMIENDO LA RESPUESTA EN UN JSON
            echo json_encode($respuesta);
        }  

     }

$graficos = new AjaxGraficos();
$graficos -> ListarTiemposGraficos();