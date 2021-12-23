<?php

class ControladorMantenimientos{

	/*=============================================
					CREAR COSTOS
	=============================================*/

	static public function ctrCrearFourwalls(){
		//TABLA FOURWALLS
		if(isset($_POST["nuevoCodigoFourwalls"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigoFourwalls"])){

			   	$tabla = "fourwalls";

			   	 $datos = array("equipo" => $_POST["nuevoEquipoFourwalls"], 
								"serie"=>$_POST["nuevoSerieFourwalls"],
								"costo" => $_POST["nuevoCostoFourwalls"], 
								"fec_inicio"=>$_POST["nuevoFechaInicioFourwalls"],
								"fec_fin"=>$_POST["nuevoFechaFinFourwalls"],
								"idproyecto"=>$_POST["nuevoCodigoFourwalls"]);
								
			   	$respuesta = ModeloMantenimientos::mdlIngresarFourwalls($tabla, $datos);
				   if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "¡El costo fourwalls ha sido registrado con éxito!",
						  allowOutsideClick: false,
						  allowEscapeKey: false,
						  showConfirmButton: true,
						  confirmButtonText: "Aceptar"
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
						  allowOutsideClick: false,
						  allowEscapeKey: false,
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

	static public function ctrCrearNexus(){
		//TABLA NEXSUS
		if(isset($_POST["nuevoCodigoNexus"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoCodigoNexus"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoPuntoRedNexsus"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nuevoCostoNexsus"])){

			   	$tabla = "nexus";

			   	 $datos = array("punto_red"=>$_POST["nuevoPuntoRedNexsus"],
								"costo"=>$_POST["nuevoCostoNexsus"],
								"idproyecto"=>$_POST["nuevoCodigoNexus"]);
					           
			   	$respuesta = ModeloMantenimientos::mdlIngresarNexsus($tabla, $datos);
				   if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "¡El costo nexsus ha sido registrado exitósamente!",
						  allowOutsideClick: false,
						  allowEscapeKey: false,
						  showConfirmButton: true,
						  confirmButtonText: "Aceptar"
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
						  allowOutsideClick: false,
						  allowEscapeKey: false,
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

	static public function ctrCrearHp(){
		//TABLA HP
		if(isset($_POST["codigoAlpHp"])){

			if(preg_match('/^[0-9]+$/', $_POST["codigoAlpHp"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nuevoCostoHp"])){

			   	$tabla = "hp";

			   	 $datos = array("equipo"=>$_POST["nuevoEquipoHp"],
								"serie" => $_POST["nuevoSerieHp"], 
								"costo"=>$_POST["nuevoCostoHp"],
								"fec_inicio" => $_POST["nuevoFechaInicioHp"],       
								"fec_fin"=>$_POST["nuevoFechaFinHp"],
								"idproyecto"=>$_POST["codigoAlpHp"]);						 
								
			   	$respuesta = ModeloMantenimientos::mdlIngresarHp($tabla, $datos);
				   if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "¡El costo HP ha sido registrado exitósamente!",
						  allowOutsideClick: false,
						  allowEscapeKey: false,
						  showConfirmButton: true,
						  confirmButtonText: "Aceptar"
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
						  allowOutsideClick: false,
						  allowEscapeKey: false,
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


