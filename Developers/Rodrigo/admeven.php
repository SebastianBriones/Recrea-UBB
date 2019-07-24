 <!DOCTYPE html>
 <html>
<head>
<title>Administrador de Evento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <!--barra lateral-->
  <?php
   include("barra.php");
  ?>
  <!--contenido de la pagina-->
 <div id="content">
          	
  <form action="">
  <p>Eventos en Pendientes:</p>    
  </p>
  </form>
   <?php
   require("config.php");
   $conexion_db=mysqli_connect(DB_HOST,DB_USUARIO,DB_CONTRA,DB_NOMBRE);
   if(mysqli_connect_errno()){
    echo "Error en la conexion";
    exit();
   }
   mysqli_select_db($conexion_db,DB_NOMBRE) or die
   ("No se encuentra la base de datos");
    mysqli_set_charset($conexion_db,"utf8");

   $consulta="SELECT * FROM EVENTO WHERE 1";
   $resultado = mysqli_query($conexion_db,$consulta);

 while($fila=mysqli_fetch_array($resultado)){  
				$nombre=$fila["EVE_NOMBRE"];
				$fecha=$fila["EVE_FECHA"];
				$descripcion=$fila["EVE_DESCRIP"];
				$contenido=$fila["IMAGEN"];	
				echo '<table border="1" text-align: center>';
				echo '<tr>';
				 echo '<td>';
				 echo '<img height="100" width="100" src="data:image/png;base64,'.base64_encode( $contenido ).'"/>';
				 echo '</td>';
				 echo '<td>';
			     echo "<p>Nombre del evento</p> $nombre</br>";
				 echo '</td>';
				 echo '<td>';
				 echo "<p>Fecha del evento</p> $fecha</br>";
				 echo '</td>';
				 echo '<td>';
				 echo "<p>Descripcion</p> $descripcion</br>";
				 echo '</td>';
				 echo '</br>';
				 echo '</tr>';
				 echo '</table>';
				 echo '<table>';
				 echo '<tr>';
				 echo '<p> Comentario </p>';
				 echo '<td> <textarea name="comentario" rows="2" cols="25" Required></textarea></td>';
				 echo '<td> <input type="submit" id="Aceptar" name="Aceptar" value="Aceptar" class="form-control" ></td>';
				 echo '<td> <input type="submit" id="Rechazar" name="Aceptar" value="Rechazar" class="form-control" ></td>';
				 echo '<td> <input type="submit" id="Modificar" name="Aceptar" value="Modificar" class="form-control" ></td>';
				 echo '</tr>';
				 
				
 }	   
  ?>
  
  </div>
</body>
</html>






 
 <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
 




  
    