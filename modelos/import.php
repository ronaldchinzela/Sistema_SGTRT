<?php

include(__DIR__ . "/conexion.php");

//if(isset($_FILES['filePruebas'])){

//Obteniendo lo que hay en el input file
$filePruebas = $_FILES['filePruebas']; 

//Leyendo lo que tiene el archivo file
$filePruebas = file_get_contents($filePruebas['tmp_name']);

//Creando un formato de array separando las filas con salto de línea
$filePruebas = explode("\n", $filePruebas);

//Limpiando los elementos vacíos del array
$filePruebas = array_filter($filePruebas); 

//convirtiendo en array cada fila del archivo 
foreach ($filePruebas as $prueba) 
{
	$pruebaList[] = explode(",", $prueba);
}

//}else{
  //  header('Location: inicio');  
//}

//Insertando los registros
foreach ($pruebaList as $index  =>  $pruebaData) 
if($index!=0)
{
	Conexion::conectar()->query("INSERT INTO pruebas 
						(id,
                        nombre,
                        proyecto,
                        serie,
                        precio)
						 VALUES

						 ('{$pruebaData[0]}',
						  '{$pruebaData[1]}', 
						  '{$pruebaData[2]}',
						  '{$pruebaData[3]}',
						  {$pruebaData[4]}
						   )

						 "); 
  }

?>