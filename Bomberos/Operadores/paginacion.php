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

	if (isset($_GET["busqueda"])) {
		require("../config/connect.php");
		$busqueda=$_GET["busqueda"];
		$empezar=($pagina-1)*$filas;
		$sql="SELECT * FROM usuario WHERE nivel_usuario =2 AND nombre LIKE :busqueda";
		$query=$bdd->prepare($sql);
		$query->execute(array(":busqueda"=>"%".$busqueda."%"));
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT * FROM usuario WHERE nivel_usuario =2 AND nombre LIKE :busqueda LIMIT $empezar, $filas";
		$query=$bdd->prepare($sql);
		$query->execute(array(":busqueda"=>"%".$busqueda."%"));
		$operador_p=$query->fetchAll(PDO::FETCH_OBJ);
		$query->closeCursor();
		if (isset($_GET["ajax"])) {
			$operador_p=(array)$operador_p;
			$operador_p[]=$bdd_filas;
			$operador_p[]=$busqueda;
			$operador_p[]=$pagina;
			$operador_p[]=$pgn_total;
			echo json_encode($operador_p);
		}
	}else{
		$empezar=($pagina-1)*$filas;
		$sql="SELECT * FROM usuario WHERE nivel_usuario =2";
		$query=$bdd->query($sql);
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT * FROM usuario WHERE nivel_usuario =2 LIMIT $empezar, $filas";
		$query=$bdd->query($sql);
		$operador_p=$query->fetchAll(PDO::FETCH_OBJ);
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