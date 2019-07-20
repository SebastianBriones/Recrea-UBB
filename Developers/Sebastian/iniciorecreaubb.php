<?php
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

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
<html>
<head>
	<title>Inicio</title>
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
						<h3>Eventos</h3>
					</div>
					<!--Lista para filtrar eventos-->
					<div class="eventos-filtros">
						<select class="categorias" id="categoria" name="categoria" onchange="functioneventos()">
							<option value="0" selected>Todas las categorías</option>
							<option value="1">Música</option>
							<option value="2">Deportes</option>
							<option value="3">Teatro</option>
							<option value="4">Charlas</option>
							<option value="5">Familia</option>
						</select>
					</div>
				</div>
			</div>
			<!--Seccion de eventos-->
			<div class="eventos-contenedor">
				<div class="lista-eventos" id="lista-eventos"></div>
			</div>
		</section>
	</div>
</div>

<script>  

		//Función que otorga por defecto el valor de "Todas las categorias de eventos"
		window.onload = function eventos(){
			console.log(document.getElementById("categoria").value);
			//div muestra un mensaje de carga.
			document.getElementById("lista-eventos").innerHTML = "Cargando. Por favor espere.";

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){

                    //donde estaba el espacio de carga aparecera el elemento en respuesta
					document.getElementById("lista-eventos").innerHTML = this.responseText;

					console.log(document.getElementById("categoria").value);


				}
			}

            //Se desclaran las variables que pasaran al otro archivo .php
			value = 0;

            //Se envian las variables
			xmlhttp.open("GET", 'mostrareventos.php?value=' + value, true);
			xmlhttp.send();
		}

		//Función que muestra los eventos segun categoria especificada en la lista
 		function functioneventos(){
			console.log(document.getElementById("categoria").value);
			//div muestra un mensaje de carga.
			document.getElementById("lista-eventos").innerHTML = "Cargando. Por favor espere.";

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){

                    //donde estaba el espacio de carga aparecera el elemento en respuesta
					document.getElementById("lista-eventos").innerHTML = this.responseText;

					console.log(document.getElementById("categoria").value);


				}
			}

            //Se desclaran las variables que pasaran al otro archivo .php
			value = document.getElementById("categoria").value;

            //Se envian las variables
			xmlhttp.open("GET", 'mostrareventos.php?value=' + value, true);
			xmlhttp.send();
		}


</script>

</body>
</html>
