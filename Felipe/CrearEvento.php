<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RecreaUbb</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- Script de la Imagen -->
    <link rel="stylesheet" href="../css/chosen.css">
	<link rel="stylesheet" href="../css/ImageSelect.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/chosen.jquery.js"></script>
    <script src="../js/ImageSelect.jquery.js"></script>
</head>

<body>

   <div class="wrapper">
        <!-- Barra Lateral-->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Mi Cuenta</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Encabezado</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- Contenido de la Pagina  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Mostrar/Ocultar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
  
            <form class="formulario" action="" method="post" id="usrform">
              <h2>Nuevo Evento</h2>
              <div class="form-group">
                <label for="inputNombre">Nombre</label>
                <input type="text" id="inputNombre" name="EVE_NOMBRE" class="form-control" placeholder="Escriba el nombre del evento"  >
              </div>
			   <div class="form-group">
                <label for="inputTitulo">Cat correl</label>
                <input type="text" id="inputTitulo" name="CAT_CORREL" class="form-control" placeholder=""  >
              </div>
              <div class="form-group">
                <label for="inputFecha">Fecha</label>
                <input type="date" id="inputFecha"name="EVE_FECHA" class="form-control" placeholder="Fecha" >
              </div>
              <div class="form-group">
                    <label for="inputFecha">Ubicación</label>
                    <select  class="my-select">
                    <option data-img-src="https://educacionprioritaria.files.wordpress.com/2011/06/inicioface.png?w=640&h=393">Edificio Face</option>
                        <option data-img-src="https://educacionprioritaria.files.wordpress.com/2011/04/4408204588_e98970504a_z.jpg?w=300&h=200">Edificio Gantes</option>
                    </select>
                </div>
                <script>
                    $(".my-select").chosen({width:"30%"});
                </script>
              <div class="form-group">
                <label for="inputHora">Hora</label>
                <input type="time" id="inputFecha"name="EVE_HORA" class="form-control" placeholder="Fecha" >
              </div>
              <div class="form-group">
                <label for="inputDescripcion">Descripción</label></br>
                 <textarea name="EVE_DESCRIP" rows="5" cols="55" Required></textarea>
			  </div>
              <div class="form-group">
                <label for="inputFecha">Imagen(Opcional)</label>
                <input type="file" id="inputImagen" name="imagen" size="20" class="form-control" placeholder="Imagen" >
              </div>
              
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Registrar</button>
            </form>
 
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>

<?php
include("GuardarEvento.php");
 if(isset($_POST['submit'])){
    $campos = array("EVE_CORREL"=>$_POST['NULL'],"CAT_CORREL"=>$_POST['CAT_CORREL'],
	"EVE_NOMBRE"=>$_POST['EVE_NOMBRE'],"EVE_FECHA"=>$_POST['EVE_FECHA']
	,"EVE_HORA"=>$_POST['EVE_HORA'],"EVE_DESCRIP"=>$_POST['EVE_DESCRIP']); 
 
    $a = new GuardarEvento("recreaubb"); 
    $a->insertar($campos);
 }
 
?>



