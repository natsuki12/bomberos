<?php
	require("config/connect.php");
	include("config/login.php");
	session_start();
	if(isset($_SESSION["Nivel"])){
		if($_SESSION["Nivel"]!=3)
			header("location:home.php");
		else
			header("location:Adm_Bomberos/home.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Unidad de Prevención de Siniestros del Cuerpo de Bomberos | GEBNE</title>
	<meta charset="utf-8">
	<meta name="description" content="Unidad de Prevención de Siniestros del Cuerpo de Bomberos - Somos Nueva Esparta">
	<meta name="keywords" content="Unidad de Prevención de Siniestros del Cuerpo de Bomberos de la Gobernación del Estado Bolivariano de Nueva Esparta - En la Gestión del Gobernador Alfredo Diaz">
	<meta name="author" content="Dirección del PPP las Telecomunicaciones y Sistemas Informáticos - Programa Practicantes">
	<!-- CSS de Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- CSS de Iconos -->
	<link href="css/fontawesome-free/css/all.min.css" rel="stylesheet">
  	<link href="css/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  	<!-- CSS del Index -->
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<!-- Jquery -->
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<!-- JS de Bootstrap -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/boot_slider.js"></script>
	<!-- Jquery Validacion de datos -->
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<!-- Jquery Mensajes de Alerta -->
 	<script type="text/javascript" src="js/sweetalert.js"></script>

 	<!-- CSS interno de la pagina -->
 	<style type="text/css">
 		
 		/*MENSAJE DE ERROR EN EL FORMULARIO*/
		label.error{	/*MANIPULO EL CSS DEL LABEL QUE SE ESCRIBE CUANDO HAY UN ERROR*/
			color: red;
			margin-left: 2%;
			display: block;
			font-style: italic;
		}

		input.error, select.error{	/*MODIFICA LOS INPUT QUE HAYAN TENEDIO ALGUN ERROR*/
			border: 1px solid red;
			background: rgba(230,200,180,0.5);
		}

		@media (min-width: 1024px){
		    .fuente {
		        font-size: 1vw;
		        line-height: 1.5em;
		    }
		}

		@media (max-width: 1024px){
		    .fuente {
		        font-size: 1.5vw;
		        line-height: 1.5em;
		    }
		}

		@media (max-width: 640px){
		    .fuente {
		        font-size: 2vw;
		        line-height: 1.5em;
		    }
		}

		@media (max-width: 320px){
		    .fuente {
		        font-size: 4vw;
		        line-height: 1.5em;
		    }
		}

 	</style>

 	<!-- SCRIPT INTERNO DE LA PAGINA -->
 	<script>
	    $(document).ready(function() {

	      $("#practicantes_button").click(function(event) {
	      	$("#practicantes").modal("show");
	      });

	      $("#login_button").click(function(event) {
	      	$("#login").modal("show");
	      });

	      $("#solicitud_button").click(function(event) {
	      	$("#solicitud").modal("show");
	      	var valor = $("#referencia").val();
	      	$("#s_numero").text(valor);
	      });

	    });
  	</script>
</head>
<body>

<!-- TOP -->
  <nav class="navbar navbar-light bg-light static-top px-0 py-1" style="border-bottom: 3px solid rgba(0,0,0,0.5); background-color: ">
    <div class="container-fluid row justify-content-center">
      <div class="col-lg-7 col-md-6 col-12 text-center pl-lg-5">
      	<h5 class="text-dark text-center text-lg-left m-auto" style=" font-family: Rockwell, Arial, 'Times New Roman';">Unidad de Prevención de Siniestros del Estado Nueva Esparta</h5>
      </div>
      <div class="col-lg-1 col-md-1 col-12 text-center text-lg-left mb-md-0 mb-2">
      	<img src="Imagenes/escudo-index.png" class="img-fluid" height="50" width="50">
      </div>
      <div class="col-lg-4 col-md-5 col-12 text-center">
      	<button class="btn btn-secondary" id="login_button">Iniciar Sesión</button>
      	<button class="btn btn-secondary" id="practicantes_button">Información</button>
      </div>
    </div>
  </nav>
<!-- FIN DEL TOPE -->

<!-- CARROUSEL -->
  <header class="masthead text-white text-center" style="background-image: url('Imagenes/Banner.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Inicia tu Proceso de Solicitud para el Certificado de Conformidad Definitivo<br><h5>Si ya posees una solicitud activa puedes revisarla con el código de referencia.</h5></h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input id="referencia" type="number" class="form-control form-control-lg" placeholder="Ingresa el Código de Solicitud de Referencia...">
              </div>
              <div class="col-12 col-md-3">
                <button type="button" id="solicitud_button" class="btn btn-block btn-lg btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>
<!-- FIN CARROUSEL -->

<!-- INFORMACION CON ICONOS -->
  <section class="features-icons text-center p-5" style="border-bottom: 0px solid rgba(0,0,0,0.5); border-top: 0px solid rgba(0,0,0,0.5); background-color: #38a7dc">
    <div class="container">
      <div class="row text-white">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-exclamation m-auto text-white"></i>
            </div>
            <h3 style=" font-family: Verdana, Arial, 'Times New Roman';">Importancia</h3>
            <p class="lead mb-0">El Documento de Conformidad es de caracter obligatorio para poder hacer uso del inmueble cumpliendo con las normas de seguridad ante siniestros.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-calendar m-auto text-white"></i>
            </div>
            <h3 style=" font-family: Verdana, Arial, 'Times New Roman';">Pago Express</h3>
            <p class="lead mb-0">Solicita la inspección por pago express para que el Cuerpo de Bomberos visite el inmueble antes del tiempo establecido.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <img src="Imagenes/inspeccion.icon">
            </div>
            <h3 style=" font-family: Verdana, Arial, 'Times New Roman';">Inspecciones</h3>
            <p class="lead mb-0">El inmueble en cada inspección debe cumplir con los puntos establecidos según las normas de seguridad para obtener el certificado.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- INFO CON INCONOS -->

<!-- FRANJA LUEGO DEL CARROUSEL -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('Imagenes/pesca-info2.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h4 class="text-center" style=" font-family: Verdana, Arial, 'Times New Roman';">Paso 1: Solicitud del Certificado de Conformidad e Inspección</h4>
          <p class="lead mb-0 text-justify">Acercate al XXXXXX mas cercano para la solicitud del Certificado de Conformidad, para ello debes llevar todos los datos correspondientes del inmueble como tambien la información precisa sobre la ubicación del mismo para la inspección. Luego de realizar la solicitud debes cancelar el monto proporcionado por el operador pa finalizar el proceso y confirmar la inspección para que sea realizada por el Cuerpo de Bomberos.</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 my-auto showcase-text">
          <h4 class="text-center" style=" font-family: Verdana, Arial, 'Times New Roman';">Paso 2: Inspección por el Cuerpo de Bomberos</h4>
          <p class="lead mb-0 text-justify">El Cuerpo de Bomberos se acercara a realizar la inspección del inmueble dentro del plazo establecido por cada solicitud, para la inspección el inmueble debe cumplir cada uno de los puntos establecidos por cada una de las normas de seguridad propuestas por el Reglamento sobre Prevención de Incendios, el cual de cumplir con cada una de estas pasara la inspección y podra dirigirse al paso número 3.</p>
        </div>
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('Imagenes/pesca-info2.jpg');"></div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('Imagenes/pesca-info2.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h4 class="text-center" style=" font-family: Verdana, Arial, 'Times New Roman';">Paso 3: Entrega del Certificado de Conformidad</h4>
          <p class="lead mb-0 text-justify">Al cumplir con la inspección, la persona solicitante de la misma debe acercarse de nuevo a la Institución Correspondiente, dentro de ella debera dirigirse al operador para finalizar el proceso pagando una ultima cuota correspondiente a la entrega del Certficiado de Conformidad Definitivo, donde el mismo tendra vigencía durante un año a partir de la entrega del mismo.<br>Para revisar que haya cumplido con los puntos de inspección puede dirigirse a la parte inicial y utilizar el código de referencia de la solicitud.</p>
        </div>
      </div>
    </div>
  </section>
<!-- FIN FRANJA LUEGO DEL CARROUSEL -->

<!-- FOOTER -->
  <footer class="footer p-0" style="border-top: 3px solid rgba(0,0,0,0.5); border-top: 3px solid rgba(0,0,0,0.5); background-color: #1b1464">
    <div class="container-fluid p-3">
      <div class="col-12 p-0">
        <div class="col-lg-5 h-100 text-justify text-white my-auto fuente">
          <span class="">
			<span class="font-weight-bold">Sitio Web Oficial</span><br>
			Copyright ® 2019-20<?php echo date('y')?> / Gobernación del estado Bolivariano de Nueva Esparta - Todos los derechos reservados.<br>
			<span class="">Desarrollado por la Dirección del Poder Popular para las Telecomunicaciones y Sistemas Informáticos - <a class="font-weight-bold practicantes">Programa Prácticantes.</a></span>
		  </span>
        </div>
        <!--<img src="Imagenes/footerpesca.png" class="img-fluid p-0 col-12 d-lg-block d-none" style="margin-top: -50px"> -->
      </div>
    </div>
  </footer>

  <div class="container-fluid p-0 bg-light d-lg-none">
  	<div class="col-12 p-0">
    	<img src="Imagenes/footerpesca.png" class="img-fluid">  
    </div>
  </div>
<!-- FIN FOOTER -->
</body>

</html>

<!-- MODAL PARA CUANDO QUIERA VER AL DETALLE LA INFORMACION DE PRACTICANTES -->
<div class="modal fade" id="practicantes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-lg modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="height: auto;">
				<div class="modal-header">
					<h5 class="modal-title">Desarrolladores</h5>
				<button type="button" class="close r-cerrar" data-dismiss="modal" aria-label="Close">
	  			<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				<div class="row justify-content-center text-center">  
			      <div class="card col-lg-5 col-sm-8 mx-3 mt-5 mb-mg-0 mb-4" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
					  <img class="card-img-top mx-auto" src="Imagenes/testimonials-1.jpg" alt="Card image cap" style="width: 100px; margin-top: -50px; border-radius: 50%; border: 1.5px solid rgba(0,0,0,0.2)">
					  <div class="card-body">
					  	<h5>Félix Marquez</h5>
					  	<h6>Director de Telecomunicaciones</h6>
					    <ul class="card-text font-weight-light text-left p-0" style="list-style: none">
					    	<li><i class="fa fa-caret-right "></i> Correo: felixmarquez@gmail.com</li>
					    	<li><i class="fa fa-caret-right "></i> Linkedin: @felixmarquez</li>
					    	<li><i class="fa fa-caret-right "></i> Teléfono: 0414-7941206</li>
					    </ul>
					  </div>
				  </div>
			      <div class="card col-lg-5 col-sm-8 mx-3 mt-5 mb-mg-0 mb-4" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
					  <img class="card-img-top mx-auto" src="Imagenes/testimonials-1.jpg" alt="Card image cap" style="width: 100px; margin-top: -50px; border-radius: 50%; border: 1.5px solid rgba(0,0,0,0.2)">
					  <div class="card-body">
					  	<h5>Andres Ramirez</h5>
					  	<h6>Programador en Jefe</h6>
					    <ul class="card-text font-weight-light text-left p-0" style="list-style: none">
					    	<li><i class="fa fa-caret-right "></i> Correo: andresramirez2025@gmail.com</li>
					    	<li><i class="fa fa-caret-right "></i> Linkedin: www.linkedin.com/in/andres28ramirez</li>
					    	<li><i class="fa fa-caret-right "></i> Teléfono: 0412-7942183</li>
					    </ul>
					  </div>
				  </div>
				  <div class="card col-lg-5 col-sm-8 mx-3 mt-5 mb-mg-0 mb-4" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
					  <img class="card-img-top mx-auto" src="Imagenes/testimonials-1.jpg" alt="Card image cap" style="width: 100px; margin-top: -50px; border-radius: 50%; border: 1.5px solid rgba(0,0,0,0.2)">
					  <div class="card-body">
					  	<h5>Cesar Requena</h5>
					  	<h6>Programador</h6>
					    <ul class="card-text font-weight-light text-left p-0" style="list-style: none">
					    	<li><i class="fa fa-caret-right "></i> Correo: cesar12piso09@gmail.com</li>
					    	<li><i class="fa fa-caret-right "></i> Linkedin: @cesarequena</li>
					    	<li><i class="fa fa-caret-right "></i> Teléfono: 0416-0302290</li>
					    </ul>
					  </div>
				  </div>
				  <div class="card col-lg-5 col-sm-8 mx-3 mt-5 mb-mg-0 mb-4" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
					  <img class="card-img-top mx-auto" src="Imagenes/testimonials-1.jpg" alt="Card image cap" style="width: 100px; margin-top: -50px; border-radius: 50%; border: 1.5px solid rgba(0,0,0,0.2)">
					  <div class="card-body">
					  	<h5>Miguel Gil</h5>
					  	<h6>Programador</h6>
					    <ul class="card-text font-weight-light text-left p-0" style="list-style: none">
					    	<li><i class="fa fa-caret-right "></i> Correo: miguel.gil.54@gmail.com</li>
					    	<li><i class="fa fa-caret-right "></i> Linkedin: @miguelgil</li>
					    	<li><i class="fa fa-caret-right "></i> Teléfono: 0412-0810308</li>
					    </ul>
					  </div>
				  </div>
				  <div class="card col-lg-5 col-sm-8 mx-3 mt-5 mb-mg-0 mb-4" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
					  <img class="card-img-top mx-auto" src="Imagenes/testimonials-1.jpg" alt="Card image cap" style="width: 100px; margin-top: -50px; border-radius: 50%; border: 1.5px solid rgba(0,0,0,0.2)">
					  <div class="card-body">
					  	<h5>Raimond Rivas</h5>
					  	<h6>Diseñador</h6>
					    <ul class="card-text font-weight-light text-left p-0" style="list-style: none">
					    	<li><i class="fa fa-caret-right "></i> Correo: raimondrivas19@gmail.com</li>
					    	<li><i class="fa fa-caret-right "></i> Linkedin: @raimonrivas</li>
					    	<li><i class="fa fa-caret-right "></i> Teléfono: 0424-8195273</li>
					    </ul>
					  </div>
				  </div>
			    </div>
				</div>
		</div>
	</div>
</div>
<!-- FIN MODAL PARA CUANDO QUIERA VER AL DETALLE LA INFORMACION DE PRACTICANTES -->

<!-- MODAL PARA CUANDO QUIERA VER AL DETALLE LA INFORMACION DE PRACTICANTES -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="height: auto;">
			<div class="modal-body row px-0 pt-0">
				<div class="col-12">
					<div class="container-fluid text-center">
						<button type="button" class="close r-cerrar py-2" data-dismiss="modal" aria-label="Close">
			  				<span aria-hidden="true">&times;</span>
						</button>
					    <img src="Imagenes/escudo-index.png" class="img-fluid pt-2" height="100" width="100">
						<h5 class="text-muted text-center py-1 container-fluid p-0" >
					        <strong style=" font-family: Verdana, Arial, 'Times New Roman';">Acesso Institucional</strong>
					    </h5>
				    </div>
					<div class="d-flex justify-content-center h-100 pt-1">
						<div class="user_card">
							<div class="d-flex justify-content-center form_container">
								<form method="post" action="index.php">
									<div class="input-group mb-3">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
										<input type="text" name="user" class="form-control input_user" value="" placeholder="Usuario">
									</div>
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-key"></i></span>
										</div>
										<input type="password" name="password" class="form-control input_pass" value="" placeholder="Contraseña">
									</div>
									<div class="d-flex justify-content-center mt-3 login_container">
										<button type="submit" name="login" class="btn btn-success login_btn w-100">Enviar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- FIN MODAL PARA CUANDO QUIERA VER AL DETALLE LA INFORMACION DE PRACTICANTES -->

<!-- MODAL PARA CUANDO QUIERA VER AL DETALLE LA INFORMACION DE LA SOLICITUD -->
<div class="modal fade" id="solicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content" style="height: auto;">
	  <div class="modal-header">
		<h5 class="modal-title m-autor">Solicitud #<span id="s_numero"></span></h5>
		<button type="button" class="close r-cerrar" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body row pt-2">
		<div class="col-12">
			<h6 class="text-center mb-4">Estado de la Solicitud - <span class="text-success">Aceptada</span></h6>
			<label>- Realizada el día <b>28-06-1996</b> a las <b>10:20 AM</b></label>
			<label>- Solicitada por <b>Andres Ramirez</b> de Cédula <b>23868394</b></label>
			<label>- Inmueble a nombre de <b>Polar</b></label>
			<label>- Uso o Finalidad del Inmueble: <b>Surtir Productos Alimenticios</b></label>
			<div class="col-12 row justify-content-center my-2 mx-auto">
				<label class="text-muted">Cada "-" simboliza una inspección no efectuada</label>
				<div class="subnavbar mx-0">
				  <div class="subnavbar-inner" style="border: 1px solid #d6d6d6">
				    <div class="container p-0">
				      <ul class="mainnav">
				        <li class="nav-item" id="nav-inicio" style="border-left: 0px">
				        	<a href=""><i class="icon-check text-success"></i><span>Inspección 1</span></a> 
				        </li>
				        <li class="nav-item" id="nav-inicio">
				        	<a href=""><i class="icon-close text-danger"></i><span>Inspección 2</span></a> 
				        </li>
				        <li class="nav-item" id="nav-inicio">
				        	<a href=""><i class="icon-minus"></i><span>Inspección 3</span></a> 
				        </li>
				        <li class="nav-item" id="nav-inicio">
				        	<a href=""><i class="icon-minus"></i><span>Inspección 4</span></a> 
				        </li>
				      </ul>
				    </div>
				  </div> 
				</div>
			</div>
			<label class="">- Documento de Certificado Provicional: <a href="">Descargar</a></label>
			<!-- SI ESTA VENCIDO O RECHAZADA -->
			<label class="text-danger">- Su documento o solicitud se encuentra vencida o denegada, debe realizar una nueva solicitud para obtener el certificado de seguridad del Inmueble.</label>
		</div>
	  </div>
	</div>
  </div>
</div>
<!-- FIN MODAL PARA CUANDO QUIERA VER AL DETALLE LA SOLICITUD -->

<?php if($error==1): ?> <!-- MENSAJE DE FALLO ERROR SI NO INGRESO BIEN EL LOGIN-->
	<script type="text/javascript">
		swal({
        	  title: 'Login Fallido',
        	  text: 'Porfavor Intente de Nuevo el Login',
        	  icon: 'error',
        	  closeOnClickOutside: false,
        	  button: "Cerrar",
        	});
		$(".swal-button--confirm").addClass('bg-secondary');
	</script>
<?php endif; ?>