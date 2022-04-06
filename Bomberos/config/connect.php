<?php

	$host="localhost";
	$db_name="somosnue_bomberos";
	$user="root";
	$pass="";

	try{

		$bdd=new PDO("mysql:host=".$host."; dbname=".$db_name."", $user, $pass); //conexion a la base de datos

		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$bdd->exec("SET CHARACTER SET utf8");

	}catch(PDOExeption $e){

		die('Error:' . $e->getMessage());

		echo "Linea del error: " . $e->getLine();

	}
?>