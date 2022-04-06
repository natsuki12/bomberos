<?php
	require("../../config/connect.php");

	$filas=15;
	$pagina=1;
	if(isset($_GET["pagina"])){
		if ($_GET["pagina"]!=1) {
			$pagina=$_GET["pagina"];
		}elseif ($_GET["pagina"]<=1) {
			$pagina=1;
		}
	}

	if (isset($_GET["busqueda"])) {
		$busqueda=$_GET["busqueda"];
		$empezar=($pagina-1)*$filas;
		if (isset($_GET["codigo"])) {
			////////BUSQUEDA POR CODIGO DE SOLICITUD
			$sql="SELECT * FROM solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula
				WHERE cod_solicitud LIKE :busqueda";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula
				WHERE cod_solicitud LIKE :busqueda LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$solicitudes=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$solicitudes=(array)$solicitudes;
				$solicitudes[]=$bdd_filas;
				$solicitudes[]=$busqueda;
				$solicitudes[]=$pagina;
				$solicitudes[]=$pgn_total;
				echo json_encode($solicitudes);
			}
		}
		else if (isset($_GET["cedula"])) {
			////////BUSQUEDA POR CEDULA DE SOLICITANTE
			$sql="SELECT * FROM solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula
				WHERE solicitante LIKE :busqueda";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula
				WHERE solicitante LIKE :busqueda LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$solicitudes=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$solicitudes=(array)$solicitudes;
				$solicitudes[]=$bdd_filas;
				$solicitudes[]=$busqueda;
				$solicitudes[]=$pagina;
				$solicitudes[]=$pgn_total;
				echo json_encode($solicitudes);
			}
		}
		else if (isset($_GET["rif"])) {
			////////BUSQUEDA POR RIF DE INMUEBLE
			$sql="SELECT * FROM solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula
				WHERE rif LIKE :busqueda";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula
				WHERE rif LIKE :busqueda LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$solicitudes=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$solicitudes=(array)$solicitudes;
				$solicitudes[]=$bdd_filas;
				$solicitudes[]=$busqueda;
				$solicitudes[]=$pagina;
				$solicitudes[]=$pgn_total;
				echo json_encode($solicitudes);
			}
		}
		else{
			$empezar=($pagina-1)*$filas;
			$sql="SELECT * FROM solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula";
			$query=$bdd->query($sql);
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM solicitud 
				INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
				INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula 
				LIMIT $empezar, $filas";
			$query=$bdd->query($sql);
			$solicitudes=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
		}
	}else{
		$empezar=($pagina-1)*$filas;
		$sql="SELECT * FROM solicitud 
			INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
			INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula";
		$query=$bdd->query($sql);
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT * FROM solicitud 
			INNER JOIN inmueble ON solicitud.cod_inmueble = inmueble.cod_inmueble 
			INNER JOIN solicitante ON solicitud.solicitante = solicitante.cedula 
			LIMIT $empezar, $filas";
		$query=$bdd->query($sql);
		$solicitudes=$query->fetchAll(PDO::FETCH_OBJ);
		$query->closeCursor();
	}
?>