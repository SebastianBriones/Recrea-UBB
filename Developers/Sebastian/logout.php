<?php 

	session_start();
	unset($_SESSION["rut"]);
	unset($_SESSION["rol"]);
	unset($_SESSION["nombres"]);
	unset($_SESSION["paterno"]);
	header('Location: http://146.83.198.35/~recreaubb');

?>