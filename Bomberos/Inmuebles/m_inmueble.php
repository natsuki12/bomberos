<?php 
  include("../administracion.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-inmuebles").addClass('active');
  </script>

	<!-- CONTENEDOR DE LA INFORMACION DE ADENTRO -->
	<div class="col-sm-10 col-12 mx-auto ">
	    <img src="../Imagenes/franja.jpg" class="img-fluid">
	    <h4 class="text-center mt-3">MODIFICACIÓN DE INMUEBLE</h4>
	</div>

	<div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
	    <h5 class="text-primary mt-4">Modificar los Datos de Inmueble Registrado.</h5>
	    <div class="row justify-content-between mb-2">
	    	<div class="col-sm-6 col-12 text-left">
				<label class="float-left">Buscar por RIF:</label>
	    		<input id="busqueda" align="left" class="float-left ml-lg-2 ml-md-0 ml-sm-2 col-lg-3 col-md-5 col-sm-4 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="Nro de Rif">
	    		<label class="text-danger" id="fallo"></label>
	    	</div>
	    </div>

	    <div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto text-center" id="info">
	    	<p class='font-weight-light text-dark fuente2'>Por favor ingrese el Número de RIF</p>
	    </div>

		<!-- CADA SECCION SOBRE LOS DATOS DE UN INMUEBLE -->
			<div class="row mt-4">
		    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto" id="inmueble_contenedor">
		    		<h5 class="pointer" data-toggle="collapse" data-target="#dato-persona">Datos del Inmueble</h5>
		    		<form id="inmueble">
		    			<div class="border px-sm-4 py-3 text-dark row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Nombre: </span>
			    				<input id="nombre_i" type="text" name="nombre_i" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0">
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_nombre" style="cursor: pointer;">Editar</a>
		    				</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Uso del Inmueble: </span>
			    				<input id="uso_i" type="text" name="uso_i" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_uso" style="cursor: pointer;">Editar</a>
		    				</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Firma: </span>
			    				<select class="form-control font-italic" id="firma_i" name="nacionalidad" style="display: inline;  background-color: transparent; border:0;">
							    	<option value="Personalizada">Personalizada</option>
							    	<option value="Juridica">Juridica</option>
							    </select>
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_firma" style="cursor: pointer;">Editar</a>
		    				</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">	
							    <span class="font-weight-bold">RIF:</span>
							    <div class="input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text" id="RIF-span">V -</span>
									</div>
							    	<input type="number" class="font-italic form-control" id="rif_i" name="rif_i" style="display: inline;  background-color: transparent; ">
							    </div>
						    </div>
						    <div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_rif" style="cursor: pointer;">Editar</a>
		    				</div>
					    </div>
					    <div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Metros Cuadrados del Inmueble: </span>
			    				<input id="metros_i" type="text" name="metros_i" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_metros" style="cursor: pointer;">Editar</a>
		    				</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Niveles - Pisos del Inmueble: </span>
			    				<input id="pisos_i" type="text" name="pisos_i" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_pisos" style="cursor: pointer;">Editar</a>
		    				</div>
			    		</div>
			    		<div class="text-center mt-4">
		    				<button class="btn btn-success">Guardar Cambios</button>
		    			</div>
		    		</form>
		    	</div>
		    </div>
		<!-- FIN DE CADA SECCION DE LOS DATOS DE UN INMUEBLE -->

		<div class="w-100"></div> <!--FORZAR LA SEPARACION-->

		<!-- SECCION DE INFORMACION DE DIRECCION DEL INMUEBLE -->
			<div class="row mt-5">
		    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto" id="redes">
		    		<h5 class="pointer" data-toggle="collapse" data-target="#dato-redes">Información de Dirección</h5>
		    		<form id="inmueble_m">
			    		<div class="border px-sm-4 py-3 text-dark row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Municipio: </span>
			    				<select type="text" class="form-control font-italic" name="municipio_i" id="municipio_i" style="display: inline;  background-color: transparent; border:0;">
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
			    			<div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_municipio" style="cursor: pointer;">Editar</a>
		    				</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Dirreción 1: </span>
			    				<input id="direccion1_i" type="text" name="direccion1_i" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_direccion1" style="cursor: pointer;">Editar</a>
		    				</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Dirección 2: </span>
			    				<input id="direccion2_i" type="text" name="direccion2_i" class="font-italic form-control" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
		    					<a class="text-primary" id="e_direccion2" style="cursor: pointer;">Editar</a>
		    				</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Croquis: </span>
								<a class="text-primary" style="cursor: pointer;" id="croquis">Ver Representación</a>
			    			</div>
			    		</div>
<!-- MODAL PARA CUANDO QUIERA VER AL DETALLE EL CROQUIS -->
	<div class="modal fade" id="croquis_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content" style="height: auto;">
				<div class="modal-header">
					<h5 class="modal-title">Croquis del Inmueble: <span id="nombre_inmueble">Los Naranjeros</span></h5>
					<button type="button" class="close r-cerrar" data-dismiss="modal" aria-label="Close">
		  			<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
	<!-- INFORMACION DE CROQUIS -->
        <h6 class="text-center text-muted mb-3">El Número Correspondiente en el croquis sirve como representación a una Calle o Avenida, Tome en cuenta el recuadro de color Azul como la Ubicación del Inmueble.</h6>
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
                    <input type="text" class="form-control" id="croquis_3"  name="croquis_3">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">4</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_4"  name="croquis_4">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">5</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_5"  name="croquis_5">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">6</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_6"  name="croquis_6">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">7</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_7"  name="croquis_7">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">8</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_8"  name="croquis_8">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">9</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_9"  name="croquis_9">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">10</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_10"  name="croquis_10">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">11</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_11"  name="croquis_11">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">12</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_12"  name="croquis_12">
                  </div>
              </li>
                <!--<li class="nav-item"><h6>12.-<span class="font-weight-light">X Dirección</span></h6></li>-->
              </ul>
            </div>
          </div>
        </div>
  	<!-- FIN INFORMACION DE CROQUIS -->
				</div>
			</div>
		</div>
	</div>
<!-- FIN MODAL PARA CUANDO QUIERA VER AL DETALLE EL CROQUIS -->
			    		<div class="text-center mt-4">
		    				<button class="btn btn-success">Guardar Cambios</button>
		    			</div>
		    		</form>
		    	</div>
		    </div>
		<!-- FIN DE DIRECCIONES -->
	</div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>

<script type="text/javascript" src="validaciones_inmuebles.js"></script>
<script type="text/javascript" src="busqueda.mpersonas.js"></script>

<script type="text/javascript">
	
	$("#croquis").click(function(event) {
		$("#croquis_modal").modal("show");
	});

	$("#e_nombre").click(function(event) {
		$("#nombre_i").focus();
	});

	$("#e_uso").click(function(event) {
		$("#uso_i").focus();
	});

	$("#e_firma").click(function(event) {
		$("#firma_i").focus();
	});

	$("#firma_i").change(function(event) {
		if($(this).val()=="Personalizada"){
			$("#RIF-span").text('V -');
			$("#rif_i").val("");
		}
		else{
			$("#RIF-span").text('J -');
			$("#rif_i").val("");
		}
	});

	$("#e_rif").click(function(event) {
		$("#rif_i").focus();
	});

	$("#e_metros").click(function(event) {
		$("#metros_i").focus();
	});

	$("#e_pisos").click(function(event) {
		$("#pisos_i").focus();
	});

	$("#e_municipio").click(function(event) {
		$("#municipio_i").focus();
	});

	$("#e_direccion1").click(function(event) {
		$("#direccion1_i").focus();
	});

	$("#e_direccion2").click(function(event) {
		$("#direccion2_i").focus();
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