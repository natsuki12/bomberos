<?php
	$filas=5;
	$pagina=1;
	if(isset($_GET["pagina"])){
		if ($_GET["pagina"]!=1) {
			$pagina=$_GET["pagina"];
		}elseif ($_GET["pagina"]<=1) {
			$pagina=1;
		}
	}

	if (isset($_GET["solicitud"])) {
		$solicitud = $_GET["solicitud"];
	}

	if($solicitud==1){
		if (isset($_GET["busqueda"])) {
			require("../../config/connect.php");
			$cedula = $_GET["cedula"];
			$busqueda=$_GET["busqueda"];
			$empezar=($pagina-1)*$filas;
			////////BUSQUEDA POR RIF
			$sql="SELECT * FROM `solicitud`
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspector = :cedula AND metodo = 'Pago Express' AND rif LIKE :busqueda
				AND cod_solicitud NOT IN (SELECT cod_solicitud FROM inspeccion) ORDER BY fecha";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%", ":cedula"=>$cedula));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM `solicitud`
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspector = :cedula AND metodo = 'Pago Express' AND rif LIKE :busqueda
				AND cod_solicitud NOT IN (SELECT cod_solicitud FROM inspeccion) 
				ORDER BY fecha LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%", ":cedula"=>$cedula));
			$inspeccion_express=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$inspeccion_express=(array)$inspeccion_express;
				$inspeccion_express[]=$bdd_filas;
				$inspeccion_express[]=$busqueda;
				$inspeccion_express[]=$pagina;
				$inspeccion_express[]=$pgn_total;
				echo json_encode($inspeccion_express);
			}
		}else{
			$empezar=($pagina-1)*$filas;
			//PAGO EXPRESS
			$sql="SELECT * FROM `solicitud`
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspector = :cedula AND metodo = 'Pago Express' 
				AND cod_solicitud NOT IN (SELECT cod_solicitud FROM inspeccion) ORDER BY fecha";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$u_nombre));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspector = :cedula AND metodo = 'Pago Express' 
				AND cod_solicitud NOT IN (SELECT cod_solicitud FROM inspeccion) 
				ORDER BY fecha LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$u_nombre));
			$inspeccion_express=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
		}
	}
	else{
		if (isset($_GET["busqueda"])) {
			require("../../config/connect.php");
			$cedula = $_GET["cedula"];
			$busqueda=$_GET["busqueda"];
			$empezar=($pagina-1)*$filas;
			////////BUSQUEDA POR RIF
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inspeccion ON solicitud.cod_solicitud = inspeccion.cod_solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspeccion.inspector = :cedula AND metodo = 'Pago Express' AND rif LIKE :busqueda
				ORDER BY inspeccion.fecha";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%", ":cedula"=>$cedula));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inspeccion ON solicitud.cod_solicitud = inspeccion.cod_solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspeccion.inspector = :cedula AND metodo = 'Pago Express' AND rif LIKE :busqueda
				ORDER BY inspeccion.fecha LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%", ":cedula"=>$cedula));
			$inspeccion_express=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$inspeccion_express=(array)$inspeccion_express;
				$inspeccion_express[]=$bdd_filas;
				$inspeccion_express[]=$busqueda;
				$inspeccion_express[]=$pagina;
				$inspeccion_express[]=$pgn_total;
				echo json_encode($inspeccion_express);
			}
		}else{
			$empezar=($pagina-1)*$filas;
			//PAGO EXPRESS
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inspeccion ON solicitud.cod_solicitud = inspeccion.cod_solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspeccion.inspector = :cedula AND metodo = 'Pago Express' 
				ORDER BY inspeccion.fecha";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$u_nombre));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inspeccion ON solicitud.cod_solicitud = inspeccion.cod_solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspeccion.inspector = :cedula AND metodo = 'Pago Express' 
				ORDER BY inspeccion.fecha LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$u_nombre));
			$inspeccion_express=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
		}
	}
?>