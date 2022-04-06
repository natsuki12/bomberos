<?php 
  include("../administracion.php");
  include("proceso_bomberos.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-bomberos").addClass('active');
  </script>	

	<div class="row text-center justify-content-center">
	    <div class="col-sm-10 col-12 text-center m-auto">
	    	<img src="../Imagenes/franja.jpg" class="img-fluid">
	    	<h4 class="text-center mt-3">REGISTRO DE BOMBERO - INSPECTOR</h4>
	    </div>

		<div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
			<form class="m-auto col-12 justify-content-center" id="bombero" method="post" action="r_bomberos.php">
			  <h6 class="text-center pb-2 col-12" style="border-bottom: 2px solid">Información del Inspector</h6>
			  <div class="form-group text-justify col-12 row justify-content-center m-auto">
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Nombre:</label>
				    <input type="text" class="form-control" id="nombre_b" name="nombre_b" placeholder="Ingrese su Nombre">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Apellido:</label>
				    <input type="text" class="form-control" id="apellido_b" name="apellido_b" placeholder="Ingrese su Apellido">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Cédula:</label>
				    <input type="number" class="form-control" id="cedula_b" name="cedula_b" placeholder="Ingrese su Cédula">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Número de C.I (Código de Bombero):</label>
				    <input type="number" class="form-control" id="ci_b" name="ci_b" placeholder="Ingrese el Código">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Especialidad:</label>
				    <input type="text" class="form-control" id="especialidad_b" name="especialidad_b" placeholder="Ingrese el Código">
			    </div>
			  </div>

			  <h6 class="text-center pb-2 col-12" style="border-bottom: 2px solid">Información de Contacto</h6>
			  <div class="form-group text-justify col-12 row justify-content-center m-auto">
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Télefono:</label>
				    <input type="number" class="form-control" id="telefono_b" name="telefono_b" placeholder="Ingrese el Télefono">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Correo:</label>
				    <input type="email" class="form-control" id="correo_b" name="correo_b" placeholder="Ingrese el Correo">
			    </div>
			  </div>

			  <div class="form-group text-center col-12 mt-2 mx-auto">
			  	  <input type="text" name="solicitud" value="bombero" hidden="">
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
<script type="text/javascript" src="validaciones_bomberos.js"></script>
<?php if (isset($error)): ?>
	<?php if($error==0): ?>
		<script type="text/javascript">
			swal({
	        	  title: 'Inspector Añadido Exitosamente',
	        	  text: 'Presione Cerrar para Continuar',
	        	  icon: 'success',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        	});
			$(".swal-button--confirm").addClass('bg-secondary');
			$(".swal-text").addClass('text-center');
		</script>
	<?php endif; ?>

	<?php if($error==1): ?>
		<script type="text/javascript">
			swal({
	        	  title: 'Fallo al Añadir Inspector',
	        	  text: 'Cédula Duplicada',
	        	  icon: 'error',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        	});
			$(".swal-button--confirm").addClass('bg-secondary');
			$(".swal-text").addClass('text-center');
		</script>
	<?php endif; ?>
<?php endif; ?>