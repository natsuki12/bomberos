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
		$sql="SELECT * FROM inspector WHERE cedula_ins LIKE :busqueda";
		$query=$bdd->prepare($sql);
		$query->execute(array(":busqueda"=>"%".$busqueda."%"));
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT * FROM inspector WHERE cedula_ins LIKE :busqueda LIMIT $empezar, $filas";
		$query=$bdd->prepare($sql);
		$query->execute(array(":busqueda"=>"%".$busqueda."%"));
		$inspector_p=$query->fetchAll(PDO::FETCH_OBJ);
		$query->closeCursor();
		if (isset($_GET["ajax"])) {
			$inspector_p=(array)$inspector_p;
			$inspector_p[]=$bdd_filas;
			$inspector_p[]=$busqueda;
			$inspector_p[]=$pagina;
			$inspector_p[]=$pgn_total;
			echo json_encode($inspector_p);
		}
	}else{
		$empezar=($pagina-1)*$filas;
		$sql="SELECT * FROM inspector";
		$query=$bdd->query($sql);
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT * FROM inspector LIMIT $empezar, $filas";
		$query=$bdd->query($sql);
		$inspector_p=$query->fetchAll(PDO::FETCH_OBJ);
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