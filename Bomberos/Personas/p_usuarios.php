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

	if (isset($_POST["extra"])) {
		require("../config/connect.php");
		$sql="SELECT arte.arte_nombre, recurso.recurso_nombre, pescador.nombre, pescador.apellido FROM pescador INNER JOIN recurso ON pescador.cedula=recurso.identificador INNER JOIN arte ON pescador.cedula=recurso.identificador WHERE pescador.cedula=:cedu";
		$query=$bdd->prepare($sql);
		$query->execute(array(":cedu"=>$_POST["cedula"]));
		$artes=$query->fetchAll(PDO::FETCH_OBJ);
		echo json_encode($artes);
	}

	if (isset($_POST["redes"])) {
		require("../config/connect.php");
		$sql="SELECT nombre, apellido, telefono1, telefono2, correo FROM pescador WHERE cedula=:cedu";
		$query=$bdd->prepare($sql);
		$query->execute(array(":cedu"=>$_POST["cedula"]));
		$redes=$query->fetch(PDO::FETCH_OBJ);
		echo json_encode($redes);
	}

	if (isset($_POST["direccion"])) {
		require("../config/connect.php");
		$sql="SELECT pescador.nombre, pescador.apellido, municipio.municipio_nombre, parroquia.parroquia_nombre, pescador.direccion FROM pescador INNER JOIN municipio ON municipio.municipio_cod=pescador.municipio_cod INNER JOIN parroquia ON parroquia.parroquia_cod=pescador.parroquia_cod and parroquia.municipio_cod=pescador.municipio_cod WHERE pescador.cedula=:cedu";
		$query=$bdd->prepare($sql);
		$query->execute(array(":cedu"=>$_POST["cedula"]));
		$direccion=$query->fetch(PDO::FETCH_OBJ);
		echo json_encode($direccion);
	}

	if (isset($_GET["busqueda"])) {
		require("../config/connect.php");
		$busqueda=$_GET["busqueda"];
		$empezar=($pagina-1)*$filas;
		if (isset($_GET["cedula"])) {
			////////busqueda por cedula
			$sql="SELECT * FROM pescador WHERE cedula like :busqueda";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM pescador INNER JOIN embarcacion ON pescador.embarcacion_cod=embarcacion.codigo_embarcacion WHERE pescador.cedula LIKE :busqueda ORDER BY pescador.cedula LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$pescador_p=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$pescador_p=(array)$pescador_p;
				$pescador_p[]=$busqueda;
				$pescador_p[]=$pagina;
				$pescador_p[]=$pgn_total;
				echo json_encode($pescador_p);
			}
		}else{
			////////busqueda por nombre
			$sql="SELECT * FROM pescador WHERE nombre like :busqueda";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$bdd_filas=$query->rowCount();
			$pgn_total=ceil($bdd_filas/$filas);
			$query->closeCursor();
			$sql="SELECT * FROM pescador INNER JOIN embarcacion ON pescador.embarcacion_cod=embarcacion.codigo_embarcacion WHERE pescador.nombre LIKE :busqueda ORDER BY pescador.nombre LIMIT $empezar, $filas";
			$query=$bdd->prepare($sql);
			$query->execute(array(":busqueda"=>"%".$busqueda."%"));
			$pescador_p=$query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			if (isset($_GET["ajax"])) {
				$pescador_p=(array)$pescador_p;
				$pescador_p[]=$busqueda;
				$pescador_p[]=$pagina;
				$pescador_p[]=$pgn_total;
				echo json_encode($pescador_p);
			}
		}
	}else{
		$empezar=($pagina-1)*$filas;
		$sql="SELECT * FROM pescador";
		$query=$bdd->query($sql);
		$bdd_filas=$query->rowCount();
		$pgn_total=ceil($bdd_filas/$filas);
		$query->closeCursor();
		$sql="SELECT * FROM pescador INNER JOIN embarcacion ON pescador.embarcacion_cod=embarcacion.codigo_embarcacion LIMIT $empezar, $filas";
		$query=$bdd->query($sql);
		$pescador_p=$query->fetchAll(PDO::FETCH_OBJ);
		$query->closeCursor();
	}
?>