<?php

class ControladorMantenimientos{

	/*=============================================
					MOSTRAR MANTENIMIENTOS
	=============================================*/

	static public function ctrMostrarMantenimientos($item, $valor){

		$tabla = "mantenimientos";

		$respuesta = ModeloMantenimientos::mdlMostrarMantenimientos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
					CREAR MANTENIMIENTOS
	=============================================*/

	static public function ctrCrearMantenimiento(){

		//TABLA PROYECTO
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla = "proyecto";

			   	$datos = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"]);

			   	$respuesta = ModeloMantenimientos::mdlIngresarMantenimiento($tabla, $datos);

		}
	}

		//TABLA FOURWALLS
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla = "fourwalls";

			   	$datos = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"],
							   "equipo" => $_POST["nuevoEquipoFourwalls"], 
							   "serie"=>$_POST["nuevoSerieFourwalls"],
							   "costo" => $_POST["nuevoCostoFourwalls"], 
							   "fec_inicio"=>$_POST["nuevoFechaInicioFourwalls"],
					           "fec_fin"=>$_POST["nuevoFechaFinFourwalls"]);

			   	$respuesta = ModeloMantenimientos::mdlIngresarMantenimiento($tabla, $datos);

		}
	}

		//TABLA NEXSUS
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla = "nexus";

			   	$datos = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"],
							   "punto_red"=>$_POST["nuevoPuntoRedNexsus"],
					           "costo"=>$_POST["nuevoCostoNexsus"]);

			   	$respuesta = ModeloMantenimientos::mdlIngresarMantenimiento($tabla, $datos);

			}

		}

		//TABLA HP
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla = "hp";

			   	$datos = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"],							 
							   "equipo"=>$_POST["nuevoEquipoHp"],
							   "serie" => $_POST["nuevoSerieHp"], 
							   "costo"=>$_POST["nuevoCostoHp"],
							   "fec_inicio" => $_POST["nuevoFechaInicioHp"],       
					           "fec_fin"=>$_POST["nuevoFechaFinHp"]);

			   	$respuesta = ModeloMantenimientos::mdlIngresarMantenimiento($tabla, $datos);

			}

		}

		//TABLA MANTENIMIENTO
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla = "mantenimientos";

			   	$datos = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"],
							   "costoFourwalls" => $_POST["nuevoCostoFourwalls"], 							  
							   "costoNexus" => $_POST["nuevoCostoNexsus"], 					   
					           "costoHp"=>$_POST["nuevoCostoHp"]);

			   	$respuesta = ModeloMantenimientos::mdlIngresarMantenimiento($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "¡Los datos han sido registrados exitósamente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "costo-mantenimiento";

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

							window.location = "costo-mantenimiento";

							}
						})

			  	</script>';



			}

		}

	}
}