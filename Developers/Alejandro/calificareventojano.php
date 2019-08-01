<?php

	session_start();

	include("conexion.php");

	$rut = $_SESSION["rut"];

	//$eve_correl = $_POST['EVE_CORREL'];
	//$eve_nota = $_POST['EVE_NOTA'];

	//echo $eve_nota;
	//echo $eve_correl;
	//echo $rut;


 class GuardarModificarEvento{
  
    function __construct($bd){
	    $this->con = new mysqli('localhost','recreaubb','recrea2019',$bd); 
	}
	
    function modificar($form_data){
        
		
		$EVE_CORREL = $_POST['EVE_CORREL'];
        $EVE_NOTA = $_POST['EVE_NOTA'];
        $RUT = $_SESSION["rut"];
 

	$suma = 0; 
	$contador = 0;

	$consulta = "UPDATE `ASISTE` SET `ASI_NOTA`='$EVE_NOTA' WHERE `EVE_CORREL` = '$EVE_CORREL' AND `USU_RUT` = '$RUT' AND `ASI_ASISTENCIA` = 1"; 

 	$consultaPromedio = "SELECT ASI_NOTA FROM `ASISTE` WHERE `EVE_CORREL` = '$EVE_CORREL'"; 

 	while ($row = mysqli_fetch_array($consultaPromedio)) {
 		$row['NOTA'];
 		$suma = $row['NOTA'] + $suma;
 		$contador = $contador + 1;
 	}
	
	$promedio = $suma / $contador;
	echo $promedio;
 		
	//intval ( mixed $promedio [, int $base = 10 ] ) : int;

 	$agregarPromedio = "UPDATE `EVENTO` SET `EVE_NOTA`='$promedio' WHERE `EVE_CORREL`='$EVE_CORREL'";
		
        $resultado_cons = mysqli_query($this->con,$consulta);
		
        if($resultado_cons == false){
			echo "<script> 
					 alert('$agregarPromedio');
				  </script>";
		}else{
			echo "<script>				 
            alert('Registro Guardado');
			window.close();
			      </script>"; 
				  
		}
	  
 
	}
 
 
 
 
 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
?>