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
    <title>Modificar evento</title>
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
              <h2>Modificar Evento</h2>
              <div class="form-group">
                <label for="inputNombre">Nombre</label>
                <input type="text" id="inputNombre" name="EVE_NOMBRE" class="form-control" value="<?php echo $mostrar['EVE_NOMBRE'] ?>" Required >
              </div>
               <div class="form-group">
                <label for="inputTitulo">Categoría</label>
                 <select class="form-control form-control-sm"name="CAT_CORREL">
                    <option value=''disabled  >--Categorías--</option>
            <?php 
                 include("conexion.php");
                 $result = mysqli_query($conn, 'SELECT * FROM CATEGORIA;');
                 while($row=mysqli_fetch_assoc($result)) { 
			 
			        if($row[CAT_CORREL]==$mostrar[CAT_CORREL]){
					  echo "<option value='$row[CAT_CORREL]'selected>$row[CAT_NOMBRE]</option>";
					}else{
						 echo "<option value='$row[CAT_CORREL]'>$row[CAT_NOMBRE]</option>";
					}
				 
                } 
				
				include("desconexion.php");
            ?> 
                </select>
                 
 
              </div>
              <div class="form-group">
                <label for="inputFecha">Fecha</label>
                <input type="date" id="inputFecha"name="EVE_FECHA" class="form-control" value="<?php echo $mostrar['EVE_FECHA'] ?>" Required >
              </div>
     
              <div class="form-group">
                <label for="inputHora">Hora</label>
                <input type="text" id="inputHora"name="EVE_HORA" class="form-control" value="<?php echo $mostrar['EVE_HORA'] ?>" Required>
              </div>
              <div class="form-group">
                <label for="inputDescripcion">Descripción</label></br>
                 
               <textarea name="EVE_DESCRIP" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($mostrar['EVE_DESCRIP']) ?></textarea>
			  
			  </div>
              <div class="form-group">
                <label for="inputFecha">Imagen actual</label></br>
				<?php
				echo '<img height="300" width="300" src="data:image/png;base64,'.base64_encode( $mostrar['IMAGEN'] ).'"/>';
				?>
                <input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" >
              </div>
			  
   
			  
			  
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Registrar</button>
            </form>
			
		   <?php 
	}

	
	

	 ?>	
			
			
        </div>
    </div>
</body>
</html>


<?php
include("guardarmodificarevento.php");
 if(isset($_POST['submit'])){
	 
    
	 
    $campos = array("EVE_CORREL"=>$_POST['EVE_CORREL'],"CAT_CORREL"=>$_POST['CAT_CORREL'],
    "EVE_NOMBRE"=>$_POST['EVE_NOMBRE'],"EVE_FECHA"=>$_POST['EVE_FECHA']
    ,"EVE_HORA"=>$_POST['EVE_HORA'],"EVE_DESCRIP"=>$_POST['EVE_DESCRIP'],"IMAGEN"=>$_POST['IMAGEN']); 
 
    $a = new GuardarModificarEvento("recreaubb"); 
    $a->modificar($campos);
 }
 
?>

