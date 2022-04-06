<?php 
	$filas=10;
	$pagina=1;
	if(isset($_GET["pagina"])){
		if ($_GET["pagina"]!=1) {
			$pagina=$_GET["pagina"];
		}elseif ($_GET["pagina"]<=1) {
			$pagina=1;
		}
	}

	if (isset($_GET["busqueda"])) {
		require("../config/connect.php");
		$busqueda=$_GET["busqueda"];
		$empezar=($pagina-1)*$filas;
		$sql="SELECT * FROM inspector INNER JOIN inspeccion ON inspector.cedula_ins=inspeccion.inspector INNER JOIN inmueble ON inspeccion.cod_solicitud=inmueble.cod_inmueble WHERE inspector.cedula_ins LIKE :busqueda";
		$query=$bdd->prepare($sql);
		$query->execute(array(":busqueda"=>"%".$busqueda."%"));
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT * FROM inspector INNER JOIN inspeccion ON inspector.cedula_ins=inspeccion.inspector INNER JOIN inmueble ON inspeccion.cod_solicitud=inmueble.cod_inmueble WHERE inspector.cedula_ins LIKE :busqueda LIMIT $empezar, $filas";
		$query=$bdd->prepare($sql);
		$query->execute(array(":busqueda"=>"%".$busqueda."%"));
		$inspecciones_p=$query->fetchAll(PDO::FETCH_OBJ);
		$query->closeCursor();
		if (isset($_GET["ajax"])) {
			$inspecciones_p=(array)$inspecciones_p;
			$inspecciones_p[]=$bdd_filas;
			$inspecciones_p[]=$busqueda;
			$inspecciones_p[]=$pagina;
			$inspecciones_p[]=$pgn_total;
			echo json_encode($inspecciones_p);
		}
	}else{
		$empezar=($pagina-1)*$filas;
		$sql="SELECT * FROM inspector INNER JOIN inspeccion ON inspector.cedula_ins=inspeccion.inspector INNER JOIN inmueble ON inspeccion.cod_solicitud=inmueble.cod_inmueble WHERE inspector.cedula_ins";
		$query=$bdd->query($sql);
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT * FROM inspector INNER JOIN inspeccion ON inspector.cedula_ins=inspeccion.inspector INNER JOIN inmueble ON inspeccion.cod_solicitud=inmueble.cod_inmueble WHERE inspector.cedula_ins LIMIT $empezar, $filas";
		$query=$bdd->query($sql);
		$inspecciones_p=$query->fetchAll(PDO::FETCH_OBJ);
		$query->closeCursor();
	}
	/*<!-- DESARROLLADORES -->
	<!--
		Andres Ramirez: andresramirez2025@gmail.com / 0412-7942183 / www.linkedin.com/in/andres28ramirez
		Cesar Requena: cesar12piso09@gmail.com / 0416-0302290 / 
		Raimond Rivas: raimondrivas19@gmail.com / 0424-8195273 /
		Miguel Gil: miguel.gil.54@gmail.com / 0412-0810308 / 
	-->*/
?>