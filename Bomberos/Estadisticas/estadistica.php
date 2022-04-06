<?php
	include("../base.php");
	include("../config/connect.php");
	include("sql_estadisticas.php");

	$totales=(array)$total_estilo;
	for ($i=0; $i < count($totales) ; $i++) { 
		switch ($totales[$i]->e_arte) {
			case 1: $escenicos = $totales[$i]->total; break;
			case 2: $literarios = $totales[$i]->total; break;	
			case 3: $musicales = $totales[$i]->total; break;
			case 4: $plasticos = $totales[$i]->total; break;
			default:
				break;
		}
	}
	
	if(isset($_POST["btn-submit"])){
		$censo = $_POST["rcenso"];
		$periodo = $_POST["rperiodo"];
		$ayo = $_POST["rayo"];

		switch ($periodo) {
			case 'Semestral': include("../pdf/SEMESTRAL.php"); break;
			case 'Cuatrimestral': include("../pdf/CUATRIMESTRE.php"); break;
			case 'Trimestral': include("../pdf/TRIMESTRAL.php"); break;
			case 'Bimensual': include("../pdf/BIMESTRE.php"); break;
			case 'Mensual': include("../pdf/MENSUAL.php"); break;
			case 'Diario': include("../pdf/DIARIO.php"); break;
		}
	}
?>	
	<!-- CONTENEDOR DE LA INFORMACION DE ADENTRO -->
	<div class="container-fluid justify-content-center" style="height: 100%" id="main">
	    <div id="solicitud">
	    	<div class="mt-4 col-10 m-auto pt-3 row">
	    		<div class="col-lg-9 col-12 mt-3 d-lg-block d-none topper">
					<span class="text-justify">
						Republica Bolivariana de Venezuela<br>
						Gobierno del Estado Bolivariano de Nueva Esparta<br>
						Dirección del Poder Popular para la Eduación<br>
						Instituto Autonomo para el Desarrollo Cultural del Estado Bolivariano de Nueva Esparta
					</span>
	    		</div>
	    		<div class="col-lg-9 col-12 mt-3 d-lg-none text-center topper">
					<span>
						Republica Bolivariana de Venezuela<br>
						Gobierno del Estado Bolivariano de Nueva Esparta<br>
						Dirección del Poder Popular para la Eduación<br>
						Instituto Autonomo para el Desarrollo Cultural del Estado Bolivariano de Nueva Esparta
					</span>
	    		</div>
	    		<div class="col-lg-3 col-12 mt-lg-0 mt-3 text-center">
	    			<img src="../Imagenes/escudo-512x512.png" class="img-fluid" style="height: 80px">
	    		</div>
	    	</div>
	    	<div class="col-lg-10 mx-auto">
		        <img src="../Imagenes/franja.jpg" class="img-fluid mt-3">
	        </div>

	        <div class="col-12 mx-auto">
	        <h5 class="text-primary text-center mt-4">Estadísticas de Censo de Cultores</h5>
	        	
	        	<!-- CONTENEDOR DE LO DE ADENTRO CON LAS ESTADISTICAS-->
	        	<div class="container">
      
			      <!-- LOS 6 BLOQUES DEL INICIO -->
				      <div class="row justify-content-center my-3">
				          <div class="col-lg-3 col-sm-6 p-2 mx-2 mb-mg-0 mb-sm-2 text-center rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
				            <div class="col-7 float-left mt-4">
				              <p class="display-4 text-primary">
				              	<?php foreach ($total_censado as $censado): ?>
				              		<?php echo $censado->total; ?>
				              	<?php endforeach ?>
				          	  </p>
				            </div>
				            <div class="p-2 col-5 float-left">
				              <img src="../Imagenes/Censados.png" class="img-fluid" style="height: 95px">
				            </div>
				            <div class="col-12 p-0">
				              <span class="text-muted">N# DE PERSONAS CENSADAS</span>
				            </div>
				          </div>
				        <?php foreach ($total_estilo as $estilo): ?>
				          <div class="col-lg-3 col-sm-6 p-2 mx-2 mb-mg-0 mb-sm-2 text-center rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
				            <div class="col-7 float-left mt-4">
				              <p class="display-4 text-primary"><?php echo $estilo->total; ?></p>
				            </div>
				            <div class="p-2 col-5 float-left">
				              <?php switch ($estilo->e_arte) {
				              	case 1:
				              		echo '<img src="../Imagenes/Escenicas.png" class="img-fluid" style="height: 95px">';
				              		break;
				              	
				              	case 4:
				              		echo '<img src="../Imagenes/Plasticos.png" class="img-fluid" style="height: 95px">';
				              		break;

				              	case 2:
				              		echo '<img src="../Imagenes/Literarios.png" class="img-fluid" style="height: 95px">';
				              		break;

				              	case 3:
				              		echo '<img src="../Imagenes/Sonoros.png" class="img-fluid" style="height: 95px">';
				              		break;

				              	default:
				              		# code...
				              		break;
				              } ?>
				            </div>
				            <div class="col-12 p-0">
				              <?php switch ($estilo->e_arte) {
				              	case 1:
				              		echo '<span class="text-muted">N# DE ARTISTAS ESCÉNICOS O VISUALES</span>';
				              		break;
				              	
				              	case 4:
				              		echo '<span class="text-muted">N# DE ARTISTAS PLÁSTICOS</span>';
				              		break;

				              	case 2:
				              		echo '<span class="text-muted">N# DE ARTISTAS LITERARIOS</span>';
				              		break;

				              	case 3:
				              		echo '<span class="text-muted">N# DE ARTISTAS MUSICALES O SONORAS</span>';
				              		break;

				              	default:
				              		# code...
				              		break;
				              } ?>
				            </div>
				          </div>  	
				        <?php endforeach ?>
				      </div>
			      <!-- FIN LOS 6 BLOQUES DEL INICIO -->

			    <!-- BLOQUE PARA GENERAR EL REPORTE -->
			       <div class="col-lg-8 col-md-10 col-sm-11 col-12 mx-auto shadow-sm my-4 py-2 rounded" style="box-shadow: 0px 5px 10px -2px rgba(0,0,0,0.2);">
			      	<form class="m-auto col-12" id="freporte" action="estadistica.php" method="post">
					  <h5 class="text-center mb-3" style="font-size: 1.5em">Generar Reporte</h5>
					  <div class="form-group text-justify col-12 row justify-content-center m-auto">
					    <div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-1">	
						    <label class="text-muted" style="font-size: 1.2em">Censado:</label>
						    <select class="form-control" id="rcenso" name="rcenso">
						    	<option value="">Seleccione un Filtro:</option>
						    	<option value="Cultores">Cultores</option>
	  							<option value="Agrupaciones">Agrupaciones</option>
							</select>
					    </div>
					  	<div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-1">	
						    <label class="text-muted" style="font-size: 1.2em">Año a Evaluar:</label>
						    <input type="number" name="rayo" id="rayo" class="form-control" placeholder="Ingrese el Año" value="<?php echo date('Y') ?>">
					    </div>
					    <div class="col-lg-6 col-md-10 col-sm-6 col-12 mb-1">	
						    <label class="text-muted" style="font-size: 1.2em">Período:</label>
						    <select class="form-control" id="rperiodo" name="rperiodo">
						    	<option value="">Seleccione el Período:</option>
						    	<option value="Semestral">Semestral</option>
	  							<option value="Cuatrimestral">Cuatrimestral</option>
	  							<option value="Trimestral">Trimestral</option>
	  							<option value="Bimensual">Bimensual</option>
	  							<option value="Mensual">Mensual</option>
	  							<option value="Diario">Diario (Días de la Semana)</option>
							</select>
					    </div>
					  </div>
					  <div class="form-group text-center col-12 mt-2">
						  <button type="submit" class="btn btn-success" name="btn-submit">Enviar</button>
					  </div>
					</form>
			       </div>
			    <!-- FIN BLOQUE PARA GENERAR EL REPORTE -->

			    <!-- RONDA DE CONTADORES ESPECIFICOS -->
			       <div class="row justify-content-center my-3">

			       	<!-- CONTADOR ESPECIFICOS DE TIPOS DE PERSONAS POR ARTE PLASTICA -->
			       	<?php if(isset($plasticos)): ?>
				       <div class="shadow mb-4 col-lg-6 col-md-10 col-sm-6">
		                <div class="card-header py-3">
		                  <h6 class="m-0 font-weight-bold" style="color: #333333">Personas Censadas / Artes Plásticas:</h6>
		                </div>
		                <div class="card-body border">
		                  <?php foreach ($total_tipo as $tipo): ?>
			       			<?php if ($tipo->estilo == 4) {
			       				$porcentaje = $tipo->total*100/$plasticos;
			       				echo '<h4 class="small font-weight-bold ">'.$tipo->tipo_nombre.' <span class="float-right">'.$tipo->total.'</span></h4>
					                  <div class="progress mb-4">
					                    <div class="progress-bar" role="progressbar" style="width: '.$porcentaje.'%; background-color: #FFEC0E" aria-valuenow="'.$tipo->total.'" aria-valuemin="0" aria-valuemax="'.$plasticos.'"></div>
					                  </div>';
			       			} ?>
			       		  <?php endforeach ?>
		                  <h4 class="small font-weight-bold">Total de Artistas Plásticos <span class="float-right"><?php echo $plasticos; ?></span></h4>
		                  <div class="progress">
		                    <div class="progress-bar" role="progressbar" style="width: 100%; background-color: green" aria-valuenow="100" aria-valuemin="0" aria-valuemax="<?php echo $plasticos ?>"></div>
		                  </div>
		                </div>
		               </div>
		            <?php endif; ?>
		            <!-- FIN CONTADOR ESPECIFICOS DE TIPOS DE PERSONAS POR ARTE PLASTICA -->

		            <!-- CONTADOR ESPECIFICOS DE TIPOS DE PERSONAS POR ARTE LITERARIAS -->
		            <?php if(isset($literarios)): ?>
				       <div class="shadow mb-4 col-lg-6 col-md-10 col-sm-6">
		                <div class="card-header py-3">
		                  <h6 class="m-0 font-weight-bold" style="color: #333333">Personas Censadas / Artes Literarias:</h6>
		                </div>
		                <div class="card-body border">
		                  <?php foreach ($total_tipo as $tipo): ?>
			       			<?php if ($tipo->estilo == 2) {
			       				$porcentaje = $tipo->total*100/$literarios;
			       				echo '<h4 class="small font-weight-bold ">'.$tipo->tipo_nombre.' <span class="float-right">'.$tipo->total.'</span></h4>
					                  <div class="progress mb-4">
					                    <div class="progress-bar" role="progressbar" style="width: '.$porcentaje.'%; background-color: #FFEC0E" aria-valuenow="'.$tipo->total.'" aria-valuemin="0" aria-valuemax="'.$literarios.'"></div>
					                  </div>';
			       			} ?>
			       		  <?php endforeach ?>
		                  <h4 class="small font-weight-bold">Total de Artistas Literario <span class="float-right"><?php echo $literarios; ?></span></h4>
		                  <div class="progress">
		                    <div class="progress-bar" role="progressbar" style="width: 100%; background-color: green" aria-valuenow="100" aria-valuemin="0" aria-valuemax="<?php echo $literarios ?>"></div>
		                  </div>
		                </div>
		               </div>
		            <?php endif; ?>
		            <!-- FIN CONTADOR ESPECIFICOS DE TIPOS DE PERSONAS POR ARTE LITERIA -->

		            <!-- CONTADOR ESPECIFICOS DE TIPOS DE PERSONAS POR ARTE MUSICAL -->
		            <?php if(isset($musicales)): ?>
				       <div class="shadow mb-4 col-lg-6 col-md-10 col-sm-6">
		                <div class="card-header py-3">
		                  <h6 class="m-0 font-weight-bold" style="color: #333333">Personas Censadas / Artes Musicales o Sonoras:</h6>
		                </div>
		                <div class="card-body border">
		                  <?php foreach ($total_tipo as $tipo): ?>
			       			<?php if ($tipo->estilo == 3) {
			       				$porcentaje = $tipo->total*100/$musicales;
			       				echo '<h4 class="small font-weight-bold ">'.$tipo->tipo_nombre.' <span class="float-right">'.$tipo->total.'</span></h4>
					                  <div class="progress mb-4">
					                    <div class="progress-bar" role="progressbar" style="width: '.$porcentaje.'%; background-color: #FFEC0E" aria-valuenow="'.$tipo->total.'" aria-valuemin="0" aria-valuemax="'.$musicales.'"></div>
					                  </div>';
			       			} ?>
			       		  <?php endforeach ?>
		                  <h4 class="small font-weight-bold">Total de Artistas Musicales o Sonoras <span class="float-right"><?php echo $musicales; ?></span></h4>
		                  <div class="progress">
		                    <div class="progress-bar" role="progressbar" style="width: 100%; background-color: green/*#2E3192*/" aria-valuenow="100" aria-valuemin="0" aria-valuemax="<?php echo $musicales ?>"></div>
		                  </div>
		                </div>
		               </div>
		            <?php endif; ?>
		            <!-- FIN CONTADOR ESPECIFICOS DE TIPOS DE PERSONAS POR ARTE MUSICA -->

		            <!-- CONTADOR ESPECIFICOS DE TIPOS DE PERSONAS POR ARTE ESCENIA O VISUAL -->
		            <?php if(isset($escenicos)): ?>
				       <div class="shadow mb-4 col-lg-6 col-md-10 col-sm-6">
		                <div class="card-header py-3">
		                  <h6 class="m-0 font-weight-bold" style="color: #333333">Personas Censadas / Artes Escénicas o Visuales:</h6>
		                </div>
		                <div class="card-body border">
		                  <?php foreach ($total_tipo as $tipo): ?>
			       			<?php if ($tipo->estilo == 1) {
			       				$porcentaje = $tipo->total*100/$escenicos;
			       				echo '<h4 class="small font-weight-bold ">'.$tipo->tipo_nombre.' <span class="float-right">'.$tipo->total.'</span></h4>
					                  <div class="progress mb-4">
					                    <div class="progress-bar" role="progressbar" style="width: '.$porcentaje.'%; background-color: #FFEC0E" aria-valuenow="'.$tipo->total.'" aria-valuemin="0" aria-valuemax="'.$escenicos.'"></div>
					                  </div>';
			       			} ?>
			       		  <?php endforeach ?>
		                  <h4 class="small font-weight-bold">Total de Artistas Escénicos o Visuales <span class="float-right"><?php echo $escenicos; ?></span></h4>
		                  <div class="progress">
		                    <div class="progress-bar" role="progressbar" style="width: 100%; background-color: green" aria-valuenow="100" aria-valuemin="0" aria-valuemax="<?php echo $escenicos ?>"></div>
		                  </div>
		                </div>
		               </div>
		            <?php endif; ?>
		            <!-- FIN CONTADOR ESPECIFICOS DE TIPOS DE PERSONAS POR ARTE ESCENICA O VISUAL -->

		            <!-- CONTENEDDOR YA POR AGRUPACION O PERSONAS POR MESES -->
		            	<div class="col-lg-6 col-md-10 col-sm-12 mt-2">
			              <div class="card rounded">
			              	  <div class="card-header py-3">
				                <h6 class="m-0 font-weight-bold" style="color: #333333">N# de Censados por Mes: 
	                              	<select id="m_estadistica" class="font-weight-bold" style="background-color: transparent; border:0;">
	                              		<option value="">Opción</option>
	                              		<option value="1">Cultores</option>
	                              		<option value="2">Agrupaciones</option>
	                              	</select>
                              	</h6>
				              </div>
			                  <div class="card-body px-1" id="canva_mes">
			                      <canvas id="total_mes"></canvas>
			                  </div>
			              </div>
			            </div>
		            <!-- FIN CONTENEDDOR YA POR AGRUPACION O PERSONAS POR MESES -->

		            <!-- CONTENEDDOR YA POR AGRUPACION O PERSONAS POR DIA -->
		            	<div class="col-lg-6 col-md-10 col-sm-12 mt-2">
			              <div class="card rounded">
			                  <div class="card-header py-3">
				                <h6 class="m-0 font-weight-bold" style="color: #333333">N# de Censados por Día: 
	                              	<select id="d_estadistica" class="font-weight-bold" style="background-color: transparent; border:0;">
	                              		<option value="">Opción</option>
	                              		<option value="1">Cultores</option>
	                              		<option value="2">Agrupaciones</option>
	                              	</select>
                              	</h6>
				              </div>
			                  <div class="card-body px-1" id="canva_dia">
			                      <canvas id="total_dia"></canvas>
			                  </div>
			              </div>
			            </div>
		            <!-- FIN CONTENEDDOR YA POR AGRUPACION O PERSONAS POR DIA -->

	               </div>
	            <!-- FIN RONDA DE CONTADORES ESPECIFICOS -->

			  	</div>
			  	<!-- FIN CONTENEDOR DONDE ESTAN LOS ESTADISTICOS -->

	        </div>
	    </div>
	</div>

    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>

<script type="text/javascript" src="../js/validaciones.js"></script>

<?php include("charts_estadisticas.php"); ?>