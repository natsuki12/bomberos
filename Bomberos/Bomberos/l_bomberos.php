<?php 
  include("../administracion.php");
  include ("../config/connect.php");
  include("paginacion.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-bomberos").addClass('active');
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

    <div class="col-lg-10 mx-auto">
      <img src="/Prefectura/Imagenes/franja.jpg" class="img-fluid">
    	<h4 class="text-center mt-4">INSPECTORES REGISTRADOS</h4>
    </div>
    <div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
        <h5 class="text-primary mt-4">Listado de Bomberos:</h5>
        <div class="row justify-content-between mb-2">
        	<div class="col-12 text-left mb-1">
            <label class="float-left">Buscar por Cédula:</label>
        		<input id="busquedal_nombre" align="left" class="float-left ml-2 col-sm-5 col-12 form-control form-control-sm" type='number' name='busquedal_nombre' placeholder="Cédula del Inspector">
        	</div>
        </div>

        <div class="row justify-content-between">
        	<div class='col-lg-6 col-md-6 col-sm-6 col-12'>
    	    	<h6 class='text-muted mb-lg-3'>Cantidad de Inspectores: <strong id="n_paginas" class='text-dark'><?php echo $bdd_filas ?></strong></h6>
    	    </div>
    	    <div class='col-lg-6 col-md-6 col-sm-6 col-12 text-right'>
    	      	<h6 class='text-muted mb-lg-3' id="paginacion_t"><?php echo $pagina ?>-<?php echo $pgn_total ?> / Página: 
                <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                  <?php if ($i==$pagina): ?>
                    <a class='text-dark' href='l_bomberos.php?pagina=<?php echo $i; if (isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><strong><?php echo $i ?></strong></a>
                  <?php else: ?>
                    <a class='text-dark' href='l_bomberos.php?pagina=<?php echo $i; if (isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><?php echo $i ?></a>
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
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Código C.I</th>
                    <th>Especialidad</th>
                    <th>Télefono</th>
                    <th>Correo</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php foreach ($inspector_p as $inspector): ?>
                  <tr>
                     <td scope="row">
                        <button onclick="eliminar('<?php echo $inspector->cedula_ins ?>')" type="button" class="eliminar" aria-label="Close" id="<?php echo $inspector->cedula_ins ?>">
                          <span aria-hidden="true">&times;</span>
                        </button>
                     </td>
                     <td><b><?php echo $inspector->cedula_ins ?></b></td>
                     <td><?php echo $inspector->nombre_ins ?></td>
                     <td><?php echo $inspector->apellido_ins ?></td>
                     <td><?php echo $inspector->cod_ins ?></td>
                     <td><?php echo $inspector->especialidad ?></td>
                     <td><?php echo $inspector->telefono ?></td>
                     <td><?php echo $inspector->correo ?></td>
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
                    <a class='text-dark' href='l_bomberos.php?pagina=<?php echo $i; if (isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><strong><?php echo $i ?></strong></a>
                  <?php else: ?>
                    <a class='text-dark' href='l_bomberos.php?pagina=<?php echo $i; if (isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><?php echo $i ?></a>
                  <?php endif; ?>
                <?php endfor; ?>
              </h6>
    	    </div>
        </div>
    </div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>

<script type="text/javascript" src="busqueda.bomberos.js"></script>

<script type="text/javascript">

  //EVENTO DE ELIMINAR
      function eliminar(name){

        $.ajax({
          url: 'proceso_bomberos.php',
          type: 'post',
          data: {eliminar: name},
        })
        .done(function(lista) {
          var exito = JSON.parse(lista);
          if(exito == "borrado")
            location.href = "l_bomberos.php?error=0";
          else
            location.href = "l_bomberos.php?error=1";
        })
        .fail(function() {
          console.log("error");
        });
        
      }
  //FIN EVENTO DE ELIMINAR

</script>

<?php if (isset($_GET["error"])): ?>
    <?php if($_GET["error"]==0): ?> <!-- MENSAJE DE EFECTIVAMENTE SE MODIFICO LOS DATOS DE LA PEROSNA -->
    <script type="text/javascript">
      swal({
              title: 'Inspector Eliminado con Exito',
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
              title: 'Fallo al Eliminar el Inspector',
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