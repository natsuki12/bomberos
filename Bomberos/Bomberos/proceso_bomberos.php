<?php
	include("../config/connect.php");
	if (isset($_POST["btnsubmit"])) {
		$bdd->beginTransaction();
		switch ($_POST["solicitud"]) {
			case "bombero":
				$nombre = $_POST["nombre_b"];
				$apellido = $_POST["apellido_b"];
				$cedula = $_POST["cedula_b"];
				$codigo = $_POST["ci_b"];
				$especialidad = $_POST["especialidad_b"];
				$telefono = $_POST["telefono_b"];
				$correo = $_POST["correo_b"];

				try{
					//REGISTRAR INSPECTOR
						$sql = "INSERT INTO inspector (nombre_ins, apellido_ins, cedula_ins, cod_ins, telefono, correo, especialidad) 
								VALUES (:nombre, :apellido, :cedula, :codigo, :telefono, :correo, :especialidad)";
						$query=$bdd->prepare($sql);
						$query->execute(array(":nombre"=>$nombre, ":apellido"=>$apellido,  ":cedula"=>$cedula,  ":codigo"=>$codigo,  ":telefono"=>$telefono,  ":correo"=>$correo,  ":especialidad"=>$especialidad));
					//FIN REGISTRAR INSPECTOR

					//CREAR USUARIO A INSPECTOR
						$pass = password_hash($cedula, PASSWORD_DEFAULT);
						$nivel = 3;

						$sql = "INSERT INTO usuario (nombre, password, nivel_usuario) 
							VALUES (:usuario, :pass, :nivel)";
						$query=$bdd->prepare($sql);
						$query->execute(array(":usuario"=>$cedula, ":pass"=>$pass,  ":nivel"=>$nivel));
					//FIN CREAR USUARIO A INSPECTOR

					//INSERCION DE REGISTRO DE ACTIVIDAD
						$actividad = "Registro de Inspector - Cedula (".$cedula.")";
						$name = $nombre." ".$apellido;

						$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
						$query=$bdd->prepare($sql);
						$query->execute(array(":act"=>$actividad, ":name"=>$u_nombre, ":censado"=>$name));
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
				$nombre = $_POST["nombre_b"];
				$apellido = $_POST["apellido_b"];
				$cedula = $_POST["cedula_b"];
				$codigo = $_POST["ci_b"];
				$especialidad = $_POST["especialidad_b"];
				$telefono = $_POST["telefono_b"];
				$correo = $_POST["correo_b"];
				$id = $_POST["bombero_cedula"];

				try{
					//MODIFICAR INSPECTOR
						$sql = "UPDATE inspector SET nombre_ins=:nombre, apellido_ins=:apellido, cedula_ins=:cedula, cod_ins=:codigo, telefono=:telefono, correo=:correo, especialidad=:especialidad 
								WHERE cedula_ins=:id";
						$query=$bdd->prepare($sql);
						$query->execute(array(":nombre"=>$nombre, ":apellido"=>$apellido, ":cedula"=>$cedula, ":codigo"=>$codigo, ":telefono"=>$telefono, ":correo"=>$correo, ":especialidad"=>$especialidad, ":id"=>$id));
					//FIN MODIFICAR INSPECTOR

					//MODIFICAR USUARIO A INSPECTOR
						$pass = password_hash($cedula, PASSWORD_DEFAULT);

						$sql = "UPDATE usuario SET nombre=:nombre, password=:pass 
							WHERE nombre=:id";
						$query=$bdd->prepare($sql);
						$query->execute(array(":nombre"=>$cedula, ":pass"=>$pass,  ":id"=>$id));
					//FIN MODIFICAR USUARIO A INSPECTOR

					//INSERCION DE REGISTRO DE ACTIVIDAD
						$actividad = "Modificación de Inspector - Cedula (".$cedula.")";
						$name = $nombre." ".$apellido;

						$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
						$query=$bdd->prepare($sql);
						$query->execute(array(":act"=>$actividad, ":name"=>$u_nombre, ":censado"=>$name));
					//FIN INSERCION DE REGISTRO DE ACTIVIDAD
			
					$bdd->commit();
					$error=0;
				}catch (PDOException $e){
					$bdd->rollback(); 
					//echo $e->getMessage()." Linea: ".$e->getLine();
					$error=1;
				}
				break;
		}
	}

	if (isset($_POST["eliminar"])) {
		$cedula = $_POST["eliminar"];
		session_start();
		$u_nombre = $_SESSION["Nombre"];

		//ELIMINAR DATOS DE INSPECTOR
			$sql = "DELETE FROM inspector WHERE cedula_ins = :cedula";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedula"=>$cedula));
		//FIN ELIMINAR DATOS DE INSPECTOR

		//ELIMINAR SU USUARIO
			$sql = "DELETE FROM usuario WHERE nombre = :usuario";
			$query=$bdd->prepare($sql);
			$query->execute(array(":usuario"=>$cedula));
		//FIN ELIMINAR SU USUARIO

		//INSERCION DE REGISTRO DE ACTIVIDAD
			$actividad = "Eliminación de Inspector - Cedula (".$cedula.")";
			$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
			$query=$bdd->prepare($sql);
			$query->execute(array(":act"=>$actividad, ":name"=>$u_nombre, ":censado"=>$cedula));
		//FIN INSERCION DE REGISTRO DE ACTIVIDAD

		echo json_encode("borrado");
	}
?>