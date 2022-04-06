<?php
	include("../config/connect.php");
	if (isset($_POST["btnsubmit"])) {
		$bdd->beginTransaction();
		switch ($_POST["solicitud"]) {
			case "inmueble":
				$fecha=date('Y-m-d');
				$croquis=0;
				$codigo=0;
				$nombre = $_POST["nombre_i"];
				$uso_i = $_POST["uso_i"];
				$rif = $_POST["rif_i"];
				$firma = "personal";
				$metros_i = $_POST["metros_i"];
				$pisos_i = $_POST["pisos_i"];
				$municipio_i = $_POST["municipio_i"];
				$direccion_i = $_POST["direccion1_i"];
				$calle1 = $_POST["croquis_1"];
				$calle2 = $_POST["croquis_2"];
				$calle3 = $_POST["croquis_3"];
				$calle4 = $_POST["croquis_4"];
				$calle5 = $_POST["croquis_5"];
				$calle6 = $_POST["croquis_6"];
				$calle7 = $_POST["croquis_7"];
				$calle8 = $_POST["croquis_8"];
				$calle9 = $_POST["croquis_9"];
				$calle10 = $_POST["croquis_10"];
				$calle11 = $_POST["croquis_11"];
				$calle12 = $_POST["croquis_12"];
				
				
				try{
						$sql="INSERT INTO inmueble (cod_inmueble, firma, nombre_inm, rif, uso, direccion,  municipio, metros_sqr, piso, croquis_cod) VALUES (:cod, :firma, :nombre, :rif, :uso, :direccion, :municipio, :metros, :piso, :croquis)";
						$query=$bdd->prepare($sql);
						$query->execute(array(":cod"=>$codigo, ":firma"=>$firma, ":nombre"=>$nombre, ":rif"=>$rif, ":uso"=>$uso_i, ":direccion"=>$direccion_i, ":municipio"=>$municipio_i, ":metros"=>$metros_i, ":piso"=>$pisos_i, ":croquis"=>$croquis));

						$sql="INSERT INTO croqui (cod_croqui, calle1, calle2, calle3, calle4, calle5, calle6, calle7, calle8, calle9, calle10, calle11, calle12) VALUES (:codcroqui, :c1, :c2, :c3, :c4, :c5, :c6, :c7, :c8, :c9, :c10, :c11, :c12)";
						$query=$bdd->prepare($sql);
						$query->execute(array(":codcroqui"=>$croquis, ":c1"=>$calle1, ":c2"=>$calle2, ":c3"=>$calle3, ":c4"=>$calle4, ":c5"=>$calle5, ":c6"=>$calle6, ":c7"=>$calle7, ":c8"=>$calle8, ":c9"=>$calle9, ":c10"=>$calle10, ":c11"=>$calle11, ":c12"=>$calle12));

						$sql="INSERT INTO historial_inmueble (cod_inmueble, firma, nombre_inm, rif, uso, direccion,  municipio, metros_sqr, piso, fecha) VALUES (:cod, :firma, :nombre, :rif, :uso, :direccion, :municipio, :metros, :piso, :fecha)";
						$query=$bdd->prepare($sql);
						$query->execute(array(":cod"=>$codigo, ":firma"=>$firma, ":nombre"=>$nombre, ":rif"=>$rif, ":uso"=>$uso_i, ":direccion"=>$direccion_i, ":municipio"=>$municipio_i, ":metros"=>$metros_i, ":piso"=>$pisos_i, ":fecha"=>$fecha));
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
				$nombre = $_POST["nombre_inm"];
				$uso = $_POST["uso_i"];
				$rif = $_POST["rif_i"];
				$firma = $_POST["personal"];
				$metros_i = $_POST["metros_i"];
				$pisos_i = $_POST["pisos_i"];
				$municipio = $_POST["municipio_i"];
				$direccion1_i = $_POST["direccion1_i"];
				$direccion2_i = $_POST["direccion2_i"];



				try{
					//MODIFICAR INSPECTOR
						$sql = "UPDATE inmueble SET firma=:personal, nombre=:nombre_inm, rif=:rif_i, uso=:uso_i, direccion1_i=:direccion1_i, municipio=:municipio, metros=:metros_sqr, piso:piso
								WHERE rif=:id";
						$query=$bdd->prepare($sql);
						$query->execute(array(":nombre"=>$nombre, ":apellido"=>$apellido, ":cedula"=>$cedula, ":codigo"=>$codigo, ":telefono"=>$telefono, ":correo"=>$correo, ":especialidad"=>$especialidad, ":id"=>$id));
					//FIN MODIFICAR INSPECTOR

					
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
			$sql = "DELETE FROM inmueble WHERE rif_i = :rif";
			$query=$bdd->prepare($sql);
			$query->execute(array(":inmueble_cod"=>$cedula));
		//FIN ELIMINAR DATOS DE INSPECTOR

		

		
		echo json_encode("borrado");
	}
?>