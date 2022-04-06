<?php  
	if (isset($_POST["btnsubmit"])) {
		$bdd->beginTransaction();
		$estado = $_POST["estado"];
		$libras = $_POST["libras"];
		$observacion = $_POST["observacion_i"];
		$solicitud = $_POST["codigo_solicitud"];
		$inspector = $_POST["cedula_ins"];

		//ASI FUNCIONA EL CHECK
		  	/*if (isset($_POST["check12_1"])) {
		  		$boton = "LLEGO"; //CONFIRMA SI LLEGO SI NO LE METO OTRO VALOR	
		  	}*/
	  	//FIN FUNCIONA EL CHECK
		try{
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
				
				$sql = "INSERT INTO c_medio_escape (check1_1, check1_2, check1_3, check1_4, check1_5, check1_6, check1_7, check1_8, check1_9) 
					VALUES (:c1, :c2, :c3, :c4, :c5, :c6, :c7, :c8, :c9)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":c4"=>$chechk4, ":c5"=>$chechk5, ":c6"=>$chechk6, ":c7"=>$chechk7, ":c8"=>$chechk8, ":c9"=>$chechk9));

				$medios_e=$bdd->lastInsertId(); /// toma el id del medio de escape registrado
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
				
				$sql = "INSERT INTO c_existentor_f (check2_1, check2_2, check2_3, check2_4, check2_5, check2_6, check2_7, check2_8, check2_9, check2_10, check2_11, check2_12, check2_13) 
					VALUES (:c1, :c2, :c3, :c4, :c5, :c6, :c7, :c8, :c9, :c10, :c11, :c12, :c13)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":c4"=>$chechk4, ":c5"=>$chechk5, ":c6"=>$chechk6, ":c7"=>$chechk7, ":c8"=>$chechk8, ":c9"=>$chechk9, ":c10"=>$chechk10, ":c11"=>$chechk11, ":c12"=>$chechk12, ":c13"=>$chechk13));

				$extintor_f=$bdd->lastInsertId(); /// toma el id del sistema fijo de extincion registrado
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
				
				$sql = "INSERT INTO c_extintor_p (check3_1, check3_2, check3_3, extintor_libras) 
					VALUES (:c1, :c2, :c3, :libras)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":libras"=>$libras));

				$extintor_p=$bdd->lastInsertId(); /// toma el id del extintor portatil registrado
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
				
				$sql = "INSERT INTO c_iluminacion_e (check4_1, check4_2) 
					VALUES (:c1, :c2)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2));

				$iluminacion_e=$bdd->lastInsertId(); /// toma el id de iluminacion de emergencia registrado
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
				
				$sql = "INSERT INTO c_instalacion_e (check5_1, check5_2, check5_3) 
					VALUES (:c1, :c2, :c3)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3));

				$instalacion_e=$bdd->lastInsertId(); /// toma el id de instalacion electrica registrado
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
				
				$sql = "INSERT INTO c_sistema_a (check6_1, check6_2, check6_3) 
					VALUES (:c1, :c2, :c3)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3));

				$sistema_a=$bdd->lastInsertId(); /// toma el id de sistema de deteccion de alarma registrado
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
				
				$sql = "INSERT INTO c_instalacion_g (check7_1, check7_2, check7_3, check7_4) 
					VALUES (:c1, :c2, :c3, :c4)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":c4"=>$chechk4));

				$instalacion_g=$bdd->lastInsertId(); /// toma el id de instalacion de gas registrado
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
				
				$sql = "INSERT INTO c_simbolos_seguridad (check8_1, check8_2, check8_3) 
					VALUES (:c1, :c2, :c3)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3));

				$simbolos_seguridad=$bdd->lastInsertId(); /// toma el id de simbolos de seguridad registrado
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
				
				$sql = "INSERT INTO c_colores_tuberia (check9_1, check9_2, check9_3, check9_4) 
					VALUES (:c1, :c2, :c3, :c4)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1, ":c2"=>$chechk2, ":c3"=>$chechk3, ":c4"=>$chechk4));

				$color_tuberia=$bdd->lastInsertId(); /// toma el id de colores de tuberia registrado
			//FIN COLORES DE TUBERIA Y FLUIDOS

			//SELLAR CANALIZACIONES
				$chechk1 = false;

				if (isset($_POST["check10_1"])) {
					$chechk1 = true;
				}
				
				$sql = "INSERT INTO c_sellar_c (check10_1) 
					VALUES (:c1)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1));

				$sellar_c=$bdd->lastInsertId(); /// toma el id de sellar canalizaciones registrado
			//FIN SELLAR CANALIZACIONES

			//PLAFONES
				$chechk1 = false;

				if (isset($_POST["check11_1"])) {
					$chechk1 = true;
				}
				
				$sql = "INSERT INTO c_plafones (check11_1) 
					VALUES (:c1)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1));

				$plafones=$bdd->lastInsertId(); /// toma el id de plafones registrado
			//FIN PLAFONES

			//PROYECTOS Y PLANOS
				$chechk1 = false;

				if (isset($_POST["check12_1"])) {
					$chechk1 = true;
				}
				
				$sql = "INSERT INTO c_proyecto_plano (check12_1) 
					VALUES (:c1)";
				$query=$bdd->prepare($sql);
				$query->execute(array(":c1"=>$chechk1));

				$proyecto_plano=$bdd->lastInsertId(); /// toma el id de plafones registrado
			//FIN PROYECTOS Y PLANOS

			//REGISTRO O INSERCION DE INSPECCION
				$sql = "INSERT INTO inspeccion (cod_solicitud, inspector, medio_escape, extintor_f, extintor_p, iluminacion_e, instalacion_e, sistema_a, instalacion_g, simbolos_seguridad, color_tuberia, sellar_c, plafones, proyecto_plano, observaciones, estado, fecha) 
						VALUES (:codigo, :cedula, :chme, :chef, :chep, :chile, :chine, :chsa, :chig, :chss, :chct, :chsc, :chp, :chpp, :observaciones, :estado, NOW())"; 
				$query=$bdd->prepare($sql);
				$query->execute(array(":codigo"=>$solicitud, ":cedula"=>$inspector, ":observaciones"=>$observacion, ":estado"=>$estado, ":chme"=>$medios_e, ":chef"=>$extintor_f, ":chep"=>$extintor_p, ":chile"=>$iluminacion_e, ":chine"=>$instalacion_e, ":chsa"=>$sistema_a, ":chig"=>$instalacion_g, ":chss"=>$simbolos_seguridad, ":chct"=>$color_tuberia, ":chsc"=>$sellar_c, ":chp"=>$plafones, ":chpp"=>$proyecto_plano));

				$inspeccion_id=$bdd->lastInsertId(); /// toma el id de la inspeccion
			//FIN INSERCION

			//INSERCION DE REGISTRO DE ACTIVIDAD
				$actividad = "Registro de inspeccion - Solicitud (".$solicitud.")";
				$sql="INSERT INTO registro_actividad (actividad, usuario_name, codigo_registrado, registro_fecha) VALUES (:act, :name, :censado, NOW())";
				$query=$bdd->prepare($sql);
				$query->execute(array(":act"=>$actividad, ":name"=>$inspector, ":censado"=>$inspeccion_id));
			//FIN INSERCION DE REGISTRO DE ACTIVIDAD
			
			$bdd->commit();
			$error=0;
		}catch (PDOException $e){
			$bdd->rollback(); 
			//echo $e->getMessage()." Linea: ".$e->getLine();
			$error=1;
		}
	}
?>