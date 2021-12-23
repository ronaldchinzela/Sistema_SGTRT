<?php
     //destruyendo la sesión cuando el usuario sin privilegios navege a traves de la url
     if($_SESSION["rol"] == "Analista"){
        echo'<script>
            window.location = "inicio";
        </script>';
        return; 
    }
?>
<div class="content-wrapper">

    <section class="content-header">

<style>

.spinner {
    margin-left: calc(50vh - 35px);
    margin-top: 100px; 
}

  .lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 86vh;
  height: 86vh;
  margin: 8px;
  top: -123px;
  left: -145px;
  border: 45px solid #37b113;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #37b113 transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
<div class="spinner">
<div class="lds-ring"><div>
</div>
</section>

<section class="content">

</section>

</div>


<?php

require_once "./modelos/conexion.php";

class ModeloEliminarNexsus{

	static public function mdlBorrarNexsus($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idnexus = :idnexus");

		$stmt -> bindParam(":idnexus", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			
			echo'<script>

        swal({
              type: "success",
              title: "El costo nexsus ha sido borrado correctamente",
              allowOutsideClick: false,
              allowEscapeKey: false,
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              
              }).then(function(result){
                        if (result.value) {

                        window.location = "costo-nexsus?idproyecto=' . $_GET["idProyecto"].'";

                        }
                    })

        </script>';
		
		}else{

            echo'<script>

            swal({
                  type: "error",
                  title: "Ocurrió un error en la eliminación",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                    if (result.value) {
    
                        window.location = "costo-nexsus?idproyecto="' . $_GET["idProyecto"].'";
    
                    }
                })
    
          </script>';	

		}

		//$stmt -> close();

		$stmt = null;
	}
}

ModeloEliminarNexsus::mdlBorrarNexsus("nexus",$_GET["idNexsus"]);

?>