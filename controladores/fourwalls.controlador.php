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
								"nom_proyecto" => $_POST["editarNombre"],
								"equipo" => $_POST["editarEquipo"],
								"serie" => $_POST["editarSerie"],
								"costo" => $_POST["editarCosto"],
								"fec_inicio" => $_POST["editarFechaInicio"],
								"fec_fin" => $_POST["editarFechaFin"]);

				$respuesta = ModeloFourwalls::mdlEditarFourwalls($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El registro se actualizó correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
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
}
