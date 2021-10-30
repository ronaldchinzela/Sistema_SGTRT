<?php

//REQUIRIENDO EL CONTROLADOR Y EL MODELO DE USUARIO
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

   /*--===========================================
                EDITAR USUARIO
   ============================================--*/

   public $idUsuario;
   
   public function ajaxEditarUsuario(){

        //variable item = a la columna idusuario de la bd
        $item ="idusuario";
        $valor = $this->idUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

   }

}

   /*--===========================================
                EDITAR USUARIO
   ============================================--*/

if(isset($_POST["idUsuario"])){

    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarUsuario();

}