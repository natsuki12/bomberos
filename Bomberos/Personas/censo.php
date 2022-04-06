<?php 
  include("../administracion.php");
  include("../config/connect.php");
  include("proceso_personas.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-personas").addClass('active');
  </script>	

	<div class="row text-center mt-2">
	    <div class="col-sm-10 col-12 text-center m-auto">
	    	<img src="../Imagenes/franja.jpg" class="img-fluid">
	        <h4 class="text-center mt-3">REGISTRO DE SOLICITANTE</h4>
	    </div>

		<div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
			<form class="m-auto col-12 justify-content-center" id="censo" action="censo.php" method="post">
			<!-- INFORMACION PERSONAL DEL PESCADOR -->
			  <h6 class="text-center pb-2 col-12" style="border-bottom: 2px solid">Información de la Persona</h6>
			  <div class="form-group text-justify col-12 row justify-content-center m-auto">
			  	<div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">	
				    <label class="text-muted" style="font-size: 1.2em">Nombres:</label>
				    <input type="text" class="form-control" id="nombre1_s" name="nombre1_s" placeholder="Ingrese su Nombre">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Apellidos:</label>
				    <input type="text" class="form-control" id="apellido1_s" name="apellido1_s" placeholder="Ingrese su Apellido"> 
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">	
				    <label class="text-muted" style="font-size: 1.2em">Cédula:</label>
				    <input type="text" class="form-control" id="cedula_s" name="cedula_s" placeholder="Ingrese su Cédula">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">	
				    <label class="text-muted" style="font-size: 1.2em">Nacionalidad:</label>
				    <select class="form-control" id="nacionalidad_p" name="nacionalidad_p">
				    	<option value="">Seleccione una opción:</option>
				    	<option value="Venezolana">Venezolana</option>
				    	<option value="Extranjera">Extranjera</option>
				    </select>
			    </div>
			  </div>
			<!-- FIN INFORMACION PERSONAL DEL PESCADOR -->

			<!-- INFORMACION DE CONTACTO -->
			  <h6 class="text-center pb-2 col-12" style="border-bottom: 2px solid">Información de Contacto</h6>
			  <div class="form-group text-justify col-12 mt-3 row justify-content-center m-auto">
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Teléfono:</label>
				    <input type="text" class="form-control" id="telefono1_s" name="telefono1_s" placeholder="Ingrese su Teléfono Principal">
			    </div>
			  	<div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Teléfono 2:</label>
				    <input type="text" class="form-control" id="telefono2_s" name="telefono2_s" placeholder="Ingrese su Teléfono Secundario">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Correo:</label>
				    <input type="email" class="form-control" id="correo_s" name="correo_s" placeholder="Ingrese su Correo">
			    </div>
			  </div>
			  <div class="form-group text-center col-12 mt-2 mx-auto">
				  <button type="submit" class="btn btn-success" name="btnsubmit">Registrar</button>
			  </div>
			<!-- FIN INFORMACION DE CONTACTO -->
			</form>
	    </div>
	</div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>

<script type="text/javascript" src="../js/jquery.ajax.js"></script>
<script type="text/javascript" src="validaciones_personas.js"></script>

<?php if (isset($error)): ?>
	<?php if ($error==0): ?>
		<script type="text/javascript">
			swal({
	        	  title: 'Embarcación Añadida Exitosamente',
	        	  text: 'Presione Cerrar para Continuar',
	        	  icon: 'success',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        });
			$(".swal-button--confirm").addClass('bg-secondary');
		</script>
	<?php endif ?>
	<?php if ($error==1): ?>
		<script type="text/javascript">
			swal({
        		title: 'Registro Fallido - Cédula Duplicada',
        		text: 'Porfavor Intente de Nuevo el Registro',
        		icon: 'error',
        		closeOnClickOutside: false,
    	  		button: "Cerrar",
        	});
			$(".swal-button--confirm").addClass('bg-secondary');
		</script>
	<?php endif ?>
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