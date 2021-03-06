<?php
    // require_once ("../../controller/validaciones/autorizacion.php");
    // setcookie('usuario', $var_session, time() + 900);
    session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Rutinas electricas</title>
    <link rel="shortcut icon" href="../iconos/electrico.ico" type="image/x-icon">
    <script>
      window.console = window.console || function(t) {};
      
	</script>
	<script>
	  if (document.location.search.match(/type=embed/gi)) {
	    window.parent.postMessage("resize", "*");
      }
    </script>
    
    <style>
        .principal {
            /*background: #3a7bd5;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #3a7bd5, #00d2ff);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #3a7bd5, #00d2ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Menu Principal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="#"><?php echo $_SESSION['usuario']?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#acceso" href="#">Horario Tecnico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#acceso" href="#">Reportes Horario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../models/validaciones/cerrar_sesion.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://rickymelida.github.io/" title="Desarrollador">Acerca De</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container-fluid border border-dark principal" style="height: 90vh;">
        <div class="row">
            <div class="col-lg-12">
                <div id="slider" class=" w-100">
					<div class="carousel slide" id="carousel" data-pause="false">
						<div class="carousel-inner">
							<div class="carousel-item active">                
                                <img src="../iconos/anotar.png" onclick="agregar()" class="iconos-principal" >
								<div class="carousel-caption">
								    <h5 class="text-warning">Agregar Tareas</h5>
								</div>
							</div>
							<div class="carousel-item">
								<div class="carousel-caption">
								    <h5 class="text-warning ">Ver Pendientes</h5>
								</div>
                                <img src="../iconos/tareas.png" onclick="pendientes()" class="iconos-principal">
							</div>
						</div>
						<a class="carousel-control-prev" href="#" role="button"><span class="carousel-control-prev-icon"></span></a>
						<a class="carousel-control-next" href="#" role="button"><span class="carousel-control-next-icon"></span></a>
					</div>
				</div>
            </div>
            
        </div>
        <div class="row footer">
            <div class="col-md-12 col-lg-12">
                <footer class="fixed-bottom bg-dark" > 
                    <p class="text-light m-2">Eléctrica - 2020 &copy; </p>
                </footer>
            </div>
        </div>
    </div>

    


    <!--Modal para ingresar como administrador-->
    <div class="modal fade" id="acceso">
        <div class="modal-dialog bg-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Iniciar sesion de administrador</h5>
                </div>
                <div class="modal-body">
                    <form action="./reportes.php" method="post">
                        <div class="form-group">
                            <label for="usuario">usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" value="Acceder">
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <!------------------------->


    <script src="../js/design.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="../js/jquery.min.js"></script>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js'></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <script src="../js/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <script src="../js/bootstrap.min.js"></script>

    <script id="rendered-js">
            ;(function ($, window, document) {
                'use strict';
                var $slider = $('#carousel'),hammer = new Hammer($slider.get(0));
                $slider.find('img').each((index, elem) => {
                    $(elem).prop('draggable', false);
                });
                $slider.carousel();
                $slider.find(".carousel-control-prev").click(e => {
                    e.preventDefault();
                    $slider.carousel("prev");
                });
                $slider.find(".carousel-control-next").click(e => {
                    e.preventDefault();
                    $slider.carousel("next");
                });
                hammer.on("panleft panright", e => {
                    e.preventDefault();
                    if (e.type == 'panleft') $slider.carousel("next");
                    if (e.type == 'panright') $slider.carousel("prev");
                });

                $slider.find('.carousel-indicators li').click(e => {
                    $slider.carousel($(e.target).data('slide-to'));
                });
            })(jQuery, window, document);
            //# sourceURL=pen.js
    </script>
</body>
</html>

