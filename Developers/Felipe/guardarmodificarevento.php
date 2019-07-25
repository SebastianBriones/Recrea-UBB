<?php

 class GuardarModificarEvento{
 
    private $EVE_CORREL;
	private $CAT_CORREL;
	private $EVE_NOMBRE;
	private $EVE_FECHA;
	private $EVE_HORA;
	private $EVE_DESCRIP;
 
    function __construct($bd){
	    $this->con = new mysqli('localhost','recreaubb','recrea2019',$bd); 
	}
	
    function modificar($form_data){
        $fields = array_keys($form_data);
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
		
		$EVE_CORREL = $_POST['EVE_CORREL'];
        $CAT_CORREL = $_POST['CAT_CORREL'];
		$EVE_NOMBRE = htmlentities($_POST['EVE_NOMBRE']);
		$EVE_FECHA = $_POST['EVE_FECHA'];
		$EVE_HORA = $_POST['EVE_HORA'];
		$EVE_DESCRIP =htmlentities($_POST['EVE_DESCRIP']);
 
 if($imageData !=NULL){
     $consulta = "UPDATE `EVENTO` SET `CAT_CORREL`='$CAT_CORREL',`EVE_NOMBRE`='$EVE_NOMBRE'
	 ,`EVE_FECHA`='$EVE_FECHA',`EVE_HORA`='$EVE_HORA',
		`EVE_DESCRIP`='$EVE_DESCRIP' ,`IMAGEN`='$imageData'
		WHERE `EVE_CORREL`='$EVE_CORREL'"; 
  }else{
	  $consulta = "UPDATE `EVENTO` SET `CAT_CORREL`='$CAT_CORREL',
		`EVE_NOMBRE`='$EVE_NOMBRE',`EVE_FECHA`='$EVE_FECHA',`EVE_HORA`='$EVE_HORA',
		`EVE_DESCRIP`='$EVE_DESCRIP'
		WHERE `EVE_CORREL`='$EVE_CORREL'"; 
	  }
 
 /*
     if($imageData !=NULL){
	 $consulta = "UPDATE `EVENTO` SET `CAT_CORREL`='$CAT_CORREL',
		`EVE_NOMBRE`='$EVE_NOMBRE',`EVE_FECHA`='$EVE_FECHA',`EVE_HORA`='$EVE_HORA',
		`EVE_DESCRIP`='$EVE_DESCRIP',`IMAGEN`='$imageData' 
		WHERE `EVE_CORREL`='$EVE_CORREL'"; 
     }else{
		$consulta = "UPDATE `EVENTO` SET `CAT_CORREL`='$CAT_CORREL',
		`EVE_NOMBRE`='$EVE_NOMBRE',`EVE_FECHA`='$EVE_FECHA',`EVE_HORA`='$EVE_HORA',
		`EVE_DESCRIP`='$EVE_DESCRIP'
		WHERE `EVE_CORREL`='$EVE_CORREL'"; 
	 }
  */       

		
		

		
        $resultado_cons = mysqli_query($this->con,$consulta);
		
        if($resultado_cons == false){
			echo "<script> 
					 alert('Error en los datos');
				  </script>";
		}else{
			echo "<script>				 
            alert('Registro Guardado');
			//window.location.replace('miseventos.php');
			 window.location.replace('modificarevento.php');
			      </script>"; 
				  
		}
	  
 
	}
 
 
 
 
 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
?>