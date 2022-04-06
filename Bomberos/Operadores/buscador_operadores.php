<?php
	include ("../config/connect.php");
	if (isset($_POST["nombre"])) {
		$nombre = $_POST["nombre"];
		$sql = "SELECT * FROM usuario WHERE nombre = :nombre";
		$query=$bdd->prepare($sql);
		$query->execute(array(":nombre"=>$nombre));
		$datos=$query->fetchAll(PDO::FETCH_OBJ);
		echo json_encode($datos);
	}
?>