<?php
	include ("../config/connect.php");
	if (isset($_POST["rif_i"])) {
		$cedula = $_POST["rif_i"];
		$sql = "SELECT * FROM inmueble WHERE rif_i = :rif";
		$query=$bdd->prepare($sql);
		$query->execute(array(":rif"=>$cedula));
		$datos=$query->fetchAll(PDO::FETCH_OBJ);
		echo json_encode($datos);
	}
?>