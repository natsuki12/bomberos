<?php 
	include("../../config/connect.php");

	$codigo = $_POST["code"];
	$sql="SELECT * FROM croqui WHERE cod_croqui = :busqueda";
	$query=$bdd->prepare($sql);
	$query->execute(array(":busqueda"=>$codigo));
	$croqui=$query->fetchAll(PDO::FETCH_OBJ);
	$query->closeCursor();
	echo json_encode($croqui);
?>