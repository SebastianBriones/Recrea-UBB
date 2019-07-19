<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	session_start();

	include("conexion.php");

	$usu_rut = $_POST["usu_rut"];
	$usu_pass = $_POST["usu_pass"];

	if (!empty($usu_rut) && !empty($usu_pass)){
		$result = mysqli_query($conn, 'SELECT U.USU_RUT, U.USU_PASS, U.USU_NOMBRES, U.USU_PATERNO, R.ROL_CORREL 
									   FROM USUARIO U
									   INNER JOIN ROL R ON U.ROL_CORREL = R.ROL_CORREL
									   WHERE U.USU_RUT ="'.$usu_rut.'";');

		$row = mysqli_fetch_assoc($result);

		if($usu_pass == $row["USU_PASS"]){

			$_SESSION["rut"] = $row["USU_RUT"];
			$_SESSION["rol"] = $row["ROL_CORREL"];
			$_SESSION["nombres"] = $row["USU_NOMBRES"];
			$_SESSION["paterno"] = $row["USU_PATERNO"];

			header('Location: http://localhost/RecreaUBB/iniciorecreaubb.php');
			exit();
		}else{
			header('Location: http://localhost/RecreaUBB/index.php?error=0');
            exit();
		}
	}

	include("desconexion.php");
?>