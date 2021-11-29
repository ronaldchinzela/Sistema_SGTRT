<?php

class ControladorNexsus{


	/*=============================================
					MOSTRAR NEXSUS
	=============================================*/

	static public function ctrMostrarNexsus($item, $valor){

		$tabla = "nexus";

		$respuesta = ModeloNexsus::mdlMostrarNexsus($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
					EDITAR NEXSUS
	=============================================*/

	static public function ctrEditarNexsus(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPunto"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarCosto"])){

				$tabla = "nexus";

				$datos = array ("idnexus"=>$_POST["idNexsus"],
								"nom_proyecto" => $_POST["editarNombre"],
								"punto_red" => $_POST["editarPunto"],
								"costo" => $_POST["editarCosto"]);

				$respuesta = ModeloNexsus::mdlEditarNexsus($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El registro se actualizó correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Aceptar"
							  }).then(function(result){
										if (result.value) {

										window.location = "costo-nexsus";

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

							window.location = "costo-nexsus";

							}
						})

			  	</script>';
			}
		}

	}
}