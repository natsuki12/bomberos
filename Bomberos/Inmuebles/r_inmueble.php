<?php 
  include("../administracion.php");
  include("proceso_inmueble.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-inmuebles").addClass('active');
  </script>	

	<div class="row text-center mt-2">
	    <div class="col-sm-10 col-12 text-center m-auto">
	    	<img src="../Imagenes/franja.jpg" class="img-fluid">
	        <h4 class="text-center mt-3">REGISTRO DE INMUEBLE</h4>
	    </div>

		<div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
			<form class="m-auto col-12 justify-content-center" id="inmueble" method="post" action="r_inmueble.php">
			<!-- INFORMACION PERSONAL DEL PESCADOR -->
			  <h6 class="text-center pb-2 col-12" style="border-bottom: 2px solid">Información del Inmueble</h6>
			  <div class="form-group text-justify col-12 row justify-content-center m-auto">
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Nombre del Inmueble:</label>
				    <input type="text" class="form-control" id="nombre_i" name="nombre_i" placeholder="Ingrese su Denominación"> 
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Uso del Inmueble:</label>
				    <input type="text" class="form-control" id="uso_i" name="uso_i" placeholder="Ingrese su Finalidad"> 
			    </div>
			  	<div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">	
				    <label class="text-muted" style="font-size: 1.2em">Firma Representativa:</label>
				     <select type="text" class="form-control" name="firma_in" id="firma_in">
				    	<option value="">--Elija un Municipio--</option>
				    	<option value="Personal">Personal</option>
				    	<option value="juridica">Juridica</option>
				    </select>
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">	
				    <label class="text-muted" style="font-size: 1.2em">RIF:</label>
				    <div class="input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text" id="RIF-span">V -</span>
						</div>
				    	<input type="number" class="form-control" id="rif_i" name="rif_i" placeholder="Ingrese el RIF">
				    </div>
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">	
				    <label class="text-muted" style="font-size: 1.2em">Metros Cuadrados:</label>
				    <input type="text" class="form-control" id="metros_i" name="metros_i" placeholder="Ingrese el Tamaño del Inmueble"> 
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">	
				    <label class="text-muted" style="font-size: 1.2em">Número de Pisos:</label>
				    <input type="number" class="form-control" id="pisos_i" name="pisos_i" placeholder="Ingrese los niveles del Inmueble"> 
			    </div>
			  </div>
			<!-- FIN INFORMACION PERSONAL DEL PESCADOR -->

			<!-- INFORMACION DE CONTACTO -->
			  <h6 class="text-center pb-2 col-12" style="border-bottom: 2px solid">Información de Dirección</h6>
			  <div class="form-group text-justify col-12 mt-3 row justify-content-center m-auto">
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Municipio:</label>
				    <select type="text" class="form-control" name="municipio_i" id="municipio_i">
				    	<option value="">--Elija un Municipio--</option>
				    	<option value="10">Antolín del Campo</option>
				    	<option value="1">Arismendi</option>
				    	<option value="2">Díaz</option>
				    	<option value="11">García</option>
				    	<option value="3">Gómez</option>
				    	<option value="4">Maneiro</option>
				    	<option value="5">Marcano</option>
				    	<option value="6">Mariño</option>
				    	<option value="7">Península de Macanao</option>
				    	<option value="9">Tubores</option>
				    	<option value="8">Villalba</option>
				    </select>
			    </div>
			  	<div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Dirección 1:</label>
				    <input type="text" class="form-control" id="direccion1_i" name="direccion1_i" placeholder="Ingrese la Dirección">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Dirección 2 (Opcional):</label>
				    <input type="text" class="form-control" id="direccion2_i" name="direccion2_i" placeholder="Ingrese la Dirección">
			    </div>
			  </div>
			<!-- FIN INFORMACION DE CONTACTO -->
			
			<!-- INFORMACION DE CROQUIS -->
			  <h6 class="text-center pb-2 col-12" style="border-bottom: 2px solid">Croquis de Dirección del Inmueble</h6>
			  <h6 class="text-center text-muted mb-3">Presione sobre el Número Correspondiente en el croquis como representación a una Calle o Avenida, Tome en cuenta el recuadro de color Azul como la Ubicación del Inmueble.</h6>
			  <div class="col-12 mt-3 row justify-content-center m-auto">
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-3 my-auto p-4 row justify-content-center" style="border: 1px solid black">
			    <!--PRIMERA FRANJA DE RECUADROS -->
				    <div class="w-25 col-3" style="height: 50px; border: 1px solid black"></div>
				    <div id="espacio-1" class="text-center row m-auto espacio" style="height: 40px; width: 12.5%; cursor: pointer">
				    	<h6 class="m-auto">1</h6>
				    </div>
				    <div class="w-25 col-3" style="height: 50px; border: 1px solid black"></div>
				    <div id="espacio-2" class="text-center row m-auto espacio" style="height: 40px; width: 12.5%; cursor: pointer">
				    	<h6 class="m-auto">2</h6>
				    </div>
				    <div class="w-25 col-3" style="height: 50px; border: 1px solid black"></div>
				<!--FIN PRIMERA FRANJA DE RECUADROS -->

				<!--PRIMERA FRANJA VACIA -->
				    <div id="espacio-3" class="w-25 col-3 row m-auto espacio" style="height: 30px; cursor: pointer">
				    	<h6 class="m-auto">3</h6>
				    </div>
				    <div class="text-center" style="height: 30px; width: 12.5%;"></div>
				    <div id="espacio-4" class="w-25 col-3 row m-auto espacio" style="height: 30px; cursor: pointer">
				    	<h6 class="m-auto">4</h6>
				    </div>
				    <div class="text-center" style="height: 30px; width: 12.5%"></div>
				    <div id="espacio-5" class="w-25 col-3 row m-auto espacio" style="height: 30px; cursor: pointer">
				    	<h6 class="m-auto">5</h6>
				    </div>
				<!--FIN PRIMERA FRANJA VACIA -->

				<!--SEGUNDA FRANJA DE RECUADROS -->
					<div class="w-25 col-3" style="height: 50px; border: 1px solid black"></div>
				    <div id="espacio-6" class="text-center row m-auto espacio" style="height: 40px; width: 12.5%; cursor: pointer">
				    	<h6 class="m-auto">6</h6>
				    </div>
				    <div class="w-25 col-3" style="height: 50px; background-color: #2E3192; border: 1px solid black"></div>
				    <div id="espacio-7" class="text-center row m-auto espacio" style="height: 40px; width: 12.5%; cursor: pointer">
				    	<h6 class="m-auto">7</h6>
				    </div>
				    <div class="w-25 col-3" style="height: 50px; border: 1px solid black"></div>				    
			    <!--FIN SEGUNDA FRANJA DE RECUADROS -->
			    
			    <!--SEGUNDA FRANJA VACIA -->
				    <div id="espacio-8" class="w-25 col-3 row m-auto espacio" style="height: 30px; cursor: pointer">
				    	<h6 class="m-auto">8</h6>
				    </div>
				    <div class="text-center" style="height: 30px; width: 12.5%;"></div>
				    <div id="espacio-9" class="w-25 col-3 row m-auto espacio" style="height: 30px; cursor: pointer">
				    	<h6 class="m-auto">9</h6>
				    </div>
				    <div class="text-center" style="height: 30px; width: 12.5%"></div>
				    <div id="espacio-10" class="w-25 col-3 row m-auto espacio" style="height: 30px; cursor: pointer">
				    	<h6 class="m-auto">10</h6>
				    </div>
				<!--FIN SEGUNDA FRANJA VACIA -->

				<!--TERCERA FRANJA DE RECUADROS -->
					<div class="w-25 col-3" style="height: 50px; border: 1px solid black"></div>
				    <div id="espacio-11" class="text-center row m-auto espacio" style="height: 40px; width: 12.5%; cursor: pointer">
				    	<h6 class="m-auto">11</h6>
				    </div>
				    <div class="w-25 col-3" style="height: 50px; border: 1px solid black"></div>
				    <div id="espacio-12" class="text-center row m-auto espacio" style="height: 40px; width: 12.5%; cursor: pointer">
				    	<h6 class="m-auto">12</h6>
				    </div>
				    <div class="w-25 col-3" style="height: 50px; border: 1px solid black"></div>				    
			    <!--FIN TERCERA FRANJA DE RECUADROS -->
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12 mt-lg-0 mt-2 mb-3 mx-auto row justify-content-center">
				    <div class="col-11">
				    	<h6 class="text-primary text-center">Leyenda de Calles</h6>
				    	<ul class="nav flex-column text-left">
				    		<li class="nav-item">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">1</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_1" name="croquis_1">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">2</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_2" name="croquis_2">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">3</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_3" name="croquis_3">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">4</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_4" name="croquis_4">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">5</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_5" name="croquis_5">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">6</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_6" name="croquis_6">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">7</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_7" name="croquis_7">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">8</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_8" name="croquis_8">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">9</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_9" name="croquis_9">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">10</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_10" name="croquis_10">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">11</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_11" name="croquis_11">
							    </div>
							</li>
				    		<li class="nav-item mt-1">
				    			<div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text">12</span>
									</div>
							    	<input type="text" class="form-control" id="croquis_12" name="croquis_12">
							    </div>
							</li>
				    		<!--<li class="nav-item"><h6>12.-<span class="font-weight-light">X Dirección</span></h6></li>-->
				    	</ul>
				    </div>
			    </div>
			  </div>
			<!-- FIN INFORMACION DE CROQUIS -->

			   <div class="form-group text-center col-12 mt-2 mx-auto">
			  	  <input type="text" name="solicitud" value="inmueble" hidden="">
				  <button type="submit" class="btn btn-success" name="btnsubmit">Registrar</button>
			  </div>
			</form>
	    </div>
	</div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>

<script type="text/javascript" src="validaciones_inmuebles.js"></script>

<script type="text/javascript">
	$("#juridico").click(function(event) {
		$("#RIF-span").text('J -');
	});

	$("#personal").click(function(event) {
		$("#RIF-span").text('V -');
	});

	//SECCION DEL CROQUIS
	$("#espacio-1").click(function(event) { $("#croquis_1").focus(); });
	$("#espacio-2").click(function(event) { $("#croquis_2").focus(); });
	$("#espacio-3").click(function(event) { $("#croquis_3").focus(); });
	$("#espacio-4").click(function(event) { $("#croquis_4").focus(); });
	$("#espacio-5").click(function(event) { $("#croquis_5").focus(); });
	$("#espacio-6").click(function(event) { $("#croquis_6").focus(); });
	$("#espacio-7").click(function(event) { $("#croquis_7").focus(); });
	$("#espacio-8").click(function(event) { $("#croquis_8").focus(); });
	$("#espacio-9").click(function(event) { $("#croquis_9").focus(); });
	$("#espacio-10").click(function(event) { $("#croquis_10").focus(); });
	$("#espacio-11").click(function(event) { $("#croquis_11").focus(); });
	$("#espacio-12").click(function(event) { $("#croquis_12").focus(); });

	/*$(".espacio").hover(function() {
		//$(this).css('background-color', 'rgba(46,49,146,0.3)');
		$(this).animate({backgroundColor: 'rgba(46,49,146,0.3)'}, 500);
	}, function() {
		$(this).css('background-color', 'white');
	});*/
</script>

<?php if (isset($error)): ?>
	<?php if ($error==0): ?>
		<script type="text/javascript">
			swal({
	        	  title: 'Inmueble Añadida Exitosamente',
	        	  text: 'Presione Cerrar para Continuar',
	        	  icon: 'success',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        });
			$(".swal-button--confirm").addClass('bg-secondary');
		</script>
	
	<?php endif ?>

	<?php if($error==1): ?>
		<script type="text/javascript">
			swal({
	        	  title: 'Fallo al Añadir Inmueble',
	        	  text: 'Rif Duplicado',
	        	  icon: 'error',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        	});
			$(".swal-button--confirm").addClass('bg-secondary');
			$(".swal-text").addClass('text-center');
		</script>
	<?php endif; ?>
	<?php if ($error==2): ?>
		<script type="text/javascript">
			swal({
		 		title: 'Registro Fallido',
		 		text: 'Porfavor Intente de Nuevo el Registro',
		 		icon: 'error',
		 		closeOnClickOutside: false,
		 		button: "Cerrar",
		 	});
		 	$(".swal-button--confirm").addClass('bg-secondary');
		</script>
	<?php endif ?>
<?php endif ?>