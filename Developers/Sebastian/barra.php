   <div class="wrapper">
        <!-- Barra Lateral-->
        <nav id="sidebar">
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <img style="width:37px;height:36px;" src="https://intranet.ubiobio.cl/bootstrapsite/assets/images/escudo.png">
                    Recrea UBB
                </a>
            </div>
            <ul class="list-unstyled components">

                <li>
                    <a href="iniciorecreaubb.php#">Inicio</a>
                </li>

                <?php if($_SESSION["rol"] == 1 || $_SESSION["rol"] == 2): ?>
                <li>
                    <a href="crearevento.php">Nuevo evento</a>
                </li>

                <li>
                    <a href="miseventos.php">Mis eventos</a>
                </li>

                <li>
                    <a href="respuestas.php">Respuestas solicitudes</a>
                </li>

                <li>
                    <a href="participaciones.php">Mis participaciones</a>
                </li>
                <?php endif; ?>

                <?php if($_SESSION["rol"] == 3): ?>
                <li>
                    <a href="solicitudes.php">Solicitudes</a>
                </li>

                <li>
                    <a href="historialsolicita.php">Historial solicitudes</a>
                </li>

                <li>
                    <a href="historial.php">Historial eventos</a>
                </li>
                <?php endif; ?>
                
            </ul>
        </nav>
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


