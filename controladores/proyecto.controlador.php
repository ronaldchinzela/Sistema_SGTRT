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

	/*=============================================
					EDITAR PROYECTO
	=============================================*/
	static public function ctrEditarProyecto(){

		if(isset($_POST["editarProyecto"])){

			if(preg_match('/^[0-9]+$/', $_POST["editarCodigo"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProyecto"])){

			   	$tabla = "proyecto";

			   	$datos = array("idproyecto"=>$_POST["editarCodigo"],
					           "nombre"=>$_POST["editarProyecto"]);

			   	$respuesta = ModeloProyectos::mdlEditarProyecto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proyecto ha sido actualizada correctamente",
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

	/*=============================================
					BORRAR PROYECTO
	=============================================*/

	static public function ctrBorrarProyecto(){

		//si viene un dato get llamado idProyecto
		if(isset($_GET["idProyecto"])){

			//se redireccionará a la tabla proyecto de la base de datos
			$tabla ="proyecto";
			$datos = $_GET["idProyecto"];

			//la respuesta será enviada al modelo
			$respuesta = ModeloProyectos::mdlBorrarProyecto($tabla, $datos);

			//si la respuesta es ok mostrará alert de borrado correctamente
			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El proyecto ha sido borrado correctamente",
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
		}
		
	}


}