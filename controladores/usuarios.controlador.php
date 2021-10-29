<?php
    class ControladorUsuarios{
    /* INGRESO DEL USUARIO AL SISTEMA */
       static public  function ctrIngresoUsuario(){
            if(isset($_POST["ingUsuario"])){

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                    $tabla = "usuarios";
                    $item = "usuario";
                    $valor = $_POST["ingUsuario"];

                    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                    
                    if(is_array($respuesta)){
                    if($respuesta["usuario"]  == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){

                        $_SESSION["iniciarSesion"] = "ok";
                        echo '<script>
                                window.location = "inicio";
                        </script>';

                    }else{

                        echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                        
                        }
                     }
                    
                    }

                }
            }

/*===========================================
        REGISTRO DE USUARIO  
============================================*/

//llamando como función l método ctrCrearUsuario de la vista usuario.php
        static public function ctrCrearUsuario(){

            if(isset($_POST["nuevoNombre"])){

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                    $tabla = "usuarios";

                    //creando un array que almacene los valores ingresados en el formulario
                    $datos = array("usuario" => strtolower($_POST['nuevoNombre'][0] . explode(" ", $_POST['nuevoApellido'])[0]),
                                   "nombre" => $_POST["nuevoNombre"],
                                   "apellido" => $_POST["nuevoApellido"],
                                   "celular" => $_POST["nuevoCelular"],
                                   "correo" => $_POST["nuevoCorreo"],
                                   "password" => $_POST["nuevoPassword"],
                                   "perfil" => $_POST["nuevoPerfil"]);
                    
                    $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                    if($respuesta == "ok"){

                        echo '<script>

                                swal({
                                        type: "success",
                                        title: "¡El usuario ha sido registrado correctamente!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false

                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "usuarios";        
                                    }
                                });

                            </script>';

                    }

                   }else{
                       echo '<script>

                                swal({
                                        type: "error",
                                        title: "¡El nombre o apellido no pueden llevar caracteres especiales",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false

                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "usuarios";        
                                    }
                                });

                            </script>';
                   }
            }

        }
}     
