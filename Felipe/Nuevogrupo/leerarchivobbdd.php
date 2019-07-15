<!DOCTYPE html>
<html>
<title>VerImagen</title>
<body>

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

$consulta="SELECT * FROM edificiotest WHERE 1";
$resultado = mysqli_query($conexion_db,$consulta);
 
 
 
 
 while($fila=mysqli_fetch_array($resultado)){
                $id=$fila["id"];
				$nombre=$fila["nombre"];
				$tipo=$fila["tipo"];
				$contenido=$fila["archivo"];
				echo $id;
				echo "<br>";
				echo $nombre;
				echo "<br>";
				echo $tipo;
				echo "<br>";
				
				
				 
              echo '<img src="data:image/png;base64,'.base64_encode( $contenido ).'"/>';
 }
 
?>
<div>
 


 </div>




</body>
</html> 



