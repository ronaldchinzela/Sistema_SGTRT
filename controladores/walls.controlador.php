<?php

class ControladorWalls{

	/*=============================================
					MOSTRAR MANTENIMIENTOS
	=============================================*/

	static public function ctrMostrarWalls($item, $valor){

		$tabla = "mantenimientos";

		$respuesta = ModeloWalls::mdlMostrarWalls($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
					CREAR MANTENIMIENTOS
	=============================================*/

	static public function ctrCrearMantenimiento(){

		//TABLA FOURWALLS
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla1 = "fourwalls";

			   	$datos1 = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"],
							   "equipo" => $_POST["nuevoEquipoFourwalls"], 
							   "serie"=>$_POST["nuevoSerieFourwalls"],
							   "costo" => $_POST["nuevoCostoFourwalls"], 
							   "fec_inicio"=>$_POST["nuevoFechaInicioFourwalls"],
					           "fec_fin"=>$_POST["nuevoFechaFinFourwalls"]);

			   	$respuesta = ModeloWalls::mdlIngresarMantenimiento($tabla1, $datos1);

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

		//TABLA NEXSUS
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla2 = "nexus";

			   	$datos2 = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"],
							   "punto_red"=>$_POST["nuevoPuntoRedNexsus"],
					           "costo"=>$_POST["nuevoCostoNexsus"]);

			   	$respuesta = ModeloWalls::mdlIngresarMantenimiento($tabla2, $datos2);

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

		//TABLA HP
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla3 = "hp";

			   	$datos3 = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"],							 
							   "equipo"=>$_POST["nuevoEquipoHp"],
							   "serie" => $_POST["nuevoSerieHp"], 
							   "costo"=>$_POST["nuevoCostoHp"],
							   "fec_inicio" => $_POST["nuevoFechaInicioHp"],       
					           "fec_fin"=>$_POST["nuevoFechaFinHp"]);

			   	$respuesta = ModeloWalls::mdlIngresarMantenimiento($tabla3, $datos3);

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

		//TABLA MANTENIMIENTO
		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigo"]) &&
			   preg_match('/[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMantenimiento"])){

			   	$tabla4 = "mantenimientos";

			   	$datos4 = array("alp"=>$_POST["nuevoCodigo"],
					           "nom_proyecto"=>$_POST["nuevoMantenimiento"],
							   "costof" => $_POST["nuevoEquipoFourwalls"], 							  
							   "coston" => $_POST["nuevoCostoFourwalls"], 					   
					           "costoh"=>$_POST["nuevoCostoNexsus"]);

			   	$respuesta = ModeloWalls::mdlIngresarMantenimiento($tabla4, $datos4);

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