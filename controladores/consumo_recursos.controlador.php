<?php

class ControladorConsumos{

	/*=============================================
			  MOSTRAR CONSUMO DE RECURSOS
	=============================================*/

	static public function ctrMostrarConsumos($item, $valor){

		$tabla = "consumo_recursos";

		$respuesta = ModeloConsumos::mdlMostrarConsumos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
				DESCARGAR REPORTE EN EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		if(isset($_GET["reporte"])){

			$tabla = "consumo_recursos";

			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

				$consumos = ModeloConsumos::mdlRangoFechasConsumos($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

			}else{

				$item = null;
				$valor = null;

				$consumos = ModeloConsumos::mdlMostrarConsumos($tabla, $item, $valor);

			}


			/*=============================================
					CREACIÓN DEL ARCHIVO EXCEL
			=============================================*/

			//ASIGNANDO UN NOMBRE AL ARCHIVO "reporte.xls"
			$Name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			//INGRESO DE TODOS LOS CARACTERES CON TILDES
			echo utf8_decode("<table border='0'> 
	
					<tr> 
						<td style='font-weight:bold; border:1px solid #eee;'>ACTIVO</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>ALP</td>
						<td style='font-weight:bold; border:1px solid #eee;'>PROYECTO</td>
						<td style='font-weight:bold; border:1px solid #eee;'>SERVIDOR</td>
						<td style='font-weight:bold; border:1px solid #eee;'>CPU</td>
						<td style='font-weight:bold; border:1px solid #eee;'>MEMORIA</td>
						<td style='font-weight:bold; border:1px solid #eee;'>DISCO</td>		
						<td style='font-weight:bold; border:1px solid #eee;'>SERVICIO</td>			
					</tr>");

		
			foreach ($consumos as $row => $item){
			 echo utf8_decode("<tr>
									<td style='border:1px solid #eee;'>".$item["activo"]."</td> 
									<td style='border:1px solid #eee;'>".$item["alp"]."</td>
									<td style='border:1px solid #eee;'>".$item["proyecto"]."</td>
									<td style='border:1px solid #eee;'>".$item["servidor"]."</td>
									<td style='border:1px solid #eee;'>".$item["cpu"]."</td>
									<td style='border:1px solid #eee;'>".$item["memoria"]."</td>
									<td style='border:1px solid #eee;'>".$item["disco"]."</td>
									<td style='border:1px solid #eee;'>".$item["servicio"]."</td>		
									</tr>");	
								}
								
				 echo "</table>";
	 		
		 		
			}

		}

	}
