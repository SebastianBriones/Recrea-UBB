<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$value = $_GET["value"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ver Evento</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nuevo evento</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- Script de la Imagen -->
    <link rel="stylesheet" href="css/chosen.css">
    <link rel="stylesheet" href="css/ImageSelect.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/chosen.jquery.js"></script>
    <script src="js/ImageSelect.jquery.js"></script>
</head>
<body>

	<div class="wrapper">
	<?php
		include("barra.php");
	?>
		<div id="content">
		<?php
			include("barra2.php");

			include("conexion.php");

			$result = mysqli_query($conn, 'SELECT * 
									  	   FROM EVENTO E
									       WHERE E.EVE_CORREL ='.$value.';');

			while($row = mysqli_fetch_array($result)){
				echo '<h3>Nombre del evento</h3></br>'.$row["EVE_NOMBRE"].'</br></br>';
				echo '<img src="data:image/png;base64,'.base64_encode( $row["IMAGEN"] ).'"/>';
			}
		?>
		</div>
	</div>

</body>
</html>