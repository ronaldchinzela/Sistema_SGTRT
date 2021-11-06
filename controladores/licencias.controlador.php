<?php

class ControladorLicencias{

	/*=============================================
					CREAR LICENCIAS
	=============================================*/

	static public function ctrCrearLicencia(){

		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoLicencia"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nuevoCosto"])){

			   	$tabla = "licencia_spla";

			   	$datos = array("cod_licencia"=>$_POST["nuevoCodigo"],
					           "nom_licencia"=>$_POST["nuevoLicencia"],
							   "tipo" => $_POST["nuevoTipo"],          
					           "costo"=>$_POST["nuevoCosto"]);

			   	$respuesta = ModeloLicencias::mdlIngresarLicencia($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "¡La licencia ha sido generada exitósamente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "licencia-spla";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos ingresados no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "licencia-spla";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
					MOSTRAR LICENCIAS
	=============================================*/

	static public function ctrMostrarLicencias($item, $valor){

		$tabla = "licencia_spla";

		$respuesta = ModeloLicencias::mdlMostrarLicencias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
					EDITAR LICENCIA
	=============================================*/

	static public function ctrEditarLicencia(){

		if(isset($_POST["editarLicencia"])){

			if(preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigo"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLicencia"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarCosto"])){

			   	$tabla = "licencia_spla";

			   	$datos = array("id_licencia"=>$_POST["idLicencia"],
			   				   "cod_licencia"=>$_POST["editarCodigo"],
					           "nom_licencia"=>$_POST["editarLicencia"],
					           "tipo"=>$_POST["editarTipo"],
					           "costo"=>$_POST["editarCosto"]);

			   	$respuesta = ModeloLicencias::mdlEditarLicencia($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La licencia ha sido actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "licencia-spla";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos ingresados no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "licencia-spla";

							}
						})

			  	</script>';



			}

		}

	}

}

