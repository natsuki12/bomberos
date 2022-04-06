<?php
	$filas=5;
	$pagina2=1;
	if(isset($_GET["pagina2"])){
		if ($_GET["pagina2"]!=1) {
			$pagina2=$_GET["pagina2"];
		}elseif ($_GET["pagina2"]<=1) {
			$pagina2=1;
		}
	}

	if (isset($_GET["solicitud"])) {
		$solicitud = $_GET["solicitud"];
	}

	if($solicitud==1){
		if (isset($_GET["busqueda2"])) {
			require("../../config/connect.php");
			$cedula = $_GET["cedula"];
			$busqueda=$_GET["busqueda2"];
			$empezar=($pagina2-1)*$filas;
			////////BUSQUEDA POR RIF
			$sql="SELECT * FROM `solicitud`
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspector = :cedula AND metodo = 'Pago Normal' AND rif LIKE :busqueda
				AND cod_solicitud NOT IN (SELECT cod_solicitud FROM inspeccion) ORDER BY fecha";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%", ":cedula"=>$cedula));
			$bdd_filas2=$query->rowCount();
			$pgn_total2=ceil($bdd_filas2/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM `solicitud`
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspector = :cedula AND metodo = 'Pago Normal' AND rif LIKE :busqueda
				AND cod_solicitud NOT IN (SELECT cod_solicitud FROM inspeccion) 
				ORDER BY fecha LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%", ":cedula"=>$cedula));
			$inspeccion_normal=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$inspeccion_normal=(array)$inspeccion_normal;
				$inspeccion_normal[]=$bdd_filas2;
				$inspeccion_normal[]=$busqueda;
				$inspeccion_normal[]=$pagina2;
				$inspeccion_normal[]=$pgn_total2;
				echo json_encode($inspeccion_normal);
			}
		}else{
			$empezar=($pagina2-1)*$filas;
			//PAGO NORMAL
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspector = :cedula AND metodo = 'Pago Normal' 
				AND cod_solicitud NOT IN (SELECT cod_solicitud FROM inspeccion) ORDER BY fecha";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$u_nombre));
			$bdd_filas2=$query->rowCount();
			$pgn_total2=ceil($bdd_filas2/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspector = :cedula AND metodo = 'Pago Normal' 
				AND cod_solicitud NOT IN (SELECT cod_solicitud FROM inspeccion) 
				ORDER BY fecha LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$u_nombre));
			$inspeccion_normal=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
		}
	}
	else{
		if (isset($_GET["busqueda2"])) {
			require("../../config/connect.php");
			$cedula = $_GET["cedula"];
			$busqueda=$_GET["busqueda2"];
			$empezar=($pagina2-1)*$filas;
			////////BUSQUEDA POR RIF
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inspeccion ON solicitud.cod_solicitud = inspeccion.cod_solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspeccion.inspector = :cedula AND metodo = 'Pago Normal' AND rif LIKE :busqueda
				ORDER BY inspeccion.fecha";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%", ":cedula"=>$cedula));
			$bdd_filas2=$query->rowCount();
			$pgn_total2=ceil($bdd_filas2/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inspeccion ON solicitud.cod_solicitud = inspeccion.cod_solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspeccion.inspector = :cedula AND metodo = 'Pago Normal' AND rif LIKE :busqueda
				ORDER BY inspeccion.fecha LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%", ":cedula"=>$cedula));
			$inspeccion_normal=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$inspeccion_normal=(array)$inspeccion_normal;
				$inspeccion_normal[]=$bdd_filas2;
				$inspeccion_normal[]=$busqueda;
				$inspeccion_normal[]=$pagina2;
				$inspeccion_normal[]=$pgn_total2;
				echo json_encode($inspeccion_normal);
			}
		}else{
			$empezar=($pagina2-1)*$filas;
			//PAGO NORMAL
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inspeccion ON solicitud.cod_solicitud = inspeccion.cod_solicitud
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				WHERE inspeccion.inspector = :cedula AND metodo = 'Pago Normal' 
				ORDER BY inspeccion.fecha";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$u_nombre));
			$bdd_filas2=$query->rowCount();
			$pgn_total2=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM `solicitud` 
				INNER JOIN inspeccion ON solicitud.cod_solicitud = inspeccion.cod_solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble
				WHERE inspeccion.inspector = :cedula AND metodo = 'Pago Normal' 
				ORDER BY inspeccion.fecha LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$u_nombre));
			$inspeccion_normal=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
		}
	}
?>