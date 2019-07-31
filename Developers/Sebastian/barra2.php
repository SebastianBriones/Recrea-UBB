<!-- Contenido de la Pagina  -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <form action="muestrabusqueda.php" method="get" class="form_search">
                        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar por evento">
                        <input type="submit" value="Buscar" class="btn_search">
                    </form>
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
                                <a class="nav-link" href="http://146.83.198.35/~recreaubb/logout.php">Cerrar sesión</a>
                            </li>
                        </ul>
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link disabled" tabindex="-1" aria-disabled="true">Sesión: <?php echo $_SESSION["nombres"]?></a>
                            </li>
                        </ul>>
                    </div>
                </div>
            </nav>