<?php  

  session_start();

?>

<!doctype html>
<head>
  <title>Recrea UBB - Calificación</title>
  <meta name="description" content="">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/starrr.css">
   
</head>
<body>
  

	<div class="container">
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

    $idevento = $_GET["idevento"];

  	$consulta="SELECT * FROM `EVENTO` WHERE `EST_CORREL` = 2 AND `EVE_CORREL` = '$idevento' ORDER BY `EVE_DESCRIP` DESC ";
   	$resultado = mysqli_query($conexion_db,$consulta);
 
	  
 	while($fila=mysqli_fetch_array($resultado)){  
		$nombre=$fila["EVE_NOMBRE"];
		$fecha=$fila["EVE_FECHA"];
		$descripcion=$fila["EVE_DESCRIP"];
		$contenido=$fila["IMAGEN"];	
		//echo '<table border="1" text-align: center>';
		echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col">';
	    echo "<p>Nombre del evento</p> $nombre</br>";
		echo '</div>';
        echo '<div class="col">Column2
			   
		</div>';
        echo '<div class="w-100">   
		</div>';
        echo '<div class="col"> 
		<img height="300" width="300" src="data:image/png;base64,'.base64_encode( $contenido ).'"/>  
 			 
		</div>';
        echo '<div class="col">Column4
				   
		</div>';
		}
    ?>


    <h5>Haga click para calificar:</h5>
    <div class='starrr' id='star1'></div>
    <div>&nbsp;
    	<span class='your-choice-was' style='display: none;'>
        Tu calificacion fue: <span id="ID" class='choice'></span>.
    	</span>
    </div>

     
</div>


	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	<div class="form-group">
	<label for="inputNombre"></label>
	<input type="hidden" id="star1" value=" <?php echo $idevento ?>"name="EVE_CORREL" class="form-control" placeholder="Escriba el nombre del evento" Required >
	</div>
	<div class="form-group">
	<label for="inputNombre"></label>


 <input type="hidden" id="inputNombre" name="EVE_NOTA" value= "



	"class="form-control" placeholder="Escriba el nombre del evento" Required >

            </div>
 			<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Registrar</button>
            </form>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
  <script src="dist/starrr.js"></script>
  <script>


    $('#star1').starrr({
    change: function(e, value){
        if (value) {
        	$('.your-choice-was').show();
        	$('.choice').text(value);
			document.getElementById("inputNombre").value = value;
		} else {
        	$('.your-choice-was').hide();
        }
      }
    });

    var $s2input = $('#star2_input');
    $('#star2').starrr({
      max: 10,
      rating: $s2input.val(),
      change: function(e, value){
        $s2input.val(value).trigger('input');
      }
    });
  </script>
  <script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-39205841-5', 'dobtco.github.io');
    ga('send', 'pageview');
	



  </script>
</body>
</html>


<?php
include("calificareventojano.php");
 if(isset($_POST['submit'])){
	$campos = array("EVE_CORREL"=>$_POST['EVE_CORREL'],"EVE_NOTA"=>$_POST['EVE_NOTA']); 
 	$a = new GuardarModificarEvento("recreaubb"); 
	$a->modificar($campos);
	}
 
?>

<style type='text/css'>
  img.ribbon {
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    border: 0;
    cursor: pointer; }

  .container {
    margin-top: 60px;
    text-align: center;
    max-width: 450px; }

  input {
    width: 30px;
    margin: 10px 0;
  }
</style>
  
    