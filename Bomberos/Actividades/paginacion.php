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
		$sql="SELECT * FROM registro_actividad WHERE usuario_name LIKE :busqueda";
		$query=$bdd->prepare($sql);
		$query->execute(array(":busqueda"=>"%".$busqueda."%"));
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT registro_id, actividad, usuario_name, codigo_registrado, DATE_FORMAT(registro_fecha,'%Y - %m - %d') as fechat, DATE_FORMAT(registro_fecha,'%h:%i:%s %p') as hora 
			FROM registro_actividad WHERE usuario_name LIKE :busqueda ORDER BY usuario_name LIMIT $empezar, $filas";
		$query=$bdd->prepare($sql);
		$query->execute(array(":busqueda"=>"%".$busqueda."%"));
		$actividades=$query->fetchAll(PDO::FETCH_OBJ);
		$query->closeCursor();
		if (isset($_GET["ajax"])) {
			$actividades=(array)$actividades;
			$actividades[]=$bdd_filas;
			$actividades[]=$busqueda;
			$actividades[]=$pagina;
			$actividades[]=$pgn_total;
			echo json_encode($actividades);
		}
	}else{
		$empezar=($pagina-1)*$filas;
		$sql="SELECT * FROM registro_actividad";
		$query=$bdd->query($sql);
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT registro_id, actividad, usuario_name, codigo_registrado, DATE_FORMAT(registro_fecha,'%Y - %m - %d') as fechat, DATE_FORMAT(registro_fecha,'%h:%i:%s %p') as hora FROM registro_actividad LIMIT $empezar, $filas";
		$query=$bdd->query($sql);
		$actividades=$query->fetchAll(PDO::FETCH_OBJ);
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