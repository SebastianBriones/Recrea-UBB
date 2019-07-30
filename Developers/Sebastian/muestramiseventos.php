<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	session_start();

	//Se recibe el valor de la categoria de evento especificada
	$value1 = $_GET["value1"];
	//Se recibe el valor del estado de evento especificado
	$value2 = $_GET["value2"];
	//Se declara variable con el rut del usuario o administrativo
	$rut = $_SESSION["rut"];
	//Se declara variable con el correlativo del rol del usuario o administrativo
	$rol = $_SESSION["rol"];

	include("conexion.php");

	//Si los valores recibidos son ambos 0 se muestras todos los eventos de todas las categorias y estados
	if($value1 == 0 && $value2 == 0 && $rol != 3){
		$result = mysqli_query($conn, 'SELECT *
									   FROM EVENTO E
									   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   INNER JOIN ORGANIZA O ON E.EVE_CORREL = O.EVE_CORREL
									   INNER JOIN USUARIO U ON O.USU_RUT = U.USU_RUT
									   WHERE U.USU_RUT = '.$rut.';');

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
	//En caso contrario se muestran los eventos de la categoria especificada y que esten disponibles
	}else if($value1 != 0 && $value2 == 0 && $rol != 3){
		$result = mysqli_query($conn, 'SELECT * 
								  	   FROM EVENTO E
								  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   INNER JOIN ORGANIZA O ON E.EVE_CORREL = O.EVE_CORREL
									   INNER JOIN USUARIO U ON O.USU_RUT = U.USU_RUT
									   WHERE U.USU_RUT = "'.$rut.'"
								         AND E.CAT_CORREL = '.$value1.';');

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
	//En otro caso se muestran los eventos con el estado especificado y que esten disponibles
	}else if($value1 == 0 && $value2 != 0 && $rol != 3){
		$result = mysqli_query($conn, 'SELECT * 
								  	   FROM EVENTO E
								  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   INNER JOIN ORGANIZA O ON E.EVE_CORREL = O.EVE_CORREL
									   INNER JOIN USUARIO U ON O.USU_RUT = U.USU_RUT
									   WHERE U.USU_RUT = "'.$rut.'"
								         AND E.EST_CORREL = '.$value2.';');

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
	//Se muestran los eventos con estado y categoria especificada
	}else if($rol != 3){
		$result = mysqli_query($conn, 'SELECT * 
								  	   FROM EVENTO E
								  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   INNER JOIN ORGANIZA O ON E.EVE_CORREL = O.EVE_CORREL
									   INNER JOIN USUARIO U ON O.USU_RUT = U.USU_RUT
									   WHERE U.USU_RUT = "'.$rut.'"
									     AND E.CAT_CORREL = '.$value1.'
								         AND E.EST_CORREL = '.$value2.';');

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
	//Si los valores recibidos son ambos 0 se muestras todos los eventos de todas las categorias y estados
	}else if($value1 == 0 && $value2 == 0 && $rol == 3){
		$result = mysqli_query($conn, 'SELECT *
									   FROM EVENTO E
									   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   INNER JOIN ORGANIZA O ON E.EVE_CORREL = O.EVE_CORREL
									   INNER JOIN USUARIO U ON O.USU_RUT = U.USU_RUT');

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
	//En caso contrario se muestran los eventos de la categoria especificada y que esten disponibles
	}else if($value1 != 0 && $value2 == 0 && $rol == 3){
		$result = mysqli_query($conn, 'SELECT * 
								  	   FROM EVENTO E
								  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   INNER JOIN ORGANIZA O ON E.EVE_CORREL = O.EVE_CORREL
									   INNER JOIN USUARIO U ON O.USU_RUT = U.USU_RUT
								       WHERE E.CAT_CORREL = '.$value1.';');

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
	//En otro caso se muestran los eventos con el estado especificado y que esten disponibles
	}else if($value1 == 0 && $value2 != 0 && $rol == 3){
		$result = mysqli_query($conn, 'SELECT * 
								  	   FROM EVENTO E
								  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   INNER JOIN ORGANIZA O ON E.EVE_CORREL = O.EVE_CORREL
									   INNER JOIN USUARIO U ON O.USU_RUT = U.USU_RUT
								       WHERE E.EST_CORREL = '.$value2.';');

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
	//Se muestran los eventos con estado y categoria especificada
	}else{
		$result = mysqli_query($conn, 'SELECT * 
								  	   FROM EVENTO E
								  	   INNER JOIN REALIZA R ON E.EVE_CORREL = R.EVE_CORREL
									   INNER JOIN ESPACIO S ON R.ESP_CORREL = S.ESP_CORREL
									   INNER JOIN EDIFICIO D ON S.EDI_CORREL = D.EDI_CORREL
									   INNER JOIN ORGANIZA O ON E.EVE_CORREL = O.EVE_CORREL
									   INNER JOIN USUARIO U ON O.USU_RUT = U.USU_RUT
									   WHERE E.CAT_CORREL = '.$value1.'
								         AND E.EST_CORREL = '.$value2.';');

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