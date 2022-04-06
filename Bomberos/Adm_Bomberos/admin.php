<?php 
	ob_start();
	session_start();
	if(!isset($_SESSION["Nivel"])){
		header("location:/Bomberos");
	}
	$u_nivel = $_SESSION["Nivel"];
	$u_nombre = $_SESSION["Nombre"]; //ESTO TIENE LA CEDULA DEL INSPECTOR
	//AQUI FORZADO LE VOY A METER LA CEDULA DEL UNICO INSPECTOR QUE TENGO
	$u_nombre = 9169478;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Unidad de Prevención de Siniestros del Cuerpo de Bomberos | GEBNE</title>
	<meta charset="utf-8">
	<meta name="description" content="Unidad de Prevención de Siniestros del Cuerpo de Bomberos - Somos Nueva Esparta">
	<meta name="keywords" content="Unidad de Prevención de Siniestros del Cuerpo de Bomberos de la Gobernación del Estado Bolivariano de Nueva Esparta - En la Gestión del Gobernador Alfredo Diaz">
	<meta name="author" content="Dirección del PPP las Telecomunicaciones y Sistemas Informáticos - Programa Practicantes">
	<link rel="SHORTCUT ICON" href="/Bomberos/Imagenes/logo-escudo.png">
	<!-- CSS de Bootstrap -->
	<link rel="stylesheet" type="text/css" href="/Bomberos/css/bootstrap.css">
	<!-- CSS de Iconos -->
	<link href="/Bomberos/css/fontawesome-free/css/all.min.css" rel="stylesheet">
  	<link href="/Bomberos/css/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
	<!-- Jquery -->
	<script type="text/javascript" src="/Bomberos/js/jquery-3.3.1.min.js"></script>
	<!-- JS de Bootstrap y Popper-->
	<script type="text/javascript" src="/Bomberos/js/popper.js"></script>
	<script type="text/javascript" src="/Bomberos/js/bootstrap.js"></script>
	<!-- Jquery Validacion de datos -->
	<script type="text/javascript" src="/Bomberos/js/jquery.validate.min.js"></script>
	<!-- Jquery Mensajes de Alerta -->
 	<script type="text/javascript" src="/Bomberos/js/sweetalert.js"></script>
 	<!-- JS de los Charts -->
 	<script type="text/javascript" src="/Bomberos/js/chart.js"></script>
 	<!-- CSS para la particion del side nav bar y el contenido interno -->
 	<link type="text/css" href="/Bomberos/css/style.css" rel="stylesheet">

 	<!-- CSS interno de la pagina -->
 	<style type="text/css">
 		
 		.som{
 			cursor: pointer;
 		}

 		html, body{
 			margin: 0px;
 			height: 100%;
 		}

 		/*MENSAJE DE ERROR EN EL FORMULARIO*/
		label.error{	/*MANIPULO EL CSS DEL LABEL QUE SE ESCRIBE CUANDO HAY UN ERROR*/
			color: red;
			margin-left: 2%;
			display: inline;
			font-style: italic;
		}

		input.error, select.error{	/*MODIFICA LOS INPUT QUE HAYAN TENEDIO ALGUN ERROR*/
			border: 1px solid red;
			background: rgba(230,200,180,0.5);
		}

		textarea.error{  /*MODIFICA LOS TEXTAREA QUE HAYAN TENEDIO ALGUN ERROR*/
	      border: 1px solid red;
	      /*background: rgba(230,200,180,0.5);*/
	    } 

		@media (min-width: 1024px){
	        .fuente {
		        font-size: 4vw;
		    }

		    .fuente2{
		    	font-size: 2vw;
		    }
	    }

	    @media (max-width: 1024px){
	        .fuente {
		        font-size: 4vw;
		    }

		    .fuente2{
		    	font-size: 2vw;
		    }
	    }

	    @media (max-width: 800px){
	        .fuente {
		        font-size: 6vw;
		    }

		    .fuente2{
		    	font-size: 2.5vw;
		    }
	    }

	    @media (max-width: 640px){
	        .fuente {
		        font-size: 7.5vw;
		    }

		    .fuente2{
		    	font-size: 3.5vw;
		    }
	    }

	    @media (max-width: 320px){
	        .fuente {
		        font-size: 10vw;
		    }

		    .fuente2{
		    	font-size: 5vw;
		    }
	    }

		/*CSS DE LAS LETRAS DEL ESCUDO Y GOBIERNO*/
		@media (min-width: 1024px){
	        .topper {
	            font-size: 1.1vw;
	            line-height: 1em;
	        }
	    }

	    @media (max-width: 1024px){
	        .topper {
	            font-size: 1.2vw;
	            line-height: 1em;
	        }
	    }

	    @media (max-width: 800px){
	        .topper {
	            font-size: 1.8vw;
	            line-height: 1em;
	        }
	    }

	    @media (max-width: 640px){
	        .topper {
	            font-size: 2.3vw;
	            line-height: 1em;
	        }
	    }

	    @media (max-width: 320px){
	        .topper {
	            font-size: 4.5vw;
	            line-height: 1em;
	        }
	    }

		.dropdown-item.active{
			background-color: rgba(46,49,146,0.3);
			color: black;
		}
 	</style>

 	<!-- SCRIPT INTERNO DE LA PAGINA -->
 	<script>
	    $(document).ready(function() {

	      $(".dropdown-item").hover(function() {
	      	$(this).css('background-color', 'rgba(46,49,146,0.3)');
	      }, function() {
	      	$(this).css('background-color', 'white');
	      });

	    });
  	</script>
</head>
<body>
<!-- BARRA SUPERIOR FRANJA DE COLOR VERDE -->
	<div class="navbar navbar-fixed-top p-0" style="background-color: #2E3192">
	  <div class="container-fluid py-3 px-sm-4 px-0">
	    <div class="col-12 row justify-content-between px-sm-3 px-0 mx-0">
	      <div class="col-xl-8 col-12 m-auto row m-auto text-sm-justify text-center">
	      	<img src="/Bomberos/Imagenes/logo-gobernacion.png" class="img-fluid mr-md-3 mx-md-0 mx-auto" height="60" width="60">
	      	<h5 class="brand text-white my-auto" style=" font-family: Rockwell, Arial, 'Times New Roman';">Sección de Inspectores del Cuerpo de Bomberos</h5>
	      </div>
	      <div class="col-xl-4 col-12 m-auto p-0 pt-4 pt-md-0">
	        <ul class="nav justify-content-end">
	          <li class="nav-item active">
	          	<a href="#" class="mr-3">Panel de Inspección <i class="icon-user"></i></a>
	          </li>
	          <li class="nav-item">
	          	<a href="/Bomberos/config/csion.php" class="mr-3">Cerrar Sesion <i class="icon-logout"></i></a>
	          </li>
	        </ul>
	      </div>
	      <!--/.nav-collapse --> 
	    </div>
	    <!-- /container --> 
	  </div>
	  <!-- /navbar-inner --> 
	</div>
<!-- FIN FRANJA SUPERIOR DE COLOR VERDE -->

<!-- BARRA DE NAVEGACION -->
<div class="subnavbar mx-0">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="nav-item" id="nav-inicio">
        	<a href="/Bomberos/Adm_Bomberos/home.php"><i class="icon-menu"></i><span>Inicio</span></a> 
        </li>
        <li class="nav-item" id="nav-inspeccion">
        	<a href="/Bomberos/Adm_Bomberos/Lista/l_inspecciones.php"><i class="icon-eyeglass"></i><span>Inspecciones</span></a> 
        </li>
        <li class="nav-item" id="nav-modificar">
        	<a href="/Bomberos/Adm_Bomberos/Modificar/m_inspecciones.php"><i class="icon-settings"></i><span>Modificar Inspección</span></a> 
        </li>
        <li class="nav-item" id="nav-registro">
        	<a href="/Bomberos/Adm_Bomberos/Registrar/r_inspecciones.php"><i class="icon-plus"></i><span>Registrar Inspección</span></a> 
        </li>
        <li class="nav-item" id="nav-documento">
        	<a href="/Bomberos/Adm_Bomberos/Revisar/chequear.php"><i class="icon-check"></i><span>Revisar Documento</span></a> 
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- FIN BARRA DE NAVEGACION -->

	<!-- CONTENEDOR DE LA INFORMACION DE ADENTRO -->
	<div class="container-fluid justify-content-center mx-0" style="height: 100%;" id="main">
	    <div id="solicitud" class="mb-3">
	    	<div class="mt-4 text-left col-10 m-auto pt-3 row d-none" id="topsito">
		    	<div class="col-lg-9 col-12 mt-3 d-lg-block d-none topper">
					<span class="text-justify">
						República Bolivariana de Venezuela<br>
						Gobierno del Estado Bolivariano de Nueva Esparta<br>
						Dirección del Poder Popular para la Pesca<br>
					</span>
	    		</div>
	    		<div class="col-lg-9 col-12 mt-3 d-lg-none text-center topper">
					<span>
						República Bolivariana de Venezuela<br>
						Gobierno del Estado Bolivariano de Nueva Esparta<br>
						Dirección del Poder Popular para la Pesca<br>
					</span>
	    		</div>
	    		<div class="col-lg-3 col-12 mt-lg-0 mt-3 text-center">
	    			<img src="/Bomberos/Imagenes/escudo-azul.png" class="img-fluid" style="height: 80px">
	    		</div>
	    	</div>
<!--	    	
	    </div>
	</div>
    <!- FIN CONTENEDOR DE LAS OPCIONES ->
    <script type="text/javascript" src="js/solicitud.js"></script> ->
</body>
</html>-->