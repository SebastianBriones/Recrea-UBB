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
				echo "<br>";
				echo $id;
				echo "<br>";
				echo $nombre;
				echo "<br>";
				echo $tipo;
				echo "<br>";
				
				
				
			if($tipo == 'image/jpeg' || $tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/gif'){
                echo "<br>";
                echo "Mostrando imagen: <br>" . "<img src='data:$tipo; base64," . base64_encode($contenido) . "'>";
                
            }else if ($tipo == 'text/plain' || $tipo == 'application/pdf'){
                echo "<br>Mostrando texto o pdf.<br>";
        ?> <!-- Cerramos temporalmente php-->
        
            <object data="data:<?php echo $tipo ?>;base64,<?php echo base64_encode($contenido) ?>" type="<?php echo $tipo ?>" style="height:600px;width:60%"></object>
        
       <?php // volvemos a abrir php para cerrar el if
           }else{ 
		   echo"Formato no reconocido";
		   } // end if elif else 
          

// echo '<img src="data:image/png;base64,'.base64_encode( $contenido ).'"/>';


 }	  
        ?>	
				
 



</body>
</html> 



