  <?php 

	$conexion=mysqli_connect('localhost','recreaubb','recrea2019','recreaubb');
	 session_start();

	$value = $_POST["value"];
 
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cancelar evento</title>
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
        <!-- Barra Lateral-->
        <?php
            include("barra.php");
        ?>
        <!-- Contenido de la Pagina  -->
        <div id="content">
        <?php
            include("barra2.php");
        ?>
  
  
  
  
  <?php 
 
		$sql="SELECT * FROM `EVENTO` WHERE `EVE_CORREL` = '$value'";
		$result=mysqli_query($conexion,$sql);
        $idrec=$Nombre;
		
		
		while($mostrar=mysqli_fetch_array($result)){
			 $idBr=$mostrar['EVE_CORREL'];
		 ?>
            <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
              <h2>Cancelar Evento</h2>
              <div class="form-group">
                <label for="inputNombre">Nombre</label>
                 <?php echo $mostrar['EVE_NOMBRE'] ?> 
              </div>
               <div class="form-group">
                <label for="inputTitulo">Categoría</label>
                  <?php echo $mostrar['EVE_CAT'] ?> 
              </div>
			  
			  
               <input type="hidden" name="EVE_CORREL" value=' <?php echo $mostrar['EVE_CORREL'] ?> '/> 
               
              
              <div class="form-group">
                <label for="inputFecha">Fecha</label>
               <?php echo $mostrar['EVE_CORREL'] ?> 
              </div>
              <div class="form-group">
                <label for="inputHora">Hora</label>
              <?php echo $mostrar['EVE_HORA'] ?> 
              </div>
              <div class="form-group">
                <label for="inputDescripcion">Descripción</label></br>
                 
              <?php echo utf8_encode($mostrar['EVE_DESCRIP']) ?>
			  
			  </div>
              <div class="form-group">
                <label for="inputFecha">Imagen actual</label></br>
				<?php
				echo '<img height="300" width="300" src="data:image/png;base64,'.base64_encode( $mostrar['IMAGEN'] ).'"/>';
				?>
                
              </div>
			  
   
			  
			  
              <button class="btn btn-danger" type="submit" name="submit">Cancelar</button>
            </form>
			
		   <?php 
	}

	
	

	 ?>	
			
			
        </div>
    </div>
</body>
</html>


<?php
include("guardarcancelarevento.php");
 if(isset($_POST['submit'])){
	 
    
	 
    $campos = array("EVE_CORREL"=>$_POST['EVE_CORREL']); 
 
    $a = new GuardarModificarEvento("recreaubb"); 
    $a->modificar($campos);
 }
 
?>

