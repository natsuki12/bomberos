<?php  
	include("../../config/connect.php");

	if (isset($_POST["btnsubmit1"])) {
		//SOLO LOS DATOS GENERALES
		$bdd->beginTransaction();
		$estado = $_POST["estado_i"];
		$observacion = $_POST["observacion_i"];
		$inspeccion = $_POST["cod_inspeccion1"];
		$inspector = $_POST["cedula_ins"];

		try{

			//MODIFICACION DE INSPECCION CON LO DATOS GENERALES
				$sql = "UPDATE inspeccion SET observaciones=:observacion, estado=:estado 
							WHERE cod_inspeccion=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":observacion"=>$observacion, ":estado"=>$estado, ":id"=>$inspeccion));
			//FIN MODIFICACION

			//INSERCION DE REGISTRO DE ACTIVIDAD
				$actividad = "Modificación de Inspección - Codigo (".$inspeccion.")";
				$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
				$query=$bdd->prepare($sql);
				$query->execute(array(":act"=>$actividad, ":name"=>$inspector, ":censado"=>$inspeccion));
			//FIN INSERCION DE REGISTRO DE ACTIVIDAD
			
			$bdd->commit();
			$error=0;
		}catch (PDOException $e){
			$bdd->rollback(); 
			//echo $e->getMessage()." Linea: ".$e->getLine();
			$error=1;
		}
	}

	if (isset($_POST["btnsubmit2"])) {
		//SOLO LOS DATOS ESPECIFICOS
		$bdd->beginTransaction();
		$libras = $_POST["libras"];
		$inspeccion = $_POST["cod_inspeccion2"];
		$inspector = $_POST["cedula_ins"];

		try{
			//AGARRAR EL CODIGO DE CADA UNO DE LOS CHECKS DE ENLACE
				$sql = "SELECT * FROM `inspeccion` WHERE cod_inspeccion = :codigo";
				$query=$bdd->prepare($sql);
				$query->execute(array(":codigo"=>$inspeccion));
				$datos=$query->fetchAll(PDO::FETCH_OBJ);
				foreach ($datos as $info) {
					$medio_escape = $info->medio_escape;
					$extintor_f = $info->extintor_f;
					$extintor_p = $info->extintor_p;
					$iluminacion_e = $info->iluminacion_e;
					$instalacion_e = $info->instalacion_e;
					$sistema_a = $info->sistema_a;
					$instalacion_g = $info->instalacion_g;
					$simbolos_seguridad = $info->simbolos_seguridad;
					$color_tuberia = $info->color_tuberia;
					$sellar_c = $info->sellar_c;
					$plafones = $info->plafones;
					$proyecto_plano = $info->proyecto_plano;
				}
			//FIN AGARRAR CODIGOS

			//MEDIOS DE ESCAPE
				$chechk1 = false;
				$chechk2 = false;
				$chechk3 = false;
				$chechk4 = false;
				$chechk5 = false;
				$chechk6 = false;
				$chechk7 = false;
				$chechk8 = false;
				$chechk9 = false;

				if (isset($_POST["check1_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check1_2"])) {
					$chechk2 = true;
				}

				if (isset($_POST["check1_3"])) {
					$chechk3 = true;
				}

				if (isset($_POST["check1_4"])) {
					$chechk4 = true;
				}

				if (isset($_POST["check1_5"])) {
					$chechk5 = true;
				}

				if (isset($_POST["check1_6"])) {
					$chechk6 = true;
				}

				if (isset($_POST["check1_7"])) {
					$chechk7 = true;
				}

				if (isset($_POST["check1_8"])) {
					$chechk8 = true;
				}

				if (isset($_POST["check1_9"])) {
					$chechk9 = true;
				}
				
				$sql = "UPDATE c_medio_escape 
					SET check1_1=:c1, check1_2=:c2, check1_3=:c3, check1_4=:c4, check1_5=:c5, check1_6=:c6, check1_7=:c7, check1_8=:c8, check1_9=:c9 
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":c4"=>$chechk4, ":c5"=>$chechk5, ":c6"=>$chechk6, ":c7"=>$chechk7, ":c8"=>$chechk8, ":c9"=>$chechk9, ":id"=>$medio_escape));
			//FIN MEDIOS DE ESCAPE
			
			//SISTEMA FIJO DE EXTINCIÓN
				$chechk1 = false;
				$chechk2 = false;
				$chechk3 = false;
				$chechk4 = false;
				$chechk5 = false;
				$chechk6 = false;
				$chechk7 = false;
				$chechk8 = false;
				$chechk9 = false;
				$chechk10 = false;
				$chechk11 = false;
				$chechk12 = false;
				$chechk13 = false;

				if (isset($_POST["check2_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check2_2"])) {
					$chechk2 = true;
				}

				if (isset($_POST["check2_3"])) {
					$chechk3 = true;
				}

				if (isset($_POST["check2_4"])) {
					$chechk4 = true;
				}

				if (isset($_POST["check2_5"])) {
					$chechk5 = true;
				}

				if (isset($_POST["check2_6"])) {
					$chechk6 = true;
				}

				if (isset($_POST["check2_7"])) {
					$chechk7 = true;
				}

				if (isset($_POST["check2_8"])) {
					$chechk8 = true;
				}

				if (isset($_POST["check2_9"])) {
					$chechk9 = true;
				}

				if (isset($_POST["check2_10"])) {
					$chechk10 = true;
				}

				if (isset($_POST["check2_11"])) {
					$chechk11 = true;
				}

				if (isset($_POST["check2_12"])) {
					$chechk12 = true;
				}

				if (isset($_POST["check2_13"])) {
					$chechk13 = true;
				}
				
				$sql = "UPDATE c_existentor_f 
					SET check2_1=:c1, check2_2=:c2, check2_3=:c3, check2_4=:c4, check2_5=:c5, check2_6=:c6, check2_7=:c7, check2_8=:c8, check2_9=:c9, check2_10=:c10, check2_11=:c11, check2_12=:c12, check2_13=:c13 
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":c4"=>$chechk4, ":c5"=>$chechk5, ":c6"=>$chechk6, ":c7"=>$chechk7, ":c8"=>$chechk8, ":c9"=>$chechk9, ":c10"=>$chechk10, ":c11"=>$chechk11, ":c12"=>$chechk12, ":c13"=>$chechk13, ":id"=>$extintor_f));
			//FIN SISTEMA FIJO DE EXTINCIÓN

			//EXTINTORES PORTATILES
				$chechk1 = false;
				$chechk2 = false;
				$chechk3 = false;

				if (isset($_POST["check3_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check3_2"])) {
					$chechk2 = true;
				}

				if (isset($_POST["check3_3"])) {
					$chechk3 = true;
				}
				
				$sql = "UPDATE c_extintor_p 
					SET check3_1=:c1, check3_2=:c2, check3_3=:c3, extintor_libras=:libras
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":libras"=>$libras, ":id"=>$extintor_p));
			//FIN EXTINTORES PORTATILES

			//ILUMINACION DE EMERGENCIA
				$chechk1 = false;
				$chechk2 = false;

				if (isset($_POST["check4_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check4_2"])) {
					$chechk2 = true;
				}
				
				$sql = "UPDATE c_iluminacion_e 
					SET check4_1=:c1, check4_2=:c2
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":id"=>$iluminacion_e));
			//FIN ILUMINACION DE EMERGENCIA

			//INSTALACIONES ELECTRICAS
				$chechk1 = false;
				$chechk2 = false;
				$chechk3 = false;

				if (isset($_POST["check5_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check5_2"])) {
					$chechk2 = true;
				}

				if (isset($_POST["check5_3"])) {
					$chechk3 = true;
				}
				
				$sql = "UPDATE c_instalacion_e 
					SET check5_1=:c1, check5_2=:c2, check5_3=:c3
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":id"=>$instalacion_e));
			//FIN INSTALACIONES ELECTRICAS

			//SISTEMA DE DETECCION Y ALARMA
				$chechk1 = false;
				$chechk2 = false;
				$chechk3 = false;

				if (isset($_POST["check6_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check6_2"])) {
					$chechk2 = true;
				}

				if (isset($_POST["check6_3"])) {
					$chechk3 = true;
				}
				
				$sql = "UPDATE c_sistema_a 
					SET check6_1=:c1, check6_2=:c2, check6_3=:c3
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":id"=>$sistema_a));
			//FIN SISTEMA DE DETECCION Y ALARMA

			//INSTALACION DE GAS
				$chechk1 = false;
				$chechk2 = false;
				$chechk3 = false;
				$chechk4 = false;

				if (isset($_POST["check7_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check7_2"])) {
					$chechk2 = true;
				}

				if (isset($_POST["check7_3"])) {
					$chechk3 = true;
				}

				if (isset($_POST["check7_4"])) {
					$chechk4 = true;
				}
				
				$sql = "UPDATE c_instalacion_g 
					SET check7_1=:c1, check7_2=:c2, check7_3=:c3, check7_4=:c4
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":c4"=>$chechk4, ":id"=>$instalacion_g));
			//FIN INSTALACION DE GAS

			//SIMBOLOS Y SEÑALES DE SEGURIDAD
				$chechk1 = false;
				$chechk2 = false;
				$chechk3 = false;

				if (isset($_POST["check8_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check8_2"])) {
					$chechk2 = true;
				}

				if (isset($_POST["check8_3"])) {
					$chechk3 = true;
				}
				
				$sql = "UPDATE c_simbolos_seguridad 
					SET check8_1=:c1, check8_2=:c2, check8_3=:c3
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":id"=>$simbolos_seguridad));
			//FIN SIMBOLOS Y SEÑALES DE SEGURIDAD

			//COLORES DE TUBERIA Y FLUIDOS
				$chechk1 = false;
				$chechk2 = false;
				$chechk3 = false;
				$chechk4 = false;

				if (isset($_POST["check9_1"])) {
					$chechk1 = true;
				}

				if (isset($_POST["check9_2"])) {
					$chechk2 = true;
				}

				if (isset($_POST["check9_3"])) {
					$chechk3 = true;
				}

				if (isset($_POST["check9_4"])) {
					$chechk4 = true;
				}
				
				$sql = "UPDATE c_colores_tuberia 
					SET check9_1=:c1, check9_2=:c2, check9_3=:c3, check9_4=:c4
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":c4"=>$chechk4, ":id"=>$color_tuberia));
			//FIN COLORES DE TUBERIA Y FLUIDOS

			//SELLAR CANALIZACIONES
				$chechk1 = false;

				if (isset($_POST["check10_1"])) {
					$chechk1 = true;
				}
				
				$sql = "UPDATE c_sellar_c 
					SET check10_1=:c1
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":id"=>$sellar_c));
			//FIN SELLAR CANALIZACIONES

			//PLAFONES
				$chechk1 = false;

				if (isset($_POST["check11_1"])) {
					$chechk1 = true;
				}
				
				$sql = "UPDATE c_plafones 
					SET check11_1=:c1
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":id"=>$plafones));
			//FIN PLAFONES

			//PROYECTOS Y PLANOS
				$chechk1 = false;

				if (isset($_POST["check12_1"])) {
					$chechk1 = true;
				}
				
				$sql = "UPDATE c_proyecto_plano 
					SET check12_1=:c1
					WHERE codigo=:id";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":id"=>$proyecto_plano));
			//FIN PROYECTOS Y PLANOS

			//INSERCION DE REGISTRO DE ACTIVIDAD
				$actividad = "Modificación de Inspección - Codigo (".$inspeccion.")";
				$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
				$query=$bdd->prepare($sql);
				$query->execute(array(":act"=>$actividad, ":name"=>$inspector, ":censado"=>$inspeccion));
			//FIN INSERCION DE REGISTRO DE ACTIVIDAD
			
			$bdd->commit();
			$error=0;
		}catch (PDOException $e){
			$bdd->rollback(); 
			echo $e->getMessage()." Linea: ".$e->getLine();
			$error=1;
		}
	}

	if (isset($_POST["modificar"])) {
		$codigo = $_POST["codigo"];
		$sql = "SELECT * FROM `inspeccion` 
				INNER JOIN c_medio_escape ON inspeccion.medio_escape = c_medio_escape.codigo
				INNER JOIN c_existentor_f ON inspeccion.extintor_f = c_existentor_f.codigo
				INNER JOIN c_extintor_p ON inspeccion.extintor_p = c_extintor_p.codigo
				INNER JOIN c_iluminacion_e ON inspeccion.iluminacion_e = c_iluminacion_e.codigo
				INNER JOIN c_instalacion_e ON inspeccion.instalacion_e = c_instalacion_e.codigo
				INNER JOIN c_sistema_a ON inspeccion.sistema_a = c_sistema_a.codigo
				INNER JOIN c_instalacion_g ON inspeccion.instalacion_g = c_instalacion_g.codigo
				INNER JOIN c_simbolos_seguridad ON inspeccion.simbolos_seguridad = c_simbolos_seguridad.codigo
				INNER JOIN c_colores_tuberia ON inspeccion.color_tuberia = c_colores_tuberia.codigo
				INNER JOIN c_sellar_c ON inspeccion.sellar_c = c_sellar_c.codigo
				INNER JOIN c_plafones ON inspeccion.plafones = c_plafones.codigo
				INNER JOIN c_proyecto_plano ON inspeccion.proyecto_plano = c_proyecto_plano.codigo
				WHERE cod_inspeccion = :codigo";
		$query=$bdd->prepare($sql);
		$query->execute(array(":codigo"=>$codigo));
		$datos=$query->fetchAll(PDO::FETCH_OBJ);
		echo json_encode($datos);
	}
?>