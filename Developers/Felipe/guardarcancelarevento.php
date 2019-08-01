<?php

 class GuardarModificarEvento{
 
    private $EVE_CORREL;
 
 
 
    function __construct($bd){
	    $this->con = new mysqli('localhost','recreaubb','recrea2019',$bd); 
	}
	
    function modificar($form_data){
        $fields = array_keys($form_data);
	 
		$EVE_CORREL = $_POST['EVE_CORREL'];
 
		 
 
 
     $consulta = "UPDATE `EVENTO` SET `EST_CORREL` = '6' WHERE `EVENTO`.`EVE_CORREL`='$EVE_CORREL'"; 
  
 

		
        $resultado_cons = mysqli_query($this->con,$consulta);
		
        if($resultado_cons == false){
			echo "<script> 
					 alert('Error en los datos');
				  </script>";
		}else{
			echo "<script>				 
            alert('Se ha cancelado el evento');
	 window.location.replace('miseventos.php');
 
			      </script>"; 
				  
		}
	  
 
	}
 
 
 
 
 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
?>