<?php 
  include("../administracion.php");
  include ("../config/connect.php");
  include("proceso_bomberos.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-bomberos").addClass('active');
  </script>	

	<!-- CONTENEDOR DE LA INFORMACION DE ADENTRO -->
	<div class="col-sm-10 col-12 mx-auto ">
	    <img src="/Prefectura/Imagenes/franja.jpg" class="img-fluid">
	    <h4 class="text-center mt-4">MODIFICACIÓN DE BOMBEROS - INSPECTOR</h4>
	</div>

	<div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
	    <h5 class="text-primary mt-4">Modificar los Datos de un Inspector.</h5>
	    <div class="row justify-content-between mb-2">
	    	<div class="col-sm-6 col-12 text-left">
				<label class="float-left">Buscar por Inspector:</label>
	    		<input id="busquedam_nombre" align="left" class="float-left ml-lg-2 ml-md-0 ml-sm-2 col-lg-3 col-md-5 col-sm-4 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="Cedula..">
	    	</div>
	    </div>

	    <div class="col-12 mx-auto text-center">
        	<p class='font-weight-light fuente2' id="info">Ingrese la Cédula del Inspector</p>
        </div>

	    <form id="bombero" method="post" action="m_bomberos.php">
	        <!-- CADA SECCION SOBRE LOS DATOS DE UN INSPECTOR -->
	    	  <div class="row mt-4">
		    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto">
		    		<h5 class="">Datos del Inspector</h5>
		    		<div class="border px-sm-4 py-3 text-dark row">
		    			<div class="col-sm-10 col-12">
		    				<span class="font-weight-bold">Nombre: </span>
		    				<input id="nombre_b" type="text" name="nombre_b" class="font-italic form-control" value="X nombre" style="display: inline;  background-color: transparent; border:0">
		    			</div>
		    			<div class="col-sm-2 col-12 text-right">
		    				<a class="text-primary" id="e_nombre" style="cursor: pointer;">Editar</a>
		    			</div>
		    		</div>
		    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
		    			<div class="col-sm-10 col-12">
		    				<span class="font-weight-bold">Apellido: </span>
		    				<input id="apellido_b" type="text" name="apellido_b" class="font-italic form-control" value="X Apellido" style="display: inline;  background-color: transparent; border:0">
		    			</div>
		    			<div class="col-sm-2 col-12 text-right">
		    				<a class="text-primary" id="e_apellido" style="cursor: pointer;">Editar</a>
		    			</div>
		    		</div>
		    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
		    			<div class="col-sm-10 col-12">
		    				<span class="font-weight-bold">Cédula: </span>
		    				<input id="cedula_b" type="number" name="cedula_b" class="font-italic form-control" value="" style="display: inline;  background-color: transparent; border:0">
		    			</div>
		    			<div class="col-sm-2 col-12 text-right">
		    				<a class="text-primary" id="e_cedula" style="cursor: pointer;">Editar</a>
		    			</div>
		    		</div>
		    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
		    			<div class="col-sm-10 col-12">
		    				<span class="font-weight-bold">Número de C.I (Código Único): </span>
		    				<input id="ci_b" type="number" name="ci_b" class="font-italic form-control" value="" style="display: inline;  background-color: transparent; border:0">
		    			</div>
		    			<div class="col-sm-2 col-12 text-right">
		    				<a class="text-primary" id="e_ci" style="cursor: pointer;">Editar</a>
		    			</div>
		    		</div>
		    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
		    			<div class="col-sm-10 col-12">
		    				<span class="font-weight-bold">Especialidad: </span>
		    				<input id="especialidad_b" type="text" name="especialidad_b" class="font-italic form-control" value="X Especialidad" style="display: inline;  background-color: transparent; border:0">
		    			</div>
		    			<div class="col-sm-2 col-12 text-right">
		    				<a class="text-primary" id="e_especialidad" style="cursor: pointer;">Editar</a>
		    			</div>
		    		</div>
		    	</div>
	          </div>
	        <!-- FIN DE CADA SECCION DE LOS DATOS DE UN INSPECTOR -->

	        <!-- CADA SECCION SOBRE LOS DATOS DE CONTACTO -->
	    	  <div class="row mt-4">
		    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto">
		    		<h5 class="">Datos de Contacto</h5>
		    		<div class="border px-sm-4 py-3 text-dark row">
		    			<div class="col-sm-10 col-12">
		    				<span class="font-weight-bold">Télefono: </span>
		    				<input id="telefono_b" type="text" name="telefono_b" class="font-italic form-control" value="X Télefono" style="display: inline;  background-color: transparent; border:0">
		    			</div>
		    			<div class="col-sm-2 col-12 text-right">
		    				<a class="text-primary" id="e_telefono" style="cursor: pointer;">Editar</a>
		    			</div>
		    		</div>
		    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
		    			<div class="col-sm-10 col-12">
		    				<span class="font-weight-bold">Correo: </span>
		    				<input id="correo_b" type="email" name="correo_b" class="font-italic form-control" value="X Correo" style="display: inline;  background-color: transparent; border:0">
		    			</div>
		    			<div class="col-sm-2 col-12 text-right">
		    				<a class="text-primary" id="e_correo" style="cursor: pointer;">Editar</a>
		    			</div>
		    		</div>
		    	</div>
	          </div>
	        <!-- FIN DE CADA SECCION DE LOS DATOS DE CONTACTO -->

	        <!-- BOTON PARA GUARDAR CAMBIOS -->
			  <div class="text-center mt-4" id="boton_inspector">
				<!-- <input type="text" name="bombero_cedula" id="bombero_cedula" value="" hidden=""> -->
				<input type="text" name="solicitud" value="modificar" hidden="">
				<button id="btn_submit" type="submit" class="btn btn-success" name="btnsubmit">Guardar Cambios</button>
			  </div>
		    <!-- FIN BOTON PARA GUARDAR CAMBIOS -->
	    </form>

	</div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>

<script type="text/javascript" src="validaciones_bomberos.js"></script>
<script type="text/javascript" src="busqueda.bomberos.js"></script>

<!-- SCRIPTS PARA HABILITAR LOS FORMULARIOS DE EDITAR -->
<script type="text/javascript">

	//INPUTS DE SECCION DE DATOS DE OPERADOR
    	$("#e_nombre").click(function(event) {
    		$("#nombre_b").focus();
    	});

    	$("#e_apellido").click(function(event) {
    		$("#apellido_b").focus();
    	});

    	$("#e_cedula").click(function(event) {
    		$("#cedula_b").focus();
    	});

    	$("#e_ci").click(function(event) {
    		$("#ci_b").focus();
    	});

    	$("#e_especialidad").click(function(event) {
    		$("#especialidad_b").focus();
    	});

    	$("#e_telefono").click(function(event) {
    		$("#telefono_b").focus();
    	});

    	$("#e_correo").click(function(event) {
    		$("#correo_b").focus();
    	});
    //FIN INPUTS DE SECCION DE DATOS DE OPERADOR

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
			$(".swal-text").addClass('text-center');
		</script>
	<?php endif; ?>

	<?php if($error==1): ?> <!-- MENSAJE DE FALLO ERROR SI NO SE MODIFICO LOS DATOS DE LA PERSONA -->
		<script type="text/javascript">
			swal({
	        	  title: 'Fallo al Guardar los Cambios',
	        	  text: 'Porfavor Intente de Nuevo la Modificación\n Procure Cambiar el Nombre',
	        	  icon: 'error',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        	});
			$(".swal-button--confirm").addClass('bg-secondary');
			$(".swal-text").addClass('text-center');
		</script>
	<?php endif; ?>	
<?php endif; ?>
