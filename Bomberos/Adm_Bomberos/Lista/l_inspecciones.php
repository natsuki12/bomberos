<?php 
  include("../admin.php");
  include("../../config/connect.php");
  
  $solicitud = 1;
  if (isset($_GET["forma"])) {
      $solicitud = $_GET["forma"];
  }
  include("paginacion.php");
  include("paginacion2.php");
?>
  <script type="text/javascript">
    //$("#topsito").removeClass('d-none');
    $("#nav-inspeccion").addClass('active');
  </script>

    <div class="col-sm-10 col-12 mx-auto ">
      <img src="../../Imagenes/franja.jpg" class="img-fluid">
    	<h4 class="text-center mt-3">INSPECCIONES</h4>
    </div>
    <div class="row justify-content-center col-md-9 col-sm-11 col-12 mx-auto">
      <?php if ($solicitud==1): ?>  
        <div class="col-3 text-center">
            <button class="btn btn-secondary disabled">Pendientes</button>
        </div>
        <div class="col-3 text-center">
          <form action="l_inspecciones.php" method="get">
            <button class="btn btn-secondary" type="submit" value="2" name="forma">Finalizadas</button>
          </form>
        </div>
      <?php else: ?>
        <div class="col-3 text-center">
          <form action="l_inspecciones.php" method="get">
            <button class="btn btn-secondary" type="submit" value="1" name="forma">Pendientes</button>
          </form>
        </div>
        <div class="col-3 text-center">
          <button class="btn btn-secondary disabled">Finalizadas</button>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-md-9 col-sm-11 col-12 mx-auto shadow-sm my-3 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2); background-color: white">

      <!-- INSPECCIONES POR PAGO EXPRESS -->
        <h4 class="text-center mt-3">Pago Express</h4>
        <h5 class="text-primary mt-4">Listado de Inpecciones Por Pago Express:</h5>
        <div class="row  mb-2">
          <div class="col-lg-8 col-md-12 col-12">
            <label class="float-left">Buscar por RIF:</label>
            <input id="busqueda_express" align="left" class="float-left ml-2 col-sm-3 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="RIF del Inmueble">
          </div>
        </div>

        <div class="row justify-content-between">
          <div class='col-lg-6 col-md-6 col-sm-6 col-12'>
            <h6 class='text-muted mb-lg-3'>Cantidad de Registrados: <strong class='text-dark' id="n-registros1"><?php echo $bdd_filas ?></strong></h6>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-6 col-12 text-right'>
              <h6 class='text-muted mb-lg-3' id="paginacion_t1"><?php echo $pagina ?>-<?php echo $pgn_total ?> / Página:
                <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                  <?php if ($i==$pagina): ?>
                    <a class='text-dark' href='l_inspecciones.php?pagina=<?php echo $i; if(isset($_GET["forma"])){ echo "&forma=".$_GET["forma"];} if(isset($_GET["busqueda"])){ echo "&busqueda=".$_GET["busqueda"];} if(isset($_GET["pagina2"])){ echo "&pagina2=".$_GET["pagina2"];} if(isset($_GET["cedula"])) echo "&cedula=".$_GET["cedula"]; ?>'><strong><?php echo $i ?></strong></a>
                  <?php else: ?>
                    <a class='text-dark' href='l_inspecciones.php?pagina=<?php echo $i; if(isset($_GET["forma"])){ echo "&forma=".$_GET["forma"];} if(isset($_GET["busqueda"])){ echo "&busqueda=".$_GET["busqueda"];} if(isset($_GET["pagina2"])){ echo "&pagina2=".$_GET["pagina2"];} if(isset($_GET["cedula"])) echo "&cedula=".$_GET["cedula"]; ?>'><?php echo $i ?></a>
                  <?php endif; ?>
                <?php endfor; ?>
              </h6>
          </div>
        </div>
        <table class="table table-responsive p-0 text-center table-striped table-bordered col-12" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
          <thead class="thead-success ">
            <tr>
              <?php if ($solicitud==2): ?>
                <th>Descargar</th>
              <th>Codigo Inspección</th>
              <?php else: ?>
                <th>Codigo Solicitud</th>
              <?php endif; ?>
                <th>RIF</th>
                <th>Nombre</th>
                <th>Metros^2</th>
                <th>Niveles</th>
                <th>Inspector</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Dirección</th>
              <?php if ($solicitud==1): ?>
                <th>Registrar</th>
              <?php endif ?>
              <?php if ($solicitud==2): ?>
                <th>Reinspeccionar</th>
                <th>Modificar</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody id="tbody1">
            <?php foreach ($inspeccion_express as $inspeccion): ?>
              <tr>
                <?php if ($solicitud==2): ?>
                  <td><img src="../../Imagenes/pdf.png" class="img-fluid pdf" height="50%" width="40%" onclick="pdf(<?php echo $inspeccion->cod_inspeccion ?>)"></td>
                <td><b><?php echo $inspeccion->cod_inspeccion ?></b></td>
                <?php else: ?>
                  <td><b><?php echo $inspeccion->cod_solicitud ?></b></td>
                <?php endif; ?>
                  <td><?php echo $inspeccion->rif ?></td>
                  <td><?php echo $inspeccion->nombre_inm ?></td>
                  <td><?php echo $inspeccion->metros_sqr ?></td>
                  <td><?php echo $inspeccion->piso ?></td>
                  <td><?php echo $inspeccion->inspector ?></td>
                  <td><?php echo $inspeccion->estado ?></td>
                  <td><?php echo $inspeccion->fecha ?></td>
                  <td><a class="text-primary" onclick="direccion(<?php echo $inspeccion->croquis_cod ?>)" style="cursor: pointer">Croquis</a></button></td>
                <?php if ($solicitud==1): ?>  
                  <td><button class="btn btn-primary registrar" value="Ver" onclick="registrar(<?php echo $inspeccion->cod_solicitud ?>)">Enviar</button></td>
                <?php endif; ?>
                <?php if ($solicitud==2): ?>
                  <td><button class="btn btn-primary reinspeccionar" value="Ver" onclick="registrar(<?php echo $inspeccion->cod_solicitud ?>)">Enviar</button></td>
                  <td><button class="btn btn-primary modificar" value="Ver" onclick="modificar(<?php echo $inspeccion->cod_inspeccion ?>)">Enviar</button></td>
                <?php endif; ?>
              </tr>           
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="row justify-content-between">
          <div class='col-lg-6 col-md-6 col-sm-12'>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-12 text-right'>
              <h6 class='text-muted mb-lg-3' id="paginacion_b1"><?php echo $pagina ?>-<?php echo $pgn_total ?> / Página: 
               <?php for ($i=1; $i < $pgn_total+1 ; $i++): ?>
                  <?php if ($i==$pagina): ?>
                    <a class='text-dark' href='l_inspecciones.php?pagina=<?php echo $i; if(isset($_GET["forma"])){ echo "&forma=".$_GET["forma"];} if(isset($_GET["busqueda"])) echo "&busqueda=".$_GET["busqueda"]; if(isset($_GET["pagina2"])) echo "&pagina2=".$_GET["pagina2"]; if(isset($_GET["cedula"])) echo "&cedula=".$_GET["cedula"]; ?>'><strong><?php echo $i ?></strong></a>
                  <?php else: ?>
                    <a class='text-dark' href='l_inspecciones.php?pagina=<?php echo $i; if(isset($_GET["forma"])){ echo "&forma=".$_GET["forma"];} if(isset($_GET["busqueda"])) echo "&busqueda=".$_GET["busqueda"]; if(isset($_GET["pagina2"])) echo "&pagina2=".$_GET["pagina2"]; if(isset($_GET["cedula"])) echo "&cedula=".$_GET["cedula"]; ?>'><?php echo $i ?></a>
                  <?php endif; ?>
                <?php endfor; ?>
              </h6>
          </div>
        </div>
      <!-- FIN INSPECCION POR PAGO EXPRESS -->

      <!-- SEPARADOR -->
      <img src="../../Imagenes/franja.jpg" class="img-fluid my-5">

      <!-- INSPECCIONES POR PAGO NORMAL -->
        <h4 class="text-center">Pago Normal</h4>
        <h5 class="text-primary mt-4">Listado de Inpecciones Por Pago Normal:</h5>
        <div class="row  mb-2">
          <div class="col-lg-8 col-md-12 col-12">
            <label class="float-left">Buscar por RIF:</label>
            <input id="busqueda_normal" align="left" class="float-left ml-2 col-sm-3 col-12 form-control form-control-sm" type='number' name='busqueda' placeholder="RIF del Inmueble">
          </div>
        </div>

        <div class="row justify-content-between">
          <div class='col-lg-6 col-md-6 col-sm-6 col-12'>
            <h6 class='text-muted mb-lg-3'>Cantidad de Registrados: <strong class='text-dark' id="n-registros2"><?php echo $bdd_filas2 ?></strong></h6>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-6 col-12 text-right'>
              <h6 class='text-muted mb-lg-3' id="paginacion_t2"><?php echo $pagina2 ?>-<?php echo $pgn_total2 ?> / Página:
                <?php for ($i=1; $i < $pgn_total2+1 ; $i++): ?>
                  <?php if ($i==$pagina2): ?>
                    <a class='text-dark' href='l_inspecciones.php?pagina2=<?php echo $i; if(isset($_GET["forma"])){ echo "&forma=".$_GET["forma"];} if(isset($_GET["busqueda2"])) echo "&busqueda2=".$_GET["busqueda2"]; if(isset($_GET["pagina"])) echo "&pagina=".$_GET["pagina"]; if(isset($_GET["cedula"])) echo "&cedula=".$_GET["cedula"]; ?>'><strong><?php echo $i ?></strong></a>
                  <?php else: ?>
                    <a class='text-dark' href='l_inspecciones.php?pagina2=<?php echo $i; if(isset($_GET["forma"])){ echo "&forma=".$_GET["forma"];} if(isset($_GET["busqueda2"])) echo "&busqueda2=".$_GET["busqueda2"]; if(isset($_GET["pagina"])) echo "&pagina=".$_GET["pagina"]; if(isset($_GET["cedula"])) echo "&cedula=".$_GET["cedula"]; ?>'><?php echo $i ?></a>
                  <?php endif; ?>
                <?php endfor; ?>
              </h6>
          </div>
        </div>
        <table class="table table-responsive p-0 text-center table-striped table-bordered col-12 " style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
          <thead class="thead-success ">
            <tr>
              <?php if ($solicitud==2): ?>
                <th>Descargar</th>
                <th>Codigo Inspección</th>
              <?php else: ?>
                <th>Codigo Solicitud</th>
              <?php endif; ?>
                <th>RIF</th>
                <th>Nombre</th>
                <th>Metros^2</th>
                <th>Niveles</th>
                <th>Inspector</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Dirección</th>
              <?php if ($solicitud==1): ?>
                <th>Registrar</th>
              <?php endif ?>
              <?php if ($solicitud==2): ?>
                <th>Reinspeccionar</th>
                <th>Modificar</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody id="tbody2">
            <?php foreach ($inspeccion_normal as $inspeccion): ?>
              <tr>
                <?php if ($solicitud==2): ?>
                  <td><img src="../../Imagenes/pdf.png" class="img-fluid pdf" height="50%" width="40%" onclick="pdf(<?php echo $inspeccion->cod_inspeccion ?>)"></td>
                  <td><b><?php echo $inspeccion->cod_inspeccion ?></b></td>
                <?php else: ?>
                  <td><b><?php echo $inspeccion->cod_solicitud ?></b></td>
                <?php endif; ?>
                  <td><?php echo $inspeccion->rif ?></td>
                  <td><?php echo $inspeccion->nombre_inm ?></td>
                  <td><?php echo $inspeccion->metros_sqr ?></td>
                  <td><?php echo $inspeccion->piso ?></td>
                  <td><?php echo $inspeccion->inspector ?></td>
                  <td><?php echo $inspeccion->estado ?></td>
                  <td><?php echo $inspeccion->fecha ?></td>
                  <td><a class="text-primary" onclick="direccion(<?php echo $inspeccion->croquis_cod ?>)" style="cursor: pointer">Croquis</a></button></td>
                <?php if ($solicitud==1): ?>  
                  <td><button class="btn btn-primary registrar" value="Ver" onclick="registrar(<?php echo $inspeccion->cod_solicitud ?>)">Enviar</button></td>
                <?php endif; ?>
                <?php if ($solicitud==2): ?>
                  <td><button class="btn btn-primary reinspeccionar" value="Ver" onclick="registrar(<?php echo $inspeccion->cod_solicitud ?>)">Enviar</button></td>
                  <td><button class="btn btn-primary modificar" value="Ver" onclick="modificar(<?php echo $inspeccion->cod_inspeccion ?>)">Enviar</button></td>
                <?php endif; ?>
              </tr>           
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="row justify-content-between">
          <div class='col-lg-6 col-md-6 col-sm-12'>
          </div>
          <div class='col-lg-6 col-md-6 col-sm-12 text-right'>
              <h6 class='text-muted mb-lg-3' id="paginacion_b2"><?php echo $pagina2 ?>-<?php echo $pgn_total2 ?> / Página: 
               <?php for ($i=1; $i < $pgn_total2+1 ; $i++): ?>
                  <?php if ($i==$pagina2): ?>
                    <a class='text-dark' href='l_inspecciones.php?pagina2=<?php echo $i; if(isset($_GET["forma"])){ echo "&forma=".$_GET["forma"];} if(isset($_GET["busqueda2"])) echo "&busqueda2=".$_GET["busqueda2"]; if(isset($_GET["pagina"])) echo "&pagina=".$_GET["pagina"]; if(isset($_GET["cedula"])) echo "&cedula=".$_GET["cedula"]; ?>'><strong><?php echo $i ?></strong></a>
                  <?php else: ?>
                    <a class='text-dark' href='l_inspecciones.php?pagina2=<?php echo $i; if(isset($_GET["forma"])){ echo "&forma=".$_GET["forma"];} if(isset($_GET["busqueda2"])) echo "&busqueda2=".$_GET["busqueda2"]; if(isset($_GET["pagina"])) echo "&pagina=".$_GET["pagina"]; if(isset($_GET["cedula"])) echo "&cedula=".$_GET["cedula"]; ?>'><?php echo $i ?></a>
                  <?php endif; ?>
                <?php endfor; ?>
              </h6>
          </div>
        </div>
      <!-- FIN INSPECCION POR PAGO NORMAL -->
    </div>
<!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
  </div>
</div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
    <!-- CEDULA DEL INSPECTOR -->
    <input type="hidden" name="cedula-ins" id="cedula-ins" value="<?php echo $u_nombre ?>">
    <!-- FORMA DE LA SOLICITUD -->
    <input type="hidden" name="solicitud" id="forma-solicitud" value="<?php echo $solicitud ?>">
    <!-- N PAGINA DE EXPRESS -->
    <input type="hidden" name="n_pag" id="n_pag" value="<?php echo $pagina ?>">
    <!-- N PAGINA DE NORMAL -->
    <input type="hidden" name="n_pag2" id="n_pag2" value="<?php echo $pagina2 ?>">
</body>
</html>

<!-- MODAL PARA CUANDO QUIERA VER AL DETALLE LA INFORMACION DE REDES -->
  <div class="modal fade" id="croquis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content" style="height: auto;">
              <div class="modal-header">
                  <h5 class="modal-title" id="redes_titulo">Mapa de Croquis:</h5>
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
                <?php for ($i = 1; $i <= 12; $i++): ?>
                  <?php if ($i==1): ?>
                    <li class="nav-item">
                  <?php else: ?>
                    <li class="nav-item mt-1">
                  <?php endif ?>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><?php echo $i ?></span>
                      </div>
                        <input type="text" class="form-control" id="croquis_<?php echo $i ?>" readonly="true" name="croquis_<?php echo $i ?>">
                      </div>
                    </li>
                <?php endfor; ?>
                </ul>
              </div>
            </div>
          </div>
        <!-- FIN INFORMACION DE CROQUIS -->
              </div>
          </div>
      </div>
  </div>
<!-- FIN MODAL DE CROQUIS -->

<!-- FIN CONTENEDOR DE LAS OPCIONES -->

<script type="text/javascript" src="busqueda_inspeccion.js"></script>

<script type="text/javascript">
  //FUNCION PARA ACOMODAR EL CROQUIS
    function direccion(id){
      var codigo = id;
      $.ajax({
        url: 'busqueda_croquis.php',
        type: 'post',
        data: {code: codigo},
      })
      .done(function(datos) {
        console.log("success");
        var croquis=JSON.parse(datos);
        for (var i = 1; i <= 12; i++) {
          $("#croquis_"+i).val(croquis[0]["calle"+i]);
        }
        $("#croquis").modal("show");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    }
  //FIN CROQUIS

  //FUNCION PARA ENVIAR A REGISTRAR UNA NUEVA INSPECCION O UNA REINSPECCION
    function registrar(id){
      var codigo = id; //CODIGO DE SOLICITUD
      location.href = "../Registrar/r_inspecciones.php?solicitud="+codigo;
    }
  //FIN REGISTRAR

  //FUNCION PARA ENVIAR A MODIFICAR UNA INSPECCION
    function modificar(id){
      var codigo = id; //CODIGO DE SOLICITUD
      location.href = "../Modificar/m_inspecciones.php?inspeccion="+codigo;
    }
  //FIN REGISTRAR
</script>