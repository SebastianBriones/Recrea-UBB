<?php

 class GuardarEvento{
 
	private $CAT_CORREL;
 
 
  
    function __construct($bd){
	//	$this->con = new mysqli('localhost','recreaubb','recrea2019',$bd);
	$this->con = new mysqli('localhost','recreaubb','recrea2019','recreaubb');
	}
	
	

	
	
	  
	
    function insertar($form_data){
        $fields = array_keys($form_data);
       // $CAT_CORREL = $_POST['CAT_CORREL'];
	   $CAT_CORREL="12";
     echo $CAT_CORREL;
     //$consulta = "INSERT INTO `EVENTO` (`EVE_CORREL`, `CAT_CORREL`, `EVE_NOMBRE`, `EVE_FECHA`, `EVE_HORA`, `EVE_DESCRIP`, `EVE_NOTA`, `EVE_ESTADO`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
					
    $resultado_cons = mysqli_query($this->con,$consulta);
   if($resultado_cons == false){
			echo "<script>
		 
					alert($CAT_CORREL);
				  </script>";
		}else{
			echo "<script>
					alert('Registro Guardado');      
			      </script>"; 
		}
	}
 

 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
?>