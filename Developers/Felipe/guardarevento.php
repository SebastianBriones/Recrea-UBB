<?php

 class GuardarEvento{
 
	private $CAT_CORREL;
	private $EVE_NOMBRE;
	private $EVE_FECHA;
	private $EVE_HORA;
	private $EVE_DESCRIP;
	private $RUT;
 
    function __construct($bd){
	    $this->con = new mysqli('localhost','recreaubb','recrea2019',$bd); 
	}
	
    function insertar($form_data){
        $fields = array_keys($form_data);
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
		
        $CAT_CORREL = $_POST['CAT_CORREL'];
		$EVE_NOMBRE = htmlentities($_POST['EVE_NOMBRE']);
		$EVE_FECHA = $_POST['EVE_FECHA'];
		$EVE_HORA = $_POST['EVE_HORA'];
		$EVE_DESCRIP =htmlentities($_POST['EVE_DESCRIP']);

		$RUT = $_POST['RUT'];
	 
        $consulta = "INSERT INTO `EVENTO` (`EVE_CORREL`,`CAT_CORREL`,`EST_CORREL`,`EVE_NOMBRE`,
		`EVE_FECHA`,`EVE_HORA`,`EVE_DESCRIP`,`EVE_NOTA`,`IMAGEN`) VALUES 
		(NULL,'$CAT_CORREL',NULL,'$EVE_NOMBRE','$EVE_FECHA',
		'$EVE_HORA','$EVE_DESCRIP',NULL,'$imageData');";
		
		
 

         

		
        $resultado_cons = mysqli_query($this->con,$consulta);
	    $ultimo_id  = mysqli_insert_id($this->con);   
        if($resultado_cons == false){
			echo "<script> 
					 alert('No se ha creado el evento');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado el evento');      
			      </script>"; 
		}
		
		$consulta2 = "INSERT INTO `ORGANIZA` (`USU_RUT`, `EVE_CORREL`) VALUES ('$RUT', '$ultimo_id');";
	    $resultado_cons2 = mysqli_query($this->con,$consulta2);
		$consulta3 = "INSERT INTO `REALIZA` (`EVE_CORREL`, `ESP_NOMBRE`) VALUES ('$ultimo_id', '$ESP_CORREL');";
	    //$resultado_cons3 = mysqli_query($this->con,$consulta3);
		
	}
 
 
 
 
 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
?>