<!DOCTYPE html>
<html>
<title>VerImagen</title>
<body>

<?php
 
require("../config.php");
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
				$contenido=$fila["IMAGEN"];
				 
				 echo "<h3>Nombre del evento</h3></br> $nombre </br></br>";
			 
				
				
			

  echo '<img src="data:image/png;base64,'.base64_encode( $contenido ).'"/>';


 }	  
        ?>	
				
 



</body>
</html> 



