<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	//Se recibe el valor de la busqueda de evento especificada
	$busqueda = $_GET["busqueda"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Recrea UBB - Buscar eventos</title>
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
		?>
		<!--Seccion que muestra los eventos-->
		<section class="eventos">
			<!--Cabecera de los eventos-->
			<div class="eventos-header">
				<div class="row">
					<div class="col-6">
						<h4>RESULTADOS PARA: "<?php echo $busqueda ?>"</h4>
					</div>
				</div>
			</div>
			<!--Seccion de eventos-->
			<div class="eventos-contenedor">
				<?php

				include("conexion.php");

				$result = mysqli_query($conn, "SELECT *
								               FROM EVENTO E
								               INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
								               INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
								               INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
								               WHERE E.EST_CORREL = 1
								            	 AND E.EVE_NOMBRE LIKE '%".$busqueda."%';");

				while($row = mysqli_fetch_array($result)){
				?>
					<div class="row">
						<div class="col-6 col-md-4 col-lg-3 col-x1-2 js-col-evento">
							<a href="verevento.php?value=<?php echo $row["EVE_CORREL"]; ?>" class="evento" id="<?php echo $row["EVE_CORREL"]; ?>">
								<?php echo '<img style="width:250px;height:210px;" src="data:image/png;base64,'.base64_encode( $row["IMAGEN"] ).'"/>';?>
								<div class="titulo">
									<h5><?php echo $row["EVE_NOMBRE"] ?></h5>
									<p><?php echo $row["ESP_NOMBRE"] ?></p> 
									<P><?php echo $row ["EDI_NOMBRE"] ?></p>
									<p><?php echo $row["EVE_FECHA"] ?></p>
								</div>
							</a>
						</div>
					</div>
				<?php
				}

				include("desconexion.php");

				?>
			</div>
		</section>
	</div>
</div>

</body>
</html>