<?php
    class ControladorUsuarios{
        /*===========================================
            INGRESO DEL USUARIO AL SISTEMA 
        ============================================*/
       static public  function ctrIngresoUsuario(){
            if(isset($_POST["ingUsuario"])){

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                     //trayendo la variable $encriptar de Registro de usuario
                    $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    $tabla = "usuarios";
                    $item = "usuario";
                    $valor = $_POST["ingUsuario"];
                    
                    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                    
                    if(is_array($respuesta)){
                    if($respuesta["usuario"]  == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

                        //VALIDANDO EL ESTADO DEL USUARIO QUE VA INICIAR SESIÓN PARA DENEGAR EL ACCESO CUANDO ESTÉ INACTIVO
                        if($respuesta["estado"] == 1){
                        
                                //creando variable de sesión para validar el inicio del mismo
                                $_SESSION["iniciarSesion"] = "ok";

                                //creando variables para capturar el nombre y apellido del usuario logeado
                                $_SESSION["idusuario"] = $respuesta["idusuario"];
                                $_SESSION["nombres"] = $respuesta["nombres"];
                                $_SESSION["apellidos"] = $respuesta["apellidos"];
                                $_SESSION["rol"] = $respuesta["rol"];

                                //enviando la variable de sesión $_SESSION["iniciarSesion"] al menú de inicio de la página
                                echo '<script>
                                        window.location = "inicio";
                                </script>';
                            
                            }else{

                                echo '<br><div class="alert alert-danger">El usuario está inactivo</div>';

                            }

                    }else{

                        echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                        
                        }
                     }
                    
                    }

                }
            }

/*=================================================================================================================================
                                        MÉTODO REGISTRO DE USUARIO  
==================================================================================================================================*/

//llamando como función l método ctrCrearUsuario de la vista usuario.php
        static public function ctrCrearUsuario(){

            if(isset($_POST["nuevoNombre"])){

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                    $tabla = "usuarios";

                    //creando variable para almacenar la contraseña encriptada
                    $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    //creando un array que almacene los valores ingresados en el formulario
                    $datos = array("usuario" => strtolower($_POST['nuevoNombre'][0] . explode(" ", $_POST['nuevoApellido'])[0]),
                                   "nombre" => $_POST["nuevoNombre"],
                                   "apellido" => $_POST["nuevoApellido"],
                                   "celular" => $_POST["nuevoCelular"],
                                   "correo" => $_POST["nuevoCorreo"],
                                   "password" => $encriptar,
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

/*=================================================================================================================================
                                         MÉTODO PARA MOSTRAR LOS USUARIOS DE LA BD  
==================================================================================================================================*/

        static public function ctrMostrarUsuarios($item, $valor){

            $tabla = "usuarios";
            $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

            return $respuesta;
        }

/*=================================================================================================================================
                                               MÉTODO EDITAR USUARIO   
==================================================================================================================================*/

static public function ctrEditarUsuario(){

    if(isset($_POST["editarUsuario"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

            $tabla = "usuarios";

            //VALIDACIÓN DE CARACTERES ESPECIALES
            if($_POST["editarPassword"] != ""){

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

                    $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                
                //VALIDACIÓN DE CARACTERES ESPECIALES EN LA CONTRASEÑA
                }else{

                    echo'<script>

                    swal({
                          type: "error",
                          title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "usuarios";

                            }
                        })

                  </script>';

        }          
            
            //SI LA CONTRASEÑA NO ES MODIFICADA, ENTONCES ESTA VIAJARÁ NUEVAMENTE A LA BD EN SU MISMO ESTADO DE ENCRIPTACIÓN
        }else{

            $encriptar = $_POST["passwordActual"];

        }

            //ENVIANDO AL MODELO LOS DATOS ACTUALIZADOS
            $datos = array(
                            "nombre" => $_POST["editarNombre"],
                            "apellido" => $_POST["editarApellido"],
                            "celular" => $_POST["editarCelular"],
                            "correo" => $_POST["editarCorreo"],
                            "password" => $encriptar,
                            "perfil" => $_POST["editarPerfil"]);

            $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

            //SI LOS DATOS INGRESADOS FUERON ACTUALIZADOS CORRECTAMENTE MOSTRARÁ ALERTA
            if($respuesta == "ok"){

                echo'<script>

                swal({
                      type: "success",
                      title: "El usuario ha sido editado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "usuarios";

                                }
                            })

                </script>';

            }
                         
        }else{

            echo'<script>

                swal({
                      type: "error",
                      title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "usuarios";

                        }
                    })

              </script>';

        }

    }

}

/*=================================================================================================================================
                                                        MÉTODO ELIMINAR USUARIO   
==================================================================================================================================*/

static public function ctrBorrarUsuario(){

    if(isset($_GET["idUsuario"])){

        $tabla ="usuarios";
        $datos = $_GET["idUsuario"];

        $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

        if($respuesta == "ok"){

            echo'<script>  

            swal({
                  type: "success",
                  title: "El usuario ha sido borrado correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "usuarios";

                            }
                        })

            </script>';

        }		

    }

}


}
