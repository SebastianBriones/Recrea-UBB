<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	//Se recibe el valor de la categoria de evento especificada
	$value = $_GET["value"];

	include("conexion.php");

	//Si el valor recibido es 0 se muestras todos los eventos de todas las categorias y disponibles
	if($value == 0){
		$result = mysqli_query($conn, 'SELECT * 
									   FROM EVENTO E
									   WHERE E.EVE_ESTADO = 1');

		while($row = mysqli_fetch_array($result)){
			echo $row["EVE_CORREL"];
			echo $row["EVE_NOMBRE"];
			echo $row["CAT_CORREL"];
			echo $row["EVE_ESTADO"];
		}
	//En caso contrario se muestran los eventos de la categoria especificada y que esten disponibles
	}else{
		$result = mysqli_query($conn, 'SELECT * 
								  	   FROM EVENTO E
								       WHERE E.EVE_ESTADO = 1
								         AND E.CAT_CORREL = '.$value.';');

		while($row = mysqli_fetch_array($result)){
			echo $row["EVE_CORREL"];
			echo $row["EVE_NOMBRE"];
			echo $row["CAT_CORREL"];
			echo $row["EVE_ESTADO"];
		}
	}

	include("desconexion.php");
?>