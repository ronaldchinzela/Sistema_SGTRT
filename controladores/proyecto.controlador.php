<?php

class ControladorProyectos{


    /*=============================================
					MOSTRAR PROYECTOS
	=============================================*/

	static public function ctrMostrarProyectos($item, $valor){

		$tabla = "proyecto";

		$respuesta = ModeloProyectos::mdlMostrarProyectos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
					CREAR PROYECTOS
	=============================================*/
	static public function ctrCrearProyecto(){

		//TABLA PROYECTO
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla = "proyecto";

			   	$datos = array("idproyecto"=>$_POST["nuevoCodigo"],
					           "nombre"=>$_POST["nuevoMantenimiento"]);

			   	$respuesta = ModeloProyectos::mdlIngresarProyecto($tabla, $datos);

				   if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "¡El proyecto han sido registrado exitósamente!",
						  allowOutsideClick: false,
						  allowEscapeKey: false,
						  showConfirmButton: true,
						  confirmButtonText: "Aceptar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proyectos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos ingresados no pueden ir vacíos o llevar caracteres especiales!",
						  allowOutsideClick: false,
						  allowEscapeKey: false,
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proyectos";

							}
						})

			  	</script>';



			}

		}
	}


}