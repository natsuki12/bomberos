<?php
	include("../config/connect.php");
	function null($string){
		if (empty($string)) {
			return null;
		}else{
			return $string;
		}
	}
	if (isset($_POST["btnsubmit"])) {
		$bdd->beginTransaction();
		try {
			$sql="SELECT cedula FROM pescador WHERE cedula=:cedu";
			$query=$bdd->prepare($sql);
			$query->execute(array(":cedu"=>$_POST["cedula_s"]));

			if ($query->rowCount()==0) {
				$tlf2=null($_POST["telefono2_s"]);

				$sql="INSERT INTO pescador (cedula, nombre, apellido, fecha_nacimiento, sexo, estado_civil, municipio_cod, parroquia_cod, direccion, estudio, permiso_pesca, medio_faena, embarcacion_cod, telefono1, telefono2, correo) VALUES (:cedu, :nomb, :apell, :nacimiento, :sexo, :edoc, :muni, :parro, :dir, :estudio, :permiso, :medio, :embarcacion, :tlf1, :tlf2, :correo)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":cedu"=>$_POST["cedula_s"], ":nomb"=>$_POST["nombre1_s"], ":apell"=>$_POST["apellido1_s"], ":nacimiento"=>$_POST["nacimiento_s"], ":sexo"=>$_POST["genero_p"], ":edoc"=>$_POST["civil_s"], ":muni"=>$_POST["municipio_s"], ":parro"=>$_POST["parroquia_s"], ":dir"=>$_POST["direccion1_s"], ":estudio"=>$_POST["estudio"], ":permiso"=>$_POST["optradio"], ":medio"=>$_POST["faena"], ":embarcacion"=>$_POST["pertenece_e"], ":tlf1"=>$_POST["telefono1_s"], ":tlf2"=>$tlf2, ":correo"=>$_POST["correo_s"]));

				for ($i = 1; $i <= 20; $i++) {
				    if(isset($_POST["a".$i])){
				    	$arte = $_POST["a".$i];
				    	$sql = "INSERT INTO arte (arte_nombre, identificador) 
						VALUES (:arte ,:embarcacion)";
						$query=$bdd->prepare($sql);
						$query->execute(array(":embarcacion"=>$_POST["cedula_s"], ":arte"=>$arte));
				    }
				}

				for ($i = 1; $i <= 20; $i++) {
				    if(isset($_POST["r".$i])){
				    	$recurso = $_POST["r".$i];
				    	$sql = "INSERT INTO recurso (recurso_nombre, identificador) 
						VALUES (:recurso ,:embarcacion)";
						$query=$bdd->prepare($sql);
						$query->execute(array(":embarcacion"=>$_POST["cedula_s"], ":recurso"=>$recurso));
				    }
				}

				$actividad="Registro de Persona";

				//*****INSERCION DE REGISTRO DE ACTIVIDAD*****
					$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
					$query=$bdd->prepare($sql);
					$query->execute(array(":act"=>$actividad, ":name"=>$u_nombre, ":censado"=>$_POST["cedula_s"]));
				//*****FIN INSERCION DE REGISTRO DE ACTIVIDAD*****

				$error=0;
				$bdd->commit();
			}else{
				$error=1;
				$bdd->rollback();
			}

		} catch (PDOException $e) {
			$error=2;
			$bdd->rollback();
		}
	}

	$sql="SELECT codigo_embarcacion, nombre_embarcacion FROM embarcacion";
	$embarcaciones=$bdd->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>