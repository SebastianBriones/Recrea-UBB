<?php

	$conn = mysqli_connect("localhost","root","","recreaubb");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		echo 'Ha habido un problema al conectarse a la base de datos. Por favor cont&aacute;ctese con administrador.';
	}	

?>