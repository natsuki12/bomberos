<?php
	
	//CONSULTA NÚMERO TOTAL DE CENSADOS
	$sql = "SELECT COUNT(cedula) AS total FROM persona_e_t_g";
	$query=$bdd->query($sql);
	$total_censado = $query->fetchAll(PDO::FETCH_OBJ);

	//CONSULTA DE TOTAL DE CENSADOS POR ESTILO - DIFERENCIO CON e_arte CUANDO CAMBIE EL NUMERO IDENTIFICADOR
	$sql = "SELECT COUNT(e_arte) AS total , e_arte FROM persona_e_t_g GROUP BY e_arte";
	$query=$bdd->query($sql);
	$total_estilo = $query->fetchAll(PDO::FETCH_OBJ);

	//CONSULTA DE TOTAL DE CENSADOS POR TIPO DE ARTE SEGUN CADA ESTILO - DIFERENCIO CON e_arte CUANDO CAMBIE EL NUMERO IDENTIFICADOR
	$sql = "SELECT persona_e_t_g.e_arte as estilo, persona_e_t_g.t_arte as arte, tipo_nombre, COUNT(cedula) as total FROM `persona_e_t_g` INNER JOIN tipo_arte ON persona_e_t_g.t_arte = tipo_arte.t_arte AND persona_e_t_g.e_arte = tipo_arte.e_arte GROUP BY persona_e_t_g.t_arte";
	$query=$bdd->query($sql);
	$total_tipo = $query->fetchAll(PDO::FETCH_OBJ);
?>