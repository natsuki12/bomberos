<?php 
  include("../administracion.php");
  include("../config/connect.php");
   include("paginacion_ins.php");
  //include("p_usuarios.php");
?>
  <script type="text/javascript">
    $("#topsito").removeClass('d-none');
    $("#nav-inmuebles").addClass('active');
  </script>

    <div class="col-sm-10 col-12 mx-auto ">
        <img src="../Imagenes/franja.jpg" class="img-fluid">
    	<h4 class="text-center mt-3">INPECCIONES COMPLETADAS</h4>
    </div>
    <div class="col-md-9 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">
      <h5 class="text-primary mt-4">Listado de Inpecciones Según cada Inmueble:</h5>
      <div class="row  mb-2">
        <div class="col-lg-8 col-md-12 col-12">
          <label class="float-left">Buscar por RIF:</label>
          <input id="busqueda_nombre" align="left" class="float-left ml-2 col-sm-3 col-12 form-control form-control-sm" type='text' name='busqueda' placeholder="RIF del Inmueble">
        </div>
      </div>

      <div class="row justify-content-between">
        <div class='col-lg-6 col-md-6 col-sm-6 col-12'>
          <h6 class='text-muted mb-lg-3'>Cantidad de Registrados: <strong class='text-dark'><?php //echo $bdd_filas ?></strong></h6>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-6 col-12 text-right'>
            <h6 class='text-muted mb-lg-3' id="paginacion_t"><?php echo $pagina ?>-<?php echo $pgn_total ?>
              <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                <?php if ($i==$pagina): ?>
                  <a class='text-dark' href='lista_inspecciones.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["rif"])){echo "&rif=&busqueda=".$_GET["rif"];}else{echo "&nombre=&busqueda=".$_GET["busqueda"];} } ?>'><strong><?php echo $i ?></strong></a>
                <?php else: ?>
                  <a class='text-dark' href='lista_inspecciones.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["rif"])){echo "&rif=&busqueda=".$_GET["busqueda"];}else{echo "&nombre=&busqueda=".$_GET["busqueda"];} } ?>'><?php echo $i ?></a>
                <?php endif; ?>
              <?php endfor; ?>
            </h6>
        </div>
      </div>
      <table class="table table-responsive p-0 text-center table-striped table-bordered col-12 " style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
        <thead class="thead-success ">
          <tr>
              <th>Descargar</th>
              <th>RIF</th>
              <th>Nombre</th>
              <th>Metros^2</th>
              <th>Niveles</th>
              <th>Inspector</th>
              <th>Observaciones</th>
              <th>Fecha</th>
              <th>Croquis</th>
          </tr>
        </thead>
        <tbody id="tbody">
                <?php foreach ($inspecciones_p as $inspecciones): ?>
                  <tr>
                     <td><img src="../Imagenes/pdf.png" class="img-fluid pdf" height="50%" width="40%" id="<?php echo $inspecciones->rif ?>"></td>
                     <td><b><?php echo $inspecciones->rif ?></b></td>
                     <td><?php echo $inspecciones->nombre_inm ?></td>
                     <td><?php echo $inspecciones->metros_sqr ?></td>
                     <td><?php echo $inspecciones->piso ?></td>
                     <td><?php echo $inspecciones->nombre_ins ?></td>
                     <td><?php echo $inspecciones->observaciones ?></td>
                     <td><?php echo $inspecciones->fecha ?></td>
                     <td><button class="btn btn-primary croquis" value="Ver" data-toggle="modal" data-target="#croquis" id="<?php echo $inspecciones->rif ?>">Ver</button></td>
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
                  <a class='text-dark' href='lista_inspecciones.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["rif"])){echo "&rif=&busqueda=".$_GET["busqueda"];}else{echo "&nombre=&busqueda=".$_GET["busqueda"];} } ?>'><strong><?php echo $i ?></strong></a>
                <?php else: ?>
                  <a class='text-dark' href='lista_inspecciones.php?pagina=<?php echo $i; if(isset($_GET["busqueda"])){ if(isset($_GET["rif"])){echo "&rif=&busqueda=".$_GET["busqueda"];}else{echo "&nombre=&busqueda=".$_GET["busqueda"];} } ?>'><?php echo $i ?></a>
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

<!-- MODAL PARA CUANDO QUIERA VER AL DETALLE LA INFORMACION DE REDES -->
<div class="modal fade" id="croquis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="height: auto;">
            <div class="modal-header">
                <h5 class="modal-title" id="redes_titulo">Nombre Inmueble<br>Mapa de Croquis:</h5>
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
                    <input type="text" class="form-control" id="croquis_1" readonly="true" name="croquis_1">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">2</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_2" readonly="true" name="croquis_2">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">3</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_3" readonly="true" name="croquis_3">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">4</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_4" readonly="true" name="croquis_4">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">5</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_5" readonly="true" name="croquis_5">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">6</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_6" readonly="true" name="croquis_6">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">7</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_7" readonly="true" name="croquis_7">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">8</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_8" readonly="true" name="croquis_8">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">9</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_9" readonly="true" name="croquis_9">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">10</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_10" readonly="true" name="croquis_10">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">11</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_11" readonly="true" name="croquis_11">
                  </div>
              </li>
                <li class="nav-item mt-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">12</span>
                  </div>
                    <input type="text" class="form-control" id="croquis_12" readonly="true" name="croquis_12">
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

<!-- FIN CONTENEDOR DE LAS OPCIONES -->