<?php

class ControladorHp{


	/*=============================================
				MOSTRAR HP
	=============================================*/

	static public function ctrMostrarHp($item, $valor){

		$tabla = "hp";

		$respuesta = ModeloHp::mdlMostrarHp($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
					EDITAR HP
	=============================================*/

	static public function ctrEditarHp(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEquipo"]) &&	
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSerie"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarCosto"])){

				$tabla = "hp";

				$datos = array ("idhp"=>$_POST["idHp"],			
								"equipo" => $_POST["editarEquipo"],
								"serie" => $_POST["editarSerie"],
								"costo" => $_POST["editarCosto"],
								"fec_inicio" => $_POST["editarFechaInicio"],
								"fec_fin" => $_POST["editarFechaFin"],
								"idproyecto" => $_POST["editarNombre"]);

				$respuesta = ModeloHp::mdlEditarHp($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El registro se actualizó correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Aceptar"
							  }).then(function(result){
										if (result.value) {

										window.location = "costo-hp";

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

							window.location = "costo-hp";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
					BORRAR HP
	=============================================*/

	static public function ctrBorrarHp(){

		//ELIMINAR REGISTRO DE LA TABLA HP
		if(isset($_GET["idHp"])){

			$tabla ="hp";
			$datos = $_GET["idHp"];

			$respuesta = ModeloHp::mdlBorrarHp($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Aceptar"
						  }).then(function(result){
									if (result.value) {

									window.location = "costo-hp";

									}
								})

					</script>';
			}
		}

	}

}
