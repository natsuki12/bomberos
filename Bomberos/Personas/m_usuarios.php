<?php 
  include("../administracion.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-personas").addClass('active');
  </script>

	<!-- CONTENEDOR DE LA INFORMACION DE ADENTRO -->
	<div class="col-sm-10 col-12 mx-auto ">
	    <img src="../Imagenes/franja.jpg" class="img-fluid">
	    <h4 class="text-center mt-3">MODIFICACIÓN DE SOLICITANTE</h4>
	</div>

	<div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
	    <h5 class="text-primary mt-4">Modificar los Datos de Persona Registrada.</h5>
	    <div class="row justify-content-between mb-2">
	    	<div class="col-sm-6 col-12 text-left">
				<label class="float-left">Buscar por cédula:</label>
	    		<input id="busqueda" align="left" class="float-left ml-lg-2 ml-md-0 ml-sm-2 col-lg-3 col-md-5 col-sm-4 col-12 form-control form-control-sm" type='text' name='busqueda' placeholder="cédula">
	    		<label class="text-danger" id="fallo"></label>
	    	</div>
	    </div>

	    <div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto text-center" id="info">
	    	<p class='font-weight-light text-dark fuente2'>Por favor ingrese la cédula</p>
	    </div>

		<!-- CADA SECCION SOBRE LOS DATOS DE UNA PERSONA -->
			<div class="row mt-4">
		    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto" id="persona">
		    		<h5 class="pointer" data-toggle="collapse" data-target="#dato-persona">Datos de la Persona</h5>
		    		<form id="dato-persona">
		    			<div class="border px-sm-4 py-3 text-dark row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Nombre: </span>
			    				<input id="i_nombre" type="text" name="nombre" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0">
			    			</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Apellido: </span>
			    				<input id="i_apellido" type="text" name="apellido" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Nacionalidad: </span>
			    				<select class="form-control font-italic" id="i_nacionalidad" name="nacionalidad" style="display: inline;  background-color: transparent; border:0;">
							    	<option value="">Seleccione una opción:</option>
							    	<option value="Venezolana">Venezolana</option>
							    	<option value="Extranjero">Extranjero</option>
							    </select>
			    			</div>
			    		</div>
			    		<div class="text-center mt-4">
		    				<button class="btn btn-success">Guardar Cambios</button>
		    			</div>
		    		</form>
		    	</div>
		    </div>
		<!-- FIN DE CADA SECCION DE LOS DATOS DE UNA PERSONA -->

		<div class="w-100"></div> <!--FORZAR LA SEPARACION-->

		<!-- SECCION DE INFORMACION DE REDES SOCIALES -->
			<div class="row mt-5">
		    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto" id="redes">
		    		<h5 class="pointer" data-toggle="collapse" data-target="#dato-redes">Información de Contacto</h5>
		    		<form id="dato-redes">
			    		<div class="border px-sm-4 py-3 text-dark row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Teléfono 1: </span>
			    				<input id="i_telefono1" type="text" name="telefono1" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Teléfono 2: </span>
			    				<input id="i_telefono2" type="text" name="telefono2" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Correo: </span>
			    				<input id="i_correo" type="text" name="email" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    		</div>
			    		<div class="text-center mt-4">
		    				<button class="btn btn-success">Guardar Cambios</button>
		    			</div>
		    		</form>
		    	</div>
		    </div>
		<!-- FIN DE REDES SOCIALES -->
	</div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>

<script type="text/javascript" src="..js/jquery.ajax.js"></script>
<script type="text/javascript" src="busqueda.mpersonas.js"></script>

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