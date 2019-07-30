<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	//Se recibe el valor de la categoria de evento especificada
	$value = $_GET["value"];

	include("conexion.php");

	//Si el valor recibido es 0 se muestras todos los eventos de todas las categorias y "EN REVISION"
	if($value == 0){
		$result = mysqli_query($conn, 'SELECT *
									   FROM EVENTO E
									   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   WHERE E.EST_CORREL = 3');

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
	//En caso contrario se muestran los eventos de la categoria especificada y que esten "EN REVISION"
	}else{
		$result = mysqli_query($conn, 'SELECT *
								  	   FROM EVENTO E
								  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
								       WHERE E.EST_CORREL = 3
								         AND E.CAT_CORREL = '.$value.';');

		while($row = mysqli_fetch_array($result)){
		?>
			<div class="row">
				<div class="col-6 col-md-4 col-lg-3 col-x1-2 js-col-evento">
					<a href="verevento.php?value=<?php echo $row["EVE_CORREL"] ?>" class="evento" id="<?php echo $row["EVE_CORREL"]; ?>">
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
	}

	include("desconexion.php");
?>