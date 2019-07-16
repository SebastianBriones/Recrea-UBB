<!DOCTYPE html>
<html>
<head>
<title>Recrea Ubb</title>
<!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
<!--Navbar-->


<div class="container">
    <div class="row">
<!--Parte Carrusel -->
    
    <div class="col">
	<div class="col">
	 <img src="https://i.imgur.com/nG6yhdj.png" alt="Los Angeles" style="width:100%;">
     
	
	</div> 
	<div class="container">
  <div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i.imgur.com/AGi16SN.png" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="https://i.imgur.com/LmtdsYn.png" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="https://i.imgur.com/Dzzz9UO.png" alt="New York" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
	
	</div>
<!--Parte Carrusel -->
<!--Parte Login -->
    <div class="col"> 
  <div class="container">
    <div class="row">
  
 
           
  
  
      <div class="col">
    <div class="avatar"><center>
          <img src="https://www.coordinadora.com/wp-content/uploads/sidebar_usuario-corporativo.png" alt="Avatar">
         
        </div>
        <div class="card card-signin my-5">
    
          <div class="card-body">
         
            <h5 class="card-title text-center">Por favor ingrese su informaci&#243n</h5>
            <form class="form-signin">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="RUT" required autofocus>
                <label for="inputEmail">RUT</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Contrase&ntildea</label>
              </div>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Recordar contrase&ntildea</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Ingresar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  </div>
<!--Parte Login -->
  </div>
</div>

<!--Borrar -->
<p>Aqui pongan su enlace a su modulo, esto se borrara pero mientras ir trabajando</p>
<p><a href="CrearEvento/CrearEvento.php">Crear evento</a></p>



<!--Borrar -->







</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html> 
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 80%;
      height: 80%;
      margin-left: 70px;
  }
  .avatar img {
    margin-top: 80px;
      width: 20%;
      height: 20%;
  }
  </style>