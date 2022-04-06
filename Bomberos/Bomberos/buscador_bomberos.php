<?php
	include ("../config/connect.php");
	if (isset($_POST["cedula"])) {
		$cedula = $_POST["cedula"];
		$sql = "SELECT * FROM inspector WHERE cedula_ins = :cedula";
		$query=$bdd->prepare($sql);
		$query->execute(array(":cedula"=>$cedula));
		$datos=$query->fetchAll(PDO::FETCH_OBJ);
		echo json_encode($datos);
	}
?>