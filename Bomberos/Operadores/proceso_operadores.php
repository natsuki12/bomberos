<?php
	include("../config/connect.php");
	if (isset($_POST["btnsubmit"])) {
		$bdd->beginTransaction();
		switch ($_POST["solicitud"]) {
			case "operador":
				$usuario = $_POST["nombre_o"];
				$pass = $_POST["contraseña"];
				$pass = password_hash($pass, PASSWORD_DEFAULT);
				$nivel = 2;
				try{
					$sql = "INSERT INTO usuario (nombre, password, nivel_usuario) 
							VALUES (:usuario, :pass, :nivel)";
					$query=$bdd->prepare($sql);
					$query->execute(array(":usuario"=>$usuario, ":pass"=>$pass,  ":nivel"=>$nivel));

					//INSERCION DE REGISTRO DE ACTIVIDAD
						$actividad = "Registro de Operador - Nombre (".$usuario.")";
						$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
						$query=$bdd->prepare($sql);
						$query->execute(array(":act"=>$actividad, ":name"=>$u_nombre, ":censado"=>$usuario));
					//FIN INSERCION DE REGISTRO DE ACTIVIDAD

					$bdd->commit();
					$error=0;
				}catch (PDOException $e){
					$bdd->rollback(); 
					//echo $e->getMessage()." Linea: ".$e->getLine();
					$error=1;
				}
				break;
			case "modificar":
				if (isset($_POST["nombre_o"])) $usuario = $_POST["nombre_o"];
				if (isset($_POST["contraseña"])){
					$pass = $_POST["contraseña"];
					$pass = password_hash($pass, PASSWORD_DEFAULT);
				}
				$user_id = $_POST["user_codigo"];
				try{
					if ((isset($_POST["nombre_o"]))AND(isset($_POST["contraseña"]))) {
				  		$sql = "UPDATE usuario SET nombre=:usuario, password=:pass 
							WHERE nombre=:id";
						$query=$bdd->prepare($sql);
						$query->execute(array(":usuario"=>$usuario, ":pass"=>$pass, ":id"=>$user_id));

				  	}else if
				  	((isset($_POST["nombre_o"]))AND(!isset($_POST["contraseña"]))) {
				  		$sql = "UPDATE usuario SET nombre=:usuario WHERE nombre=:id";
						$query=$bdd->prepare($sql);
						$query->execute(array(":usuario"=>$usuario, ":id"=>$user_id));

				  	}else if 
				  	((!isset($_POST["nombre_o"]))AND(isset($_POST["contraseña"]))) {
				  		$sql = "UPDATE usuario SET password=:pass WHERE nombre=:id";
						$query=$bdd->prepare($sql);
						$query->execute(array(":pass"=>$pass, ":id"=>$user_id));

				  	}

				  	$nombre = "Admin";
				  	//INSERCION DE REGISTRO DE ACTIVIDAD
						$actividad = "Modificación de Operador - Nombre (".$user_id.")";
						$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
						$query=$bdd->prepare($sql);
						$query->execute(array(":act"=>$actividad, ":name"=>$nombre, ":censado"=>$user_id));
					//FIN INSERCION DE REGISTRO DE ACTIVIDAD

					$bdd->commit();
					$error=2;
				}catch (PDOException $e){
					$bdd->rollback(); 
					//echo $e->getMessage()." Linea: ".$e->getLine();
					$error=3;
				}
				break;
		}
	}

	if (isset($_POST["eliminar"])) {
		$usuario = $_POST["eliminar"];
		$nombre = "Admin";
		$sql = "DELETE FROM usuario WHERE nombre = :usuario";
		$query=$bdd->prepare($sql);
		$query->execute(array(":usuario"=>$usuario));

		//INSERCION DE REGISTRO DE ACTIVIDAD
			$actividad = "Eliminación de Operador - Nombre (".$usuario.")";
			$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
			$query=$bdd->prepare($sql);
			$query->execute(array(":act"=>$actividad, ":name"=>$nombre, ":censado"=>$usuario));
		//FIN INSERCION DE REGISTRO DE ACTIVIDAD

		echo json_encode("borrado");
	}
?>