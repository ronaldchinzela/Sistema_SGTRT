<?php

class ControladorFourwalls{


	/*=============================================
				MOSTRAR 4WALLS
	=============================================*/

	static public function ctrMostrarFourwalls($item, $valor){

		$tabla = "fourwalls";

		$respuesta = ModeloFourwalls::mdlMostrarFourwalls($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
					EDITAR 4WALLS
	=============================================*/

	static public function ctrEditarFourwalls(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEquipo"]) &&	
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSerie"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarCosto"])){

				$tabla = "fourwalls";

				$datos = array ("idfourwalls"=>$_POST["idFourwalls"],
								"equipo" => $_POST["editarEquipo"],
								"serie" => $_POST["editarSerie"],
								"costo" => $_POST["editarCosto"],
								"fec_inicio" => $_POST["editarFechaInicio"],
								"fec_fin" => $_POST["editarFechaFin"],
								"idproyecto" => $_POST["editarNombre"]);

				$respuesta = ModeloFourwalls::mdlEditarFourwalls($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El registro se actualizó correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Aceptar"
							  }).then(function(result){
										if (result.value) {

										window.location = "costo-fourwalls";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los campos no puede ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "costo-fourwalls";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
					BORRAR FOURWALLS
	=============================================*/

	static public function ctrBorrarFourwalls(){
	
		//si viene un dato get llamado idFourwalls
		if(isset($_GET["idFourwalls"])){

			//se redireccionará a la tabla Fourwalls de la base de datos
			$tabla ="fourwalls";
			$datos = $_GET["idFourwalls"];

			//la respuesta será enviada al modelo
			$respuesta = ModeloFourwalls::mdlBorrarFourwalls($tabla, $datos);

			//si la respuesta es ok mostrará alert de borrado correctamente
			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El fourwalls ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Aceptar"
						  }).then(function(result){
									if (result.value) {

									window.location = "costo-fourwalls";

									}
								})

					</script>';
			}
		}

	}

}
