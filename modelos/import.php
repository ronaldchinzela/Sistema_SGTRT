<?php

include(__DIR__ . "/conexion.php");


$filePruebas = $_FILES['filePruebas']; 
$filePruebas = file_get_contents($filePruebas['tmp_name']);

$filePruebas = explode("\n", $filePruebas);
$filePruebas = array_filter($filePruebas); 

foreach ($filePruebas as $prueba) 
{
	$pruebaList[] = explode(",", $prueba);
}

//insertar
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