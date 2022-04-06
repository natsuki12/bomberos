<?php 
  include("../admin.php");
  include("paginacion.php");
?>
  <script type="text/javascript">
    //$("#topsito").removeClass('d-none');
    $("#nav-documento").addClass('active');
  </script>

    <div class="col-sm-10 col-12 mx-auto ">
    	<h4 class="text-center mt-3">SOLICITUDES REGISTRADAS</h4>
    </div>
    <div class="col-md-10 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
      <h5 class="text-primary mt-4">Listado de Inmuebles Registrados:</h5>
      <div class="row  mb-2">
        <div class="col-12">
          <input id="busqueda_codigo" align="left" class="float-left mx-2 col-sm-3 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="N# de Solicitud">
          <label class="float-left">:Buscar por Código de Solicitud</label>
        </div>
        <div class="col-12 my-2">
          <input id="busqueda_cedula" align="left" class="float-left mx-2 col-sm-3 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="Cédula de Solicitante">
          <label class="float-left">:Buscar por Cédula de Solicitante</label>
        </div>
        <div class="col-12">
          <input id="busqueda_rif" align="left" class="float-left mx-2 col-sm-3 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="RIF del Inmueble">
          <label class="float-left">:Buscar por RIF de Inmueble</label>
        </div>
      </div>

      <div class="row justify-content-between">
        <div class='col-lg-6 col-md-6 col-sm-6 col-12'>
          <h6 class='text-muted mb-lg-3'>Cantidad de Registrados: <strong class='text-dark' id="n-registros"><?php echo $bdd_filas ?></strong></h6>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-6 col-12 text-right'>
            <h6 class='text-muted mb-lg-3' id="paginacion_t"><?php echo $pagina ?>-<?php echo $pgn_total ?> / Página:
              <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                <?php if ($i==$pagina): ?>
                  <a class='text-dark' href='chequear.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["cedula"])){echo "&cedula=&busqueda=".$_GET["busqueda"];} if(isset($_GET["codigo"])){echo "&codigo=&busqueda=".$_GET["busqueda"];} if(isset($_GET["rif"])){echo "&rif=&busqueda=".$_GET["busqueda"];} } ?>'><strong><?php echo $i ?></strong></a>
                <?php else: ?>
                  <a class='text-dark' href='chequear.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["cedula"])){echo "&cedula=&busqueda=".$_GET["busqueda"];} if(isset($_GET["codigo"])){echo "&codigo=&busqueda=".$_GET["busqueda"];} if(isset($_GET["rif"])){echo "&rif=&busqueda=".$_GET["busqueda"];} } ?>'><?php echo $i ?></a>
                <?php endif; ?>
              <?php endfor; ?>
            </h6>
        </div>
      </div>
      <table class="table p-0 text-center table-striped table-bordered col-12 " style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
        <thead class="thead-success ">
          <tr>
              <th>Código</th>
              <th>Solicitante</th>
              <th>Cédula</th>
              <th>Inmueble</th>
              <th>RIF</th>
              <th>Inspector</th>
              <th>Fecha</th>
              <th>Estado</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php foreach ($solicitudes as $solicitud): ?>
            <tr>
              <td><b><?php echo $solicitud->cod_solicitud ?></b></td>
              <td><?php echo $solicitud->nombre." ".$solicitud->apellido; ?></td>
              <td><?php echo $solicitud->cedula ?></td>
              <td><?php echo $solicitud->nombre_inm ?></td>
              <td><?php echo $solicitud->rif ?></td>
              <td><?php echo $solicitud->inspector ?></td>
              <td><?php echo $solicitud->fecha ?></td>
              <td><?php echo $solicitud->estado ?></td>
            </tr>
          <?php endforeach; ?>           
        </tbody>
      </table>
      <div class="row justify-content-between">
        <div class='col-lg-6 col-md-6 col-sm-12'>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-12 text-right'>
            <h6 class='text-muted mb-lg-3' id="paginacion_b"><?php echo $pagina ?>-<?php echo $pgn_total ?> / Página: 
             <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                <?php if ($i==$pagina): ?>
                  <a class='text-dark' href='chequear.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["cedula"])){echo "&cedula=&busqueda=".$_GET["busqueda"];} if(isset($_GET["codigo"])){echo "&codigo=&busqueda=".$_GET["busqueda"];} if(isset($_GET["rif"])){echo "&rif=&busqueda=".$_GET["busqueda"];} } ?>'><strong><?php echo $i ?></strong></a>
                <?php else: ?>
                  <a class='text-dark' href='chequear.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["cedula"])){echo "&cedula=&busqueda=".$_GET["busqueda"];} if(isset($_GET["codigo"])){echo "&codigo=&busqueda=".$_GET["busqueda"];} if(isset($_GET["rif"])){echo "&rif=&busqueda=".$_GET["busqueda"];} } ?>'><?php echo $i ?></a>
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
<!-- FIN CONTENEDOR DE LAS OPCIONES -->

<script type="text/javascript" src="busqueda_solicitud.js"></script>