<!DOCTYPE html>
<html>

<head>
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
        <!-- Barra Lateral-->
        <?php
            include("barra.php");
        ?>
        <!-- Contenido de la Pagina  -->
        <div id="content">
        <?php
            include("barra2.php");
        ?>
  
            <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
              <h2>Nuevo Evento</h2>
              <div class="form-group">
                <label for="inputNombre">Nombre</label>
                <input type="text" id="inputNombre" name="EVE_NOMBRE" class="form-control" placeholder="Escriba el nombre del evento" Required >
              </div>
               <div class="form-group">
                <label for="inputTitulo">Categoría</label>
                 <select class="form-control form-control-sm"name="CAT_CORREL">
                    <option value=''disabled selected>--Categorías--</option>
            <?php 
                 include("conexion.php");
                 $result = mysqli_query($conn, 'SELECT * FROM CATEGORIA;');
                 while($row=mysqli_fetch_assoc($result)) { 
                    echo "<option value='$row[CAT_CORREL]'>$row[CAT_NOMBRE]</option>"; 
                } 
				include("desconexion.php");
            ?> 
                </select>
                 
 
              </div>
              <div class="form-group">
                <label for="inputFecha">Fecha</label>
                <input type="date" id="inputFecha"name="EVE_FECHA" class="form-control" placeholder="Fecha" Required >
              </div>
     
              <div class="form-group">
                <label for="inputHora">Hora</label>
                <input type="time" id="inputFecha"name="EVE_HORA" class="form-control" placeholder="hora" Required>
              </div>
              <div class="form-group">
                <label for="inputDescripcion">Descripción</label></br>
                 <textarea name="EVE_DESCRIP" rows="5" cols="55" Required></textarea>
              </div>
              <div class="form-group">
                <label for="inputFecha">Imagen(Opcional)</label>
                <input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" >
              </div>
			  
			<!--  
              <div class="form-group">
                <label for="inputNombre">la funcion de la categoria no funciona escribir un numero aqui para que inserte x mientras</label>
                <input type="text" id="inputNombre" name="CAT_CORREL" class="form-control" placeholder="Escriba el nombre del evento"  >
              </div>   
			  -->
			  
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Registrar</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
include("guardarevento.php");
 if(isset($_POST['submit'])){
	 
    
	 
    $campos = array("EVE_CORREL"=>$_POST['NULL'],"CAT_CORREL"=>$_POST['CAT_CORREL'],
    "EVE_NOMBRE"=>$_POST['EVE_NOMBRE'],"EVE_FECHA"=>$_POST['EVE_FECHA']
    ,"EVE_HORA"=>$_POST['EVE_HORA'],"EVE_DESCRIP"=>$_POST['EVE_DESCRIP'],"IMAGEN"=>$_POST['IMAGEN']); 
 
    $a = new GuardarEvento("recreaubb"); 
    $a->insertar($campos);
 }
 
?>
<
  
