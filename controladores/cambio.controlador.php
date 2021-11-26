<?php
    class ControladorCambios{

        //MOSTRANDO EL TIPO DE CAMBIO
        static public function ctrMostrarCambios($item, $valor){

        $tabla = "tcambio";
        $respuesta = ModeloCambios::MdlMostrarCambios($tabla, $item, $valor);

        return $respuesta;
    }

    //REGISTRANDO UN NUEVO TIPO DE CAMBIO
   /* static public function ctrCrearCambio(){

        if(isset($_POST["nuevoCambio"])){

            if(preg_match('/^[0-9.]+$/', $_POST["nuevoCambio"])){

                $tabla = "tcambio";

                //creando un array que almacene los valores ingresados en el formulario
                $datos = array("valor" => $_POST["nuevoCambio"]);
                
                $respuesta = ModeloCambios::mdlIngresarCambio($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

                                swal({
                                        type: "success",
                                        title: "¡El valor ha sido registrado correctamente!", 
                                        text: "'.$datos['valor'].'",                                      
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false

                                        }).then((result)=>{
                                            if(result.value){
                                                window.location = "inicio";        
                                            }
                                        });

                          </script>';

                }

               }else{
                   echo '<script>

                                swal({
                                        type: "error",
                                        title: "¡El valor ingresado solo puede ser de tipo número o decimal",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false

                                }).then((result)=>{
                                    if(result.value){
                                        window.location = "inicio";        
                                    }
                                });

                        </script>';
               }
        }

    }*/

    /*=============================================
					EDITAR CAMBIO
	=============================================*/

	static public function ctrEditarCambio(){

		if(isset($_POST["editarCambio"])){

            if(preg_match('/^[0-9.]+$/', $_POST["editarCambio"])){

			   	$tabla = "tcambio";

			   	$datos = array("idtipo"=>$_POST["idCambio"],		   				  
					           "valor"=>$_POST["editarCambio"]);

			   	$respuesta = ModeloCambios::mdlEditarCambio($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de cambio ha sido actualizado correctamente",
                          text: "'.$datos['valor'].'",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inicio";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos ingresados no pueden ir vacíos o llevar caracteres especiales ni letras!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inicio";

							}
						})

			  	</script>';



			}

		}

	}

}