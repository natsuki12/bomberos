<?php
	include("../config/connect.php");

	//CONSULTA POR MES O POR DIA SEGUN AGRUPACIONES O PEROSNAS
	//MESES = 1 ES ENERO
	if(isset($_POST["busqueda_m"])){
		switch ($_POST["busqueda_m"]) {
			case 'cultor':
				$sql = "SELECT COUNT(actividad) as total ,MONTH(registro_fecha) as mes FROM `registro_actividad` WHERE actividad = 'cultor' GROUP BY MONTH(registro_fecha)";
				break;
			case 'agrupacion':
				$sql = "SELECT COUNT(actividad) as total ,MONTH(registro_fecha) as mes FROM `registro_actividad` WHERE actividad = 'agrupacion' GROUP BY MONTH(registro_fecha)";
				break;
			default:
				# code...
				break;
		}
		$query=$bdd->query($sql);
		$total_mes = $query->fetchAll(PDO::FETCH_OBJ);
		echo json_encode($total_mes);
	}
	
	//DIAS = 0 ES DOMINGO
	if (isset($_POST["busqueda_d"])) {
		switch ($_POST["busqueda_d"]) {
			case 'cultor':
				$sql = "SELECT COUNT(actividad) as total ,DATE_FORMAT(registro_fecha,'%w') as dia FROM `registro_actividad` WHERE actividad = 'cultor' GROUP BY DATE_FORMAT(registro_fecha,'%w')";
				break;
			case 'agrupacion':
				$sql = "SELECT COUNT(actividad) as total ,DATE_FORMAT(registro_fecha,'%w') as dia FROM `registro_actividad` WHERE actividad = 'agrupacion' GROUP BY DATE_FORMAT(registro_fecha,'%w')";
				break;
			default:
				# code...
				break;
		}
		$query=$bdd->query($sql);
		$total_dia = $query->fetchAll(PDO::FETCH_OBJ);
		echo json_encode($total_dia);
	}
	
?>