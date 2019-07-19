<?php

	session_start();

	if($_SESSION["rol"] == 1){
		echo "Sesión Estudiante.";
	}

	if($_SESSION["rol"] == 2){
		echo "Sesión Académico.";
	}

	if($_SESSION["rol"] == 3){
		echo "Sesión Administrativo.";
	}

?>
<!DOCTYPE html>
<htm lang="es">
<head>
	<title>Inicio</title>
</head>
<body>
	<section class="eventos">
		<div class="eventos-header container-fluid">
			<div class="row">
				<div class="col-6">
					<h4>Todos los eventos</h4>
				</div>
				<div class="eventos-filtros col-6 text-right">
					<a href="">
						<span class="txt-categoria">Filtrar por categoría</span>
					</a>
				</div>
			</div>
		</div>
	</section>
</body>
</html>