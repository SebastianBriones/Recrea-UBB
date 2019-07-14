<?php

 class GuardarEvento{
 
	private $CAT_CORREL;
	private $EVE_NOMBRE;
	private $EVE_FECHA;
	private $EVE_HORA;
	private $EVE_DESCRIP;
 
    function __construct($bd){
	    $this->con = new mysqli('localhost','recreaubb','recrea2019',$bd);
	}
	
    function insertar($form_data){
        $fields = array_keys($form_data);
        $CAT_CORREL = $_POST['CAT_CORREL'];
		$EVE_NOMBRE = $_POST['EVE_NOMBRE'];
		$EVE_FECHA = $_POST['EVE_FECHA'];
		$EVE_HORA = $_POST['EVE_HORA'];
		$EVE_DESCRIP = $_POST['EVE_DESCRIP'];
        $consulta = "INSERT INTO `EVENTO` (`EVE_CORREL`,`CAT_CORREL`,`EVE_NOMBRE`,
		`EVE_FECHA`,`EVE_HORA`,`EVE_DESCRIP`,`EVE_NOTA`,`EVE_ESTADO`) VALUES 
		(1,'$CAT_CORREL','$EVE_NOMBRE','$EVE_FECHA',
		'$EVE_HORA','$EVE_DESCRIP',NULL,NULL);";				
        $resultado_cons = mysqli_query($this->con,$consulta);
        if($resultado_cons == false){
			echo "<script>
					alert($EVE_NOMBRE);
					//alert('Error en los datos');
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