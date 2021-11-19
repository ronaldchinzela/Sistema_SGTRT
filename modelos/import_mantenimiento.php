
<?php

include(__DIR__ . "/conexion.php");

/*=============================================
					 SUBIR CSV
=============================================*/

	//Obteniendo lo que hay en el input file
	$fileWalls = $_FILES['fileName']; 

	//Leyendo lo que tiene el archivo file
	$fileWalls = file_get_contents($fileWalls['tmp_name']);

	//Creando un formato de array separando las filas con salto de línea
	$fileWalls = explode("\n", $fileWalls);

	//Limpiando los elementos vacíos del array
	$fileWalls = array_filter($fileWalls); 

	//convirtiendo en array cada fila del archivo 
	foreach ($fileWalls as $wall) 
	{
		$wallList[] = explode(",", $wall);
	}

	//}else{
	//  header('Location: inicio');  
	//}

	//Insertando los registros
	foreach ($wallList as $index  =>  $wallData) 
	if($index!=0)
	{
		Conexion::conectar()->query("INSERT INTO mantenimiento 
							(alp,
							nom_proyecto,
							costo_fourwalls,
							costo_nexus,
							costo_hp,
							total_sol,
							total_dolar)
							VALUES

							('{$wallData[0]}',
							'{$wallData[1]}', 
							'{$wallData[2]}',
							'{$wallData[3]}',
							'{$wallData[4]}',
							'{$wallData[5]}',
							{$wallData[6]}
							)

							"); 
	}

?>