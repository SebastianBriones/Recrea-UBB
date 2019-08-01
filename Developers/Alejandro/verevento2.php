<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	session_start();

	$value = $_GET["value"];
	$rol = $_SESSION["rol"];

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
<form action="modificarevento.php" method="post" id="usrform"> 
<section class="ficha-evento">
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
									  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									  	   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									  	   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									       WHERE E.EVE_CORREL ='.$value.';');

			while($row = mysqli_fetch_array($result)){
				echo '<h3>Nombre del evento</h3></br>'.$row["EVE_NOMBRE"].'</br></br>';
				echo '<h6>Fecha</h6></br>'.$row["EVE_FECHA"].'</br></br>';
				echo '<h6>Hora</h6></br>'.$row["EVE_HORA"].'</br></br>';
				echo '<h6>Lugar</h6></br>'.$row["ESP_NOMBRE"].'</br></br>';
				echo '<h6>Ubicación</h6></br>'.$row["EDI_NOMBRE"].'</br></br>';
				echo '<h6>Info</h6></br>'.$row["EVE_DESCRIP"].'</br></br>';
				echo '<img style="width:100px;height:100px;" src="data:image/png;base64,'.base64_encode( $row["IMAGEN"] ).'"/>';
				
				echo '<input type="hidden" name="value" value='.$row["EVE_CORREL"].'/>';
			}
			?>
 
            </br>
			
			<tr>
			<br>
			<td><input type="submit" id="botonModificar" value="Modificar"class="btn btn-secondary btn-sm"></td>
			</tr>
			</form><br><br>
			
			
<form action="cancelarevento.php" method="post" id="usrform"> 
  
			<?php
 
			$result = mysqli_query($conn, 'SELECT * 
									  	   FROM EVENTO E
									  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									  	   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									  	   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									       WHERE E.EVE_CORREL ='.$value.';');

			while($row = mysqli_fetch_array($result)){
 
				echo '<input type="hidden" name="value" value='.$row["EVE_CORREL"].'/>';
			}
			?>
 
			<td><input type="submit" id="botonModificar" value="Cancelar"class="btn btn-secondary btn-sm"></td>
		 
			</form>
			
			
			

			<?php

			if($rol == 3){
			?>
			    <label><a> Estado del evento  </a></label>
				<form name="formadmin" action="cambiaestado.php?value=<?php echo $value ?>" method="post">
					<!--Lista opciones Administrativo-->
						<div class="eventos-filtros">
							<select class="estados" id="estados" name="estados">
								<option value="1">Aceptado</option>
								<option value="4">Requiere cambios</option>
								<option value="5">Rechazado</option>
							</select>
						</div><br>
					<textarea name="descripcion"></textarea><br>
					<input type="submit" value="Enviar">
				<form>
			<?php
			}
			?>
			

			<button onclick="CalificarEvento()">Calificar evento</button>

			<script type="text/javascript">
				function CalificarEvento(){

			var opciones = "width=340,height=710,scrollbars=NO";

			window.open("http://146.83.198.35/~recreaubb/calificarjano.php?idevento= <?php echo $value ?>","calificar evento", opciones);
			}

			</script>


		</div>
	</div>
</section>

</body>
</html>
