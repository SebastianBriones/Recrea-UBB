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

$nombre_archivo=($_FILES['archivo']['name']);
$tipo_archivo=($_FILES['archivo']['type']);
//$imageData=(file($_FILES['archivo']['tmp_name']));// necesita addslashes pero con esto no al sube
 $imageData = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
 
 
$consulta=" INSERT INTO `edificiotest` (`id`, `nombre`, `tipo`, `archivo`) VALUES 
(NULL, '$nombre_archivo', '$tipo_archivo', '$imageData')";
 
$resultado=mysqli_query($conexion_db,$consulta);

if(mysqli_affected_rows($conexion_db)>0){
        echo "Archivo subido satisfactoriamente";
       
}else{

    echo "error";
}
?>