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
					EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){

			   	$tabla = "clientes";

			   	$datos = array("id"=>$_POST["idCliente"],
			   				   "nombre"=>$_POST["editarCliente"],
					           "documento"=>$_POST["editarDocumentoId"],
					           "email"=>$_POST["editarEmail"],
					           "telefono"=>$_POST["editarTelefono"],
					           "direccion"=>$_POST["editarDireccion"],
					           "fecha_nacimiento"=>$_POST["editarFechaNacimiento"]);

			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

}

