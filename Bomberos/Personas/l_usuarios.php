<?php 
  include("../administracion.php");
  include("../config/connect.php");
  include("p_usuarios.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-personas").addClass('active');
  </script>

    <div class="col-sm-10 col-12 mx-auto ">
        <img src="../Imagenes/franja.jpg" class="img-fluid">
    	<h4 class="text-center mt-3">SOLICITANTES REGISTRADOS</h4>
    </div>
    <div class="col-md-8 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
      <h5 class="text-primary mt-4">Listado de Solicitantes Registrados:</h5>
      <div class="row justify-content-between mb-2">
        <div class="col-lg-6 col-md-12 col-sm-10 col-12"></div>
        <div class="col-lg-6 col-md-12 col-12 text-right">
          <input id="busqueda_cedula" align="left" class="float-right ml-2 col-sm-3 col-12 form-control form-control-sm" type='text' name='busqueda' placeholder="cédula">
          <label class="float-right">Buscar por cédula:</label>
        </div>
        <div class="col-lg-6 col-md-12 col-12"></div>
        <div class="col-lg-6 col-md-12 col-12 text-right">
          <input id="busqueda_nombre" align="left" class="float-right ml-2 col-sm-3 col-12 form-control form-control-sm" type='text' name='busqueda' placeholder="nombre">
          <label class="float-right">Buscar por nombre:</label>
        </div>
      </div>

      <div class="row justify-content-between">
        <div class='col-lg-6 col-md-6 col-sm-6 col-12'>
          <h6 class='text-muted mb-lg-3'>Cantidad de Registrados: <strong class='text-dark'><?php //echo $bdd_filas ?></strong></h6>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-6 col-12 text-right'>
            <h6 class='text-muted mb-lg-3' id="paginacion_t"><?php //echo $pagina ?>-<?php //echo $pgn_total ?> / Página:
              <!--<?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                <?php if ($i==$pagina): ?>
                  <a class='text-dark' href='l_usuarios.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["cedula"])){echo "&cedula=&busqueda=".$_GET["busqueda"];}else{echo "&nombre=&busqueda=".$_GET["busqueda"];} } ?>'><strong><?php echo $i ?></strong></a>
                <?php else: ?>
                  <a class='text-dark' href='l_usuarios.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["cedula"])){echo "&cedula=&busqueda=".$_GET["busqueda"];}else{echo "&nombre=&busqueda=".$_GET["busqueda"];} } ?>'><?php echo $i ?></a>
                <?php endif; ?>
              <?php endfor; ?>-->
            </h6>
        </div>
      </div>
      <table class="table p-0 text-center table-striped table-bordered col-12 " style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
        <thead class="thead-success ">
          <tr>
              <th>Cédula</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Nacionalidad</th>
              <th>Télefono 1</th>
              <th>Télefono 2</th>
              <th>Correo</th>
              <th>Modificar</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <!--<?php foreach ($pescador_p as $pescador): ?>
            <tr>
              <th><?php echo $pescador->cedula ?></th>
              <td><?php echo $pescador->nombre ?></td>
              <td><?php echo $pescador->apellido ?></td>
              <td><?php echo $pescador->telefono1 ?></td>
              <td><?php echo $pescador->telefono2 ?></td>
              <td><?php echo $pescador->correo ?></td>
              <td><button class="btn btn-primary" value="Aceptar" href="m_usuarios.php?cedula=<?php echo $pescador->cedula ?>">Aceptar</button></td>
            </tr>
          <?php endforeach; ?>-->               
        </tbody>
      </table>
      <div class="row justify-content-between">
        <div class='col-lg-6 col-md-6 col-sm-12'>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-12 text-right'>
            <h6 class='text-muted mb-lg-3' id="paginacion_b"><?php //echo //$pagina ?>-<?php //echo $pgn_total ?> / Página: 
             <!--<?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                <?php if ($i==$pagina): ?>
                  <a class='text-dark' href='l_usuarios.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["cedula"])){echo "&cedula=&busqueda=".$_GET["busqueda"];}else{echo "&nombre=&busqueda=".$_GET["busqueda"];} } ?>'><strong><?php echo $i ?></strong></a>
                <?php else: ?>
                  <a class='text-dark' href='l_usuarios.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["cedula"])){echo "&cedula=&busqueda=".$_GET["busqueda"];}else{echo "&nombre=&busqueda=".$_GET["busqueda"];} } ?>'><?php echo $i ?></a>
                <?php endif; ?>
              <?php endfor; ?>-->
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

<!-- FIN CONTENEDOR DE LAS OPCIONES -->