<?php 
  include("../administracion.php");
  include("proceso_operadores.php");
  include("paginacion.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-operador").addClass('active');
  </script>	

  <style type="text/css">
      .eliminar{
        font-size: 1.5rem;
        font-weight: 700;
        color: #000;
        opacity: .7;
        cursor: pointer;
      }

      .eliminar:hover, .eliminar:focus {
        text-decoration: none;
        opacity: 1;
      }

      button.eliminar{
        padding: 0;
        background-color: transparent;
        border: 0;
        -webkit-appearance: none;
      }
  </style>

	<div class="row text-center justify-content-center">
	    <div class="col-sm-10 col-12 text-center m-auto">
	    	<img src="../Imagenes/franja.jpg" class="img-fluid">
	        <div class="d-block d-lg-none">
	        	<div class="col-sm-5 col-12"><a href="#listado" >Lista de Operadores</a></div>
	        	<div class="col-sm-5 col-12"><a href="#modificado" class="col-sm-5 col-12">Modificar Operador</a></div>
	        </div>
	    </div>

	<!-- REGISTRAR OPERADOR -->
		<div id="registrado" class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white;">
			<form class="m-auto col-12 justify-content-center" id="operador" method="post" action="r_operadores.php">
			  <h5 class="text-center text-primary mb-3" style="font-size: 1.5em">Datos de Operador</h5>
			  <div class="form-group text-justify col-12 row justify-content-center m-auto">
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Nombre:</label>
				    <input type="text" class="form-control" id="nombre_o" name="nombre_o" placeholder="Ingrese su Nombre">
			    </div>
			    <div class="col-lg-6 col-md-10 col-sm-6 col-12  mb-3">
				    <label class="text-muted" style="font-size: 1.2em">Contraseña:</label>
				    <input type="text" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su Contraseña"> 
			    </div>
			  </div>

			  <div class="form-group text-center col-12 mt-2 mx-auto">
			  	  <input type="text" name="solicitud" value="operador" hidden="">
				  <button type="submit" class="btn btn-success" name="btnsubmit">Registrar</button>
			  </div>
			</form>
	    </div>
	<!-- FIN REGISTRAR OPERADOR -->

	<!-- LISTA OPERADOR -->
	    <div id="listado" class="col-lg-5 col-md-8 col-sm-11 col-12 py-2 rounded mr-lg-4" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
	        <h5 class="text-primary mt-4">Listado de Operadores</h5>
	        <div class="row justify-content-between mb-2">
	        	<div class="col-12 text-left mb-1">
	            <label class="float-left">Buscar por Nombre:</label>
	        		<input id="busquedal_nombre" align="left" class="float-left ml-2 col-sm-5 col-12 form-control form-control-sm" type='text' name='busquedal_nombre' placeholder="Nombre del Operador">
	        	</div>
	        </div>

	        <div class="row justify-content-between">
	        	<div class='col-lg-6 col-md-6 col-sm-6 col-12'>
	    	    	<h6 class='text-muted mb-lg-3'>Cantidad de Operadores: <strong id="n_paginas" class='text-dark'><?php echo $bdd_filas ?></strong></h6>
	    	    </div>
	    	    <div class='col-lg-6 col-md-6 col-sm-6 col-12 text-right'>
	    	      	<h6 class='text-muted mb-lg-3' id="paginacion_t"><?php echo $pagina ?>-<?php echo $pgn_total ?> / Página: 
	                <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
	                  <?php if ($i==$pagina): ?>
	                    <a class='text-dark' href='r_operadores.php?pagina=<?php echo $i; if (isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><strong><?php echo $i ?></strong></a>
	                  <?php else: ?>
	                    <a class='text-dark' href='r_operadores.php?pagina=<?php echo $i; if (isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><?php echo $i ?></a>
	                  <?php endif; ?>
	                <?php endfor; ?>
	    	        </h6>
	    	    </div>
	        </div>

	        <div class="col-12 m-auto">
	            <table class="table table-responsive p-0 text-center table-striped table-bordered" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
	              <thead class="thead-success ">
	                <tr>
	                    <th>Eliminar</th>
	                    <th>Nombre</th>
	                    <th>Contraseña</th>
	                    <th>Modificar</th>
	                </tr>
	              </thead>
	              <tbody id="tbody">
	                <?php foreach ($operador_p as $operador): ?>
	                  <tr>
	                     <th scope="row">
	                        <button onclick="eliminar('<?php echo $operador->nombre ?>')" type="button" class="eliminar" aria-label="Close" id="<?php echo $operador->nombre ?>">
	                          <span aria-hidden="true">&times;</span>
	                        </button>
	                     </th>
	                     <td><?php echo $operador->nombre ?></td>
	                     <td><?php echo $operador->password ?></td>
	                     <td><span id="<?php echo $operador->nombre ?>" onclick="modificar('<?php echo $operador->nombre ?>')" class="text-primary e_mod" style="cursor: pointer">Enviar</span></td>
	                  </tr>
	                <?php endforeach; ?>       
	              </tbody>
	            </table>
	        </div>

	        <div class="row justify-content-between">
	        	<div class='col-lg-6 col-md-6 col-sm-12'>
	    	    </div>
	    	    <div class='col-lg-6 col-md-6 col-sm-12 text-right'>
	    	      	<h6 class='text-muted mb-lg-3' id="paginacion_b"><?php echo $pagina ?>-<?php echo $pgn_total ?> / Página: 
	                <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
	                  <?php if ($i==$pagina): ?>
	                    <a class='text-dark' href='r_operadores.php?pagina=<?php echo $i; if (isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><strong><?php echo $i ?></strong></a>
	                  <?php else: ?>
	                    <a class='text-dark' href='r_operadores.php?pagina=<?php echo $i; if (isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><?php echo $i ?></a>
	                  <?php endif; ?>
	                <?php endfor; ?>
	              </h6>
	    	    </div>
	        </div>
	    </div>
	<!-- FIN LISTA OPERADOR -->

	<!-- MODIFICAR OPERADOR -->
	    <div id="modificado" class="col-lg-5 col-md-8 col-sm-11 col-12 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
		    <h5 class="text-primary mt-4">Modificar los Datos de un Operador</h5>
		    <div class="row justify-content-between mb-2">
		    	<div class="col-12 text-left">
					<label class="float-left">Buscar por Usuario:</label>
		    		<input id="busquedam_nombre" align="left" class="float-left ml-2 col-sm-5 col-12 form-control form-control-sm" type='text' name='busqueda' placeholder="Nombre..">
		    	</div>
		    </div>

		    <div class="col-12 mx-auto text-center">
	        	<p class='font-weight-light fuente2' id="info">Ingrese el Nombre del Operador</p>
	        </div>

		    <form id="operador" method="post" action="r_operadores.php">
			<!-- CADA SECCION SOBRE LOS DATOS DE UNA PERSONA -->
				<div class="row mt-4">
			    	<div class="col-lg-8 col-md-10 col-sm-10 col-12 mx-auto">
			    		<h5>Datos del Operador</h5>
			    		<div class="border px-sm-4 py-3 text-dark row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Nombre: </span>
			    				<input id="i_nombre" type="text" name="nombre_o" disabled="true" class="font-italic form-control" value="" style="display: inline;  background-color: transparent; border:0">
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
			    				<a class="text-primary" id="e_nombre" style="cursor: pointer;">Editar</a>
			    			</div>
			    		</div>
			    		<div class="border px-sm-4 py-3 text-dark mt-2 row">
			    			<div class="col-sm-10 col-12">
			    				<span class="font-weight-bold">Contraseña: </span>
			    				<input id="i_contraseña" type="text" name="contraseña" disabled="true" class="font-italic form-control" value="" style="display: inline;  background-color: transparent; border:0;">
			    			</div>
			    			<div class="col-sm-2 col-12 text-right">
			    				<a class="text-primary" id="e_contraseña" style="cursor: pointer;">Editar</a>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			<!-- FIN DE CADA SECCION DE LOS DATOS DE UNA PERSONA -->

			<!-- BOTON PARA GUARDAR CAMBIOS -->
				<div class="text-center mt-4">
					<input type="hidden" name="solicitud" value="modificar">
					<input type="hidden" name="user_codigo" value="" id="i_codigo">
					<button class="btn btn-success" id="send" name="btnsubmit">Guardar Cambios</button>
				</div>
			<!-- FIN BOTON PARA GUARDAR CAMBIOS -->
			</form>
		</div>
	<!-- FIN MODIFICAR OPERADOR -->

	</div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>
<script type="text/javascript" src="validaciones_operador.js"></script>
<script type="text/javascript" src="busqueda.operadores.js"></script>

<!-- SCRIPTS PARA HABILITAR LOS FORMULARIOS DE EDITAR -->
<script type="text/javascript">

	$("#send").attr('disabled', 'true');

	//INPUTS DE SECCION DE DATOS DE OPERADOR
    	$("#e_nombre").click(function(event) {
    		$("#i_nombre").removeAttr('disabled');
    		$("#i_nombre").focus();
    		$("#send").removeAttr('disabled');
    	});

    	$("#e_contraseña").click(function(event) {
    		$("#i_contraseña").removeAttr('disabled');
    		$("#i_contraseña").focus();
    		$("#i_contraseña").val("");
    		$("#send").removeAttr('disabled');
    	});

    	$("#e_prefectura").click(function(event) {
    		$("#o_prefectura").removeAttr('disabled');
    		$("#o_prefectura").focus();   
    		$("#send").removeAttr('disabled'); 	
    	});
    //FIN INPUTS DE SECCION DE DATOS DE OPERADOR

    //EVENTO DE MODIFICAR DATOS
	    function modificar(name){
	    	var nombre = name;
	    	$("#info").fadeOut('500', function() {
	    		$("#info").text("");
				$("#info").removeClass('text-danger');	
	    	});
	    	
			$.ajax({
				url: 'buscador_operadores.php',
				type: 'post',
				data: {nombre: name},
			})
			.done(function(datos) {
				var operador=JSON.parse(datos);
					if (operador[0]!=null) {
						$("#i_nombre").fadeOut('500', function() {
							$(this).val(operador[0]["nombre"]);	
						});
						$("#i_nombre").fadeIn(500);

						$("#i_contraseña").fadeOut('500', function() {
							$(this).val(operador[0]["password"]);	
						});
						$("#i_contraseña").fadeIn(500);

						$("#i_codigo").val(operador[0]["nombre"]);
					}else{
						$("#info").text("Operador no Encontrado");
						$("#info").addClass('text-danger');
						$("#info").fadeIn(500);

						$("#i_nombre").fadeOut('500', function() {
							$(this).val("");	
						});
						$("#i_nombre").fadeIn(500);

						$("#i_contraseña").fadeOut('500', function() {
							$(this).val("");	
						});
						$("#i_contraseña").fadeIn(500);

						$("#i_codigo").val("");
					}	
			})
			.fail(function() {
				alert("error");
			});
	    }
    //FIN EVENTO DE MODIFICAR

    //EVENTO DE ELIMINAR
	    function eliminar(name){
	    	$.ajax({
				url: 'proceso_operadores.php',
				type: 'post',
				data: {eliminar: name},
			})
			.done(function(lista) {
				var exito = JSON.parse(lista);
				if(exito == "borrado")
					location.href = "r_operadores.php?error=0";
				else
					location.href = "r_operadores.php?error=1";
			})
			.fail(function() {
				alert("error");
			});
	    }
    //FIN EVENTO DE ELIMINAR
</script>

<?php if (isset($error)): ?>
	<?php if($error==0): ?>
		<script type="text/javascript">
			swal({
	        	  title: 'Operador Añadido Exitosamente',
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
	        	  title: 'Fallo al Añadir al Operador',
	        	  text: 'Porfavor Intente de Nuevo Añadir el Usuario\n Procure Cambiar el Nombre',
	        	  icon: 'error',
	        	  closeOnClickOutside: false,
	        	  button: "Cerrar",
	        	});
			$(".swal-button--confirm").addClass('bg-secondary');
			$(".swal-text").addClass('text-center');
		</script>
	<?php endif; ?>

	<?php if($error==2): ?> <!-- MENSAJE DE EFECTIVAMENTE SE MODIFICO LOS DATOS DE LA PEROSNA -->
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

	<?php if($error==3): ?> <!-- MENSAJE DE FALLO ERROR SI NO SE MODIFICO LOS DATOS DE LA PERSONA -->
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

<?php if (isset($_GET["error"])): ?>
    <?php if($_GET["error"]==0): ?> <!-- MENSAJE DE EFECTIVAMENTE SE MODIFICO LOS DATOS DE LA PEROSNA -->
    <script type="text/javascript">
      swal({
              title: 'Operador Eliminado con Exito',
              text: 'Presione Cerrar para Continuar',
              icon: 'success',
              closeOnClickOutside: false,
              button: "Cerrar",
            });
      $(".swal-button--confirm").addClass('bg-secondary');
      $(".swal-text").addClass('text-center');
    </script>
  <?php endif; ?>

  <?php if($_GET["error"]==1): ?> <!-- MENSAJE DE FALLO ERROR SI NO SE MODIFICO LOS DATOS DE LA PERSONA -->
    <script type="text/javascript">
      swal({
              title: 'Fallo al Eliminar el Operador',
              text: 'Porfavor Intente de Nuevo la Modificación',
              icon: 'error',
              closeOnClickOutside: false,
              button: "Cerrar",
            });
      $(".swal-button--confirm").addClass('bg-secondary');
      $(".swal-text").addClass('text-center');
    </script>
  <?php endif; ?> 
<?php endif; ?>