<?php
    class ControladorUsuarios{
    /* INGRESO DEL USUARIO AL SISTEMA */
        public  function ctrIngresoUsuario(){
            if(isset($_POST["ingUsuario"])){

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                    $tabla = "usuarios";
                    $item = "usuario";
                    $valor = $_POST["ingUsuario"];

                    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                    if($respuesta["usuario"]  == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){

                        echo '<br><div class="alert alert-success">¡Bienvenido al sistema!</div>';

                    }else{

                        echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                        
                        }
                     }

                }
            }
        
}     
