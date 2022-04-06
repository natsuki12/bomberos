<?php 
  include("../admin.php");
  include("proceso_inspeccion.php");

  $total = 0;
  $inspeccion = 0;
  if(isset($_GET["inspeccion"])){
	  	$inspeccion = $_GET["inspeccion"];
	  	$sql="SELECT * FROM `inspeccion` WHERE cod_inspeccion = :codigo";
		$query=$bdd->prepare($sql);
		$query->execute(array(":codigo"=>$inspeccion));
		$total = $query->rowCount();
		$informacion=$query->fetchAll(PDO::FETCH_OBJ);
  }

  if (isset($_POST["btnsubmit1"])) {
  		$inspeccion = $_POST["cod_inspeccion1"];
	  	$sql="SELECT * FROM `inspeccion` WHERE cod_inspeccion = :codigo";
		$query=$bdd->prepare($sql);
		$query->execute(array(":codigo"=>$inspeccion));
		$total = $query->rowCount();
		$informacion=$query->fetchAll(PDO::FETCH_OBJ);
  }

  if (isset($_POST["btnsubmit2"])) {
  		$inspeccion = $_POST["cod_inspeccion2"];
	  	$sql="SELECT * FROM `inspeccion` WHERE cod_inspeccion = :codigo";
		$query=$bdd->prepare($sql);
		$query->execute(array(":codigo"=>$inspeccion));
		$total = $query->rowCount();
		$informacion=$query->fetchAll(PDO::FETCH_OBJ);
  }
?>
  <style type="text/css">
  		@media (max-width: 800px){
		    .fuente {
		        font-size: 10vw;
		    }

		    .fuente2{
		    	font-size: 9vw;
		    }
		}

		@media (min-width: 800px){
		    .fuente {
		        font-size: 4vw;
		    }

		    .fuente2{
		    	font-size: 3vw;
		    }
		}
  </style>

  <script type="text/javascript">
    //$("#topsito").removeClass('d-none');
    $("#nav-modificar").addClass('active');
  </script>

	<!-- CONTENEDOR DE LA INFORMACION DE ADENTRO -->
	<div class="col-sm-10 col-12 mx-auto ">
	    <!-- <img src="../Imagenes/franja.jpg" class="img-fluid"> -->
	    <h4 class="text-center mt-3">MODIFICACIÓN DE INSPECCIÓN</h4>
	</div>

	<div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
	    <h5 class="text-primary mt-4">Modificar los Datos de Inspección Registrada.</h5>
	    <div class="row justify-content-between mb-2">
	    	<div class="col-sm-6 col-12 text-left">
				<label class="float-left">Buscar por Código:</label>
				<?php if ($total!=0): ?>
					<input id="busqueda" align="left" class="float-left ml-lg-2 ml-md-0 ml-sm-2 col-lg-5 col-md-5 col-sm-4 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="Nro de Inspección" value="<?php echo $inspeccion ?>">
				<?php else: ?>
					<input id="busqueda" align="left" class="float-left ml-lg-2 ml-md-0 ml-sm-2 col-lg-5 col-md-5 col-sm-4 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="Nro de Inspección">
				<?php endif; ?>
	    		<label class="text-danger" id="fallo"></label>
	    	</div>
	    </div>

	    <?php if ($total==0): ?>
		    <div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto text-center" id="info">
		    	<p class='font-weight-light text-dark fuente2'>Por favor ingrese el Código de Inspección</p>
		    </div>
		<?php else: ?>
			<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto text-center" id="info">
		    	<p class='font-weight-light text-dark fuente2'></p>
		    </div>
	    <?php endif; ?>

		<!-- CADA SECCION SOBRE LOS DATOS DE UNA INSPECCION -->
			<div class="row mt-4">
		    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto" id="inmueble_contenedor">
		    		<h5 class="pointer">Datos de Inspección <i id="datos-general" class="fa fa-angle-double-up" style="cursor: pointer" name="subir"></i></h5>
		    		<div id="general-data">
			    		<form id="inspeccion-general" action="m_inspecciones.php" method="post">
			    			<div class="border px-sm-4 py-3 text-dark row">
				    			<div class="col-sm-10 col-12">
				    				<span class="font-weight-bold">Estado de Solicitud: </span>
				    				<select class="form-control font-italic" id="estado_i" name="estado_i" style="display: inline;  background-color: transparent; border:0;">
								    	<option value="3">Aceptada</option>
								    	<option value="2">Denegada</option>
								    	<option value="1">En Proceso</option>
								    </select>
				    			</div>
				    			<div class="col-sm-2 col-12 text-right">
			    					<a class="text-primary" id="e_estado" style="cursor: pointer;">Editar</a>
			    				</div>
				    		</div>
				    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
				    			<div class="col-sm-10 col-12">
				    				<span class="font-weight-bold">Observación: </span>
				    				<textarea id="observacion_i" type="text" name="observacion_i" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;"></textarea>
				    			</div>
				    			<div class="col-sm-2 col-12 text-right">
			    					<a class="text-primary" id="e_observacion" style="cursor: pointer;">Editar</a>
			    				</div>
				    		</div>
				    		<input type="hidden" name="cod_inspeccion1" id="cod_inspeccion1">
				    		<input type="hidden" name="cedula_ins" value="<?php echo $u_nombre ?>">
				    		<div class="text-center mt-4">
			    				<button class="btn btn-success" type="submit" name="btnsubmit1">Guardar Cambios</button>
			    			</div>
			    		</form>
		    		</div>
		    	</div>
		    </div>
		<!-- FIN DE CADA SECCION DE LOS DATOS DE UNA INSPECCION -->

		<div class="w-100"></div> <!--FORZAR LA SEPARACION-->

		<img src="../../Imagenes/franja.jpg" class="img-fluid my-4">
		<h4 class="text-center">Datos Específicos de Inspección</h4>
		<!-- SECCION DE DATOS POR SECCION DE LA INSPECCION -->
			<div class="row mt-3">
		    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto" id="redes">
		    		
		    		<form id="inspeccion-especifica" action="m_inspecciones.php" method="post">

		    			<!-- MEDIOS DE ESCAPE -->
			    			<h5>01 - Medios de Escape <i id="datos-medios" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="medios-escape">
				    			<div class="form-check col-12">
				    			  <div id="c1_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_1" name="check1_1">
								  </div>
								  <label class="form-check-label" for="check1_1">1.1 Instalar Puertas de Emergencia</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c1_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_2" name="check1_2">
								  </div>
								  <label class="form-check-label" for="check1_2">1.2 Instalar Salida de Emergencia</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c1_3">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_3" name="check1_3">
								  </div>
								  <label class="form-check-label" for="check1_3">1.3 Señalizar Rutas de Escape</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c1_4">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_4" name="check1_4">
								  </div>
								  <label class="form-check-label" for="check1_4">1.4 Colocar pasamanos resistentes al fuego por ambos lados de las escaleras a 1.10 mts de altura</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c1_5">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_5" name="check1_5">
							 	  </div>
								  <label class="form-check-label" for="check1_5">1.5 Instalar iluminación de emergencia en rutas de escape</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c1_6">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_6" name="check1_6">
								  </div>
								  <label class="form-check-label" for="check1_6">1.6 Confinar escaleras mediante puertas de acceso</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c1_7">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_7" name="check1_7">
								  </div>
								  <label class="form-check-label" for="check1_7">1.7 Corregir puertas de emergencia: material, color, abertura</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c1_8">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_8" name="check1_8">
								  </div>
								  <label class="form-check-label" for="check1_8">1.8 Instalar en puertas de emergencia cierre hidráulico y barra antipanico</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c1_9">
								  	<input class="form-check-input" type="checkbox" value="" id="check1_9" name="check1_9">
								  </div>
								  <label class="form-check-label" for="check1_9">1.9 Las puertas principales de toda edificación deberán abrir en sentido de salida</label>
								</div>
				    		</div>
				    	<!-- FIN MEDIOS DE ESCAPE -->

				    	<!-- SISTEMA FIJO DE EXTINCIÓN -->
				    		<h5 class="mt-4">02 - Sistema Fijo de Extinción (Instalar) <i id="datos-extincion-f" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="extincion-f">
				    			<div class="form-check col-12">
				    			  <div id="c2_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_1" name="check2_1">
								  </div>
								  <label class="form-check-label" for="check2_1">2.1 Corregir potencia de bomba y reserva de agua</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_2" name="check2_2">
								  </div>
								  <label class="form-check-label" for="check2_2">2.2 Interconectar con Hidroneumático</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_3">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_3" name="check2_3">
								  </div>
								  <label class="form-check-label" for="check2_3">2.3 Instalar supervisión Hidroneumático - TCC</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_4">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_4" name="check2_4">
								  </div>
								  <label class="form-check-label" for="check2_4">2.4 Instalar supervisión nivel crítico de agua - TCC</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_5">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_5" name="check2_5">
								  </div>
								  <label class="form-check-label" for="check2_5">2.5 Instalar supervisión tensión de bomba - TCC</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_6">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_6" name="check2_6">
								  </div>
								  <label class="form-check-label" for="check2_6">2.6 Instalar supervisión presostato - TCC</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_7">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_7" name="check2_7">
								  </div>
								  <label class="form-check-label" for="check2_7">2.7 Instalar supervisión sensor de flujo - TCC</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_8">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_8" name="check2_8">
								  </div>
								  <label class="form-check-label" for="check2_8">2.8 Instalar tuberia de prueba</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_9">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_9" name="check2_9">
								  </div>
								  <label class="form-check-label" for="check2_9">2.9 Instalar separadamente control eléctrico de la bomba</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_10">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_10" name="check2_10">
								  </div>
								  <label class="form-check-label" for="check2_10">2.10 Instalar punto de agua 3/4" con manguera de 10m. de longitud en parte exterior del cuarto de basura</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_11">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_11" name="check2_11">
								  </div>
								  <label class="form-check-label" for="check2_11">2.11 Instalar cajetines de mangueras, con pitón metálico</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_12">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_12" name="check2_12">
								  </div>
								  <label class="form-check-label" for="check2_12">2.12 Instalar sistema de rociadores automáticos</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c2_13">
								  	<input class="form-check-input" type="checkbox" value="" id="check2_13" name="check2_13">
								  </div>
								  <label class="form-check-label" for="check2_13">2.13 Instalar sistema de extinción fijo en campanas de cocina</label>
								</div>
				    		</div>
				    	<!-- FIN SISTEMA FIJO DE EXTINCIÓN -->

				    	<!-- EXTINTORES PORTATILES -->
			    			<h5 class="mt-4">03 - Extintores Portatiles <i id="datos-extincion-p" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="extincion-p">
				    			<div class="form-check col-12">
				    			  <div id="c3_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check3_1" name="check3_1">
								  </div>
								  <label class="form-check-label" for="check3_1">3.1 Instalar de CO2 en cuartos de bombas, salas de ascensores, cuartos de electricidad y cocinas</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c3_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check3_2" name="check3_2">
								  </div>
								  <label class="form-check-label" for="check3_2">3.2 Instalar extintor (es) de (P.Q.S) de <u>"n"</u> libras</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c3_3">
								   <input class="form-check-input" type="checkbox" value="" id="check3_3" name="check3_3">
								  </div>
								  <label class="form-check-label" for="check3_3">3.3 Todo extintor debe ser instalado en un sitio visible, de facil acceso, sin obstaculos y sobre rectangulo rojo</label>
								</div>
				    		</div>
				  			<div class="border px-sm-4 py-3 text-dark mt-2 row" id="extincion-p2">
				    			<div class="col-sm-10 col-12">
				    				<span class="font-weight-bold">Número de Libras: </span>
				    				<input id="libras" type="text" name="libras" class="font-italic form-control" value="" style="display: inline;  background-color: transparent; border:0;">
				    			</div>
				    		</div>
				    	<!-- FIN EXTINTORES PORTATILES -->

				    	<!-- ILUMINACION DE EMERGENCIA -->
			    			<h5 class="mt-4">04 - Iluminación de Emergencia (Instalar) <i id="datos-iluminacion-e" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="iluminacion-e">
				    			<div class="form-check col-12">
								  <div id="c4_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check4_1" name="check4_1">
								  </div>
								  <label class="form-check-label" for="check4_1">4.1 Instalar conexión con Tablero General</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c4_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check4_2" name="check4_2">
								  </div>
								  <label class="form-check-label" for="check4_2">4.2 Instalar en cuartos de electricidad salas de maquinas de ascensores y cuartos de bombas</label>
								</div>
				    		</div>
				    	<!-- FIN ILUMINACION DE EMERGENCIA -->

				    	<!-- INSTALACIONES ELECTRICAS -->
			    			<h5 class="mt-4">05 - Instalaciones Electricas <i id="datos-instalacion-e" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="instalacion-e">
				    			<div class="form-check col-12">
								  <div id="c5_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check5_1" name="check5_1">
								  </div>
								  <label class="form-check-label" for="check5_1">5.1 El tablero de Uso Preferencial debe ser independiente</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c5_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check5_2" name="check5_2">
								  </div>
								  <label class="form-check-label" for="check5_2">5.2 El tablero de Uso General debe ser independiente</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c5_3">
								  	<input class="form-check-input" type="checkbox" value="" id="check5_3" name="check5_3">
								  </div>
								  <label class="form-check-label" for="check5_3">5.3 Embutir todo cableado en tubería metálica E.M.T. e identificarla de color negro con anillos rojos</label>
								</div>
				    		</div>
				    	<!-- FIN INSTALACIONES ELECTRICAS -->

				    	<!-- SISTEMA DE DETECCION Y ALARMA -->
			    			<h5 class="mt-4">06 - Sistema de Detección de Alarma <i id="datos-sistema-a" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="sistema-a">
				    			<div class="form-check col-12">
				    			  <div id="c6_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check6_1" name="check6_1">
								  </div>
								  <label class="form-check-label" for="check6_1">6.1 Instalar y/o Reparar</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c6_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check6_2" name="check6_2">
								  </div>
								  <label class="form-check-label" for="check6_2">6.2 Identificar Zonificación</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c6_3">
								  	<input class="form-check-input" type="checkbox" value="" id="check6_3" name="check6_3">
								  </div>
								  <label class="form-check-label" for="check6_3">6.3 Toda área compartimentada debe estar protegida</label>
								</div>
				    		</div>
				    	<!-- FIN SISTEMA DE DETECCION Y ALARMA -->

				    	<!-- INSTALACION DE GAS -->
			    			<h5 class="mt-4">07 - Instalación de Gas <i id="datos-instalacion-g" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="instalacion-g">
				    			<div class="form-check col-12">
								  <div id="c7_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check7_1" name="check7_1">
								  </div>
								  <label class="form-check-label" for="check7_1">7.1 Instalar cerramientos de protección al tanque</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c7_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check7_2" name="check7_2">
								  </div>
								  <label class="form-check-label" for="check7_2">7.2 Corregir ventilación</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c7_3">
								  	<input class="form-check-input" type="checkbox" value="" id="check7_3" name="check7_3">
								  </div>
								  <label class="form-check-label" for="check7_3">7.3 Instalar válvulas de cierre rápido a artefactos</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c7_4">
								  	<input class="form-check-input" type="checkbox" value="" id="check7_4" name="check7_4">
								  </div>
								  <label class="form-check-label" for="check7_4">7.4 Toda la tuberia debe ser rigida</label>
								</div>
				    		</div>
				    	<!-- FIN INSTALACION DE GAS -->

				    	<!-- SIMBOLOS Y SEÑALES DE SEGURIDAD -->
			    			<h5 class="mt-4">08 - Simbolos y Señales de Seguridad (Instalar) <i id="datos-simbolos-s" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="simbolos-s">
				    			<div class="form-check col-12">
								  <div id="c8_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check8_1" name="check8_1">
								  </div>
								  <label class="form-check-label" for="check8_1">8.1 No fume, Gases Inflamables</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c8_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check8_2" name="check8_2">
								  </div>
								  <label class="form-check-label" for="check8_2">8.2 Riesgo Eléctrico</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c8_3">
								  	<input class="form-check-input" type="checkbox" value="" id="check8_3" name="check8_3">
								  </div>
								  <label class="form-check-label" for="check8_3">8.3 Otros</label>
								</div>
				    		</div>
				    	<!-- FIN SIMBOLOS Y SEÑALES DE SEGURIDAD -->

				    	<!-- COLORES DE TUBERIA Y FLUIDOS -->
			    			<h5 class="mt-4">09 - Colores de Tuberias de Fluidos (Identificar) <i id="datos-colores-t" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="colores-t">
				    			<div class="form-check col-12">
								  <div id="c9_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check9_1" name="check9_1">
								  </div>
								  <label class="form-check-label" for="check9_1">9.1 Agua Potable (Verde), Aguas Residuales (Negro)</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c9_2">
								  	<input class="form-check-input" type="checkbox" value="" id="check9_2" name="check9_2">
								  </div>
								  <label class="form-check-label" for="check9_2">9.2 Agua para Incendio (Rojo)</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c9_3">
								  	<input class="form-check-input" type="checkbox" value="" id="check9_3" name="check9_3">
								  </div>
								  <label class="form-check-label" for="check9_3">9.3 Liquidos combustibles e inflamables (Marrón)</label>
								</div>
								<div class="form-check col-12 mt-2">
								  <div id="c9_4">
								  	<input class="form-check-input" type="checkbox" value="" id="check9_4" name="check9_4">
								  </div>
								  <label class="form-check-label" for="check9_4">9.4 Gases inflamables (Amarillo)</label>
								</div>
				    		</div>
				    	<!-- FIN COLORES DE TUBERIA Y FLUIDOS -->

				    	<!-- SELLAR CANALIZACIONES -->
			    			<h5 class="mt-4">10 - Sellar Canalizaciones <i id="datos-sellar-c" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="sellar-c">
				    			<div class="form-check col-12">
								  <div id="c10_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check10_1" name="check10_1">
								  </div>
								  <label class="form-check-label" for="check10_1">10.1 En Paso por Placas y Paredes</label>
								</div>
				    		</div>
				    	<!-- FIN SELLAR CANALIZACIONES -->

				    	<!-- PLAFONES -->
			    			<h5 class="mt-4">11 - Plafones (Corregir Tipo) <i id="datos-plafones" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="plafones">
				    			<div class="form-check col-12">
								  <div id="c11_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check11_1" name="check11_1">
								  </div>
								  <label class="form-check-label" for="check11_1">11.1 Deben ser resistente al fuego</label>
								</div>
				    		</div>
				    	<!-- FIN PLAFONES -->

				    	<!-- PROYECTOS Y PLANOS -->
			    			<h5 class="mt-4">12 - Proyectos y Planos <i id="datos-proyectos" class="fa fa-angle-double-down" style="cursor: pointer" name="bajar"></i></h5>
				    		<div class="border px-sm-4 py-3 text-dark row" id="proyectos">
				    			<div class="form-check col-12">
								  <div id="c12_1">
								  	<input class="form-check-input" type="checkbox" value="" id="check12_1" name="check12_1">
								  </div>
								  <label class="form-check-label" for="check12_1">12.1 Presentar proyectos de los sistemas de seguridad y protección contra incendios para su revisión, aprobación e instalación</label>
								</div>
				    		</div>
				    	<!-- FIN PROYECTOS Y PLANOS -->

				    	<input type="hidden" name="cod_inspeccion2" id="cod_inspeccion2">
				    	<input type="hidden" name="cedula_ins" value="<?php echo $u_nombre ?>">
			    		<div class="text-center mt-4">
		    				<button class="btn btn-success" type="submit" name="btnsubmit2">Guardar Cambios</button>
		    			</div>
		    		</form>
		    	</div>
		    </div>
		<!-- FIN DE DATOS -->

	</div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>

<script type="text/javascript" src="validaciones.js"></script>
<script type="text/javascript" src="inspecciones.js"></script>

<script type="text/javascript">
<?php if($total!=0): ?>
	acomodar(<?php echo $inspeccion ?>);
<?php endif; ?>
//INSPECCION PRINCIPAL GENERAL
	$("#datos-general").click(function(event) {
		var forma = $(this).attr('name');
		if (forma=="subir"){
			$("#general-data").slideUp(1000);
			$(this).fadeOut('500', function() {
				$(this).removeClass('fa-angle-double-up');
				$(this).addClass('fa-angle-double-down');
				$(this).attr('name', 'bajar');
			});
			$(this).fadeIn(500);
		}
		else{
			$("#general-data").slideDown(1000);
			$(this).fadeOut('500', function() {
				$(this).removeClass('fa-angle-double-down');
				$(this).addClass('fa-angle-double-up');
				$(this).attr('name', 'subir');
			});
			$(this).fadeIn(500);
		}
	});

	$("#e_estado").click(function(event) {
		$("#estado_i").focus();
	});

	$("#e_fecha").click(function(event) {
		$("#fecha_i").focus();
		$("#fecha_i").removeAttr('readonly')
	});

	$("#e_observacion").click(function(event) {
		$("#observacion_i").focus();
		$("#observacion_i").removeAttr('readonly')
	});

//DATOS ESPECIFICOS YA DE LA INSPECCION
	//MEDIOS DE ESCAPE
		$("#medios-escape").hide();
		$("#datos-medios").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#medios-escape").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#medios-escape").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//SISTEMA FIJO DE EXTINCION
		$("#extincion-f").hide();
		$("#datos-extincion-f").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#extincion-f").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#extincion-f").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//EXTINTOR PORTATIL
		$("#extincion-p").hide();
		$("#extincion-p2").hide();
		$("#datos-extincion-p").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#extincion-p").slideUp(500);
				$("#extincion-p2").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#extincion-p").slideDown(500);

				if($("#check3_2").prop('checked')){
					$("#extincion-p2").slideDown(500);
				}
				
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

		$("#check3_2").click(function(event) {
			if($(this).prop('checked')){
				$("#extincion-p2").fadeIn(500);
			}
			else{
				$("#extincion-p2").fadeOut(500);	
			}
		});

	//ILUMINACION DE EMERGENCIA
		$("#iluminacion-e").hide();
		$("#datos-iluminacion-e").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#iluminacion-e").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#iluminacion-e").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//INSTALACIONES ELECTRICAS
		$("#instalacion-e").hide();
		$("#datos-instalacion-e").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#instalacion-e").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#instalacion-e").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//SISTEMA DE DETECCION DE ALARMAS
		$("#sistema-a").hide();
		$("#datos-sistema-a").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#sistema-a").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#sistema-a").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//INSTALACION DE GAS
		$("#instalacion-g").hide();
		$("#datos-instalacion-g").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#instalacion-g").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#instalacion-g").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//SIMBOLOS Y SEÑALES DE SEGURIDAD
		$("#simbolos-s").hide();
		$("#datos-simbolos-s").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#simbolos-s").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#simbolos-s").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//COLORES DE TUBERIA Y FLUIDOS
		$("#colores-t").hide();
		$("#datos-colores-t").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#colores-t").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#colores-t").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//SELLAR CANALIZACIONES
		$("#sellar-c").hide();
		$("#datos-sellar-c").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#sellar-c").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#sellar-c").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//PLAFONES
		$("#plafones").hide();
		$("#datos-plafones").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#plafones").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#plafones").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});

	//PROYECTOS Y PLANOS
		$("#proyectos").hide();
		$("#datos-proyectos").click(function(event) {
			var forma = $(this).attr('name');
			if (forma=="subir"){
				$("#proyectos").slideUp(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-up');
					$(this).addClass('fa-angle-double-down');
					$(this).attr('name', 'bajar');
				});
				$(this).fadeIn(500);
			}
			else{
				$("#proyectos").slideDown(500);
				$(this).fadeOut('500', function() {
					$(this).removeClass('fa-angle-double-down');
					$(this).addClass('fa-angle-double-up');
					$(this).attr('name', 'subir');
				});
				$(this).fadeIn(500);
			}
		});
</script>

<?php if (isset($error)): ?>
    <?php if($error==0): ?> <!-- MENSAJE DE EFECTIVAMENTE SE MODIFICO LOS DATOS DE LA PEROSNA -->
		<script type="text/javascript">
			swal({
	        	  title: 'Modificaciones Guardadas con Exito',
	        	  text: 'Presione Cerrar para Continuar',
	        	  icon: 'success',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        	});
			$(".swal-button--confirm").addClass('bg-secondary');
		</script>
	<?php endif; ?>

	<?php if($error==1): ?> <!-- MENSAJE DE FALLO ERROR SI NO SE MODIFICO LOS DATOS DE LA PERSONA -->
		<script type="text/javascript">
			swal({
	        	  title: 'Fallo al Guardar los Cambios',
	        	  text: 'Porfavor Intente de Nuevo la Modificación',
	        	  icon: 'error',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        	});
			$(".swal-button--confirm").addClass('bg-secondary');
		</script>
	<?php endif; ?>	
<?php endif; ?>