<?php 
  include("../administracion.php");
  include ("../config/connect.php");
  include("paginacion.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-actividades").addClass('active');
  </script> 

    <!-- CONTENEDOR DE LA INFORMACION DE ADENTRO -->
  <div class="row text-center justify-content-center">
    <div class="col-sm-10 col-12 text-center m-auto">
        <img src="../Imagenes/franja.jpg" class="img-fluid">
    	<h4 class="text-center mt-4">REGISTRO DE ACTIVIDADES</h4>
    </div>
    
    <div class="col-lg-8 col-md-8 col-sm-11 col-12 py-2 rounded mr-lg-4" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
        <h5 class="text-primary mt-4">Listado de Actividades:</h5>
        <div class="row justify-content-between mb-2">
        	<div class="col-12 text-left">
              <label class="float-left">Buscar por (Operador - Inspector):</label>
              <input id="l_operadores" align="left" class="float-left ml-2 col-sm-5 col-12 form-control form-control-sm" type='text' name='busquedal_nombre' placeholder="Nombre o Cédula">
          </div>
        </div>

        <div class="row justify-content-between">
        	<div class='col-lg-6 col-md-6 col-sm-6 col-12 text-left'>
    	    	<h6 class='text-muted mb-lg-3'>Cantidad de Actividades: <strong class='text-dark' id="n_paginas"><?php echo $bdd_filas ?></strong></h6>
    	    </div>
    	    <div class='col-lg-6 col-md-6 col-sm-6 col-12 text-right'>
              <h6 class='text-muted mb-lg-3' id="paginacion_t"><?php echo $pagina ?>-<?php echo $pgn_total ?> / Página: 
                <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                  <?php if ($i==$pagina): ?>
                    <a class='text-dark' href='registro.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><strong><?php echo $i ?></strong></a>
                  <?php else: ?>
                    <a class='text-dark' href='registro.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><?php echo $i ?></a>
                  <?php endif; ?>
                <?php endfor; ?>
              </h6>
          </div>
        </div>

        <div class="col-12 m-auto">
            <table class="table table-responsive p-0 text-center table-striped table-bordered" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
              <thead class="thead-success ">
                <tr>
                    <th>N# Actividad</th>
                    <th>Operador - Inspector</th>
                    <th>Actividad</th>
                    <th>Código de Registro</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php foreach ($actividades as $actividad): ?>
                  <tr>
                     <td><b><?php echo $actividad->registro_id ?></b></td>
                     <td><?php echo $actividad->usuario_name ?></td>
                     <td><?php echo $actividad->actividad ?></td>
                     <td><?php echo $actividad->codigo_registrado ?></td>
                     <td><?php echo $actividad->fechat ?></td>
                     <td><?php echo $actividad->hora ?></td>
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
                    <a class='text-dark' href='registro.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><strong><?php echo $i ?></strong></a>
                  <?php else: ?>
                    <a class='text-dark' href='registro.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])) { echo "&busqueda=".$_GET["busqueda"];}?>'><?php echo $i ?></a>
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

<script type="text/javascript" src="buscador.js"></script>