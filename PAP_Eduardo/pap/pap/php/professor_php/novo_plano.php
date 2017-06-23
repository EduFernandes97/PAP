<?php
	session_start();
	$duracao_estagio = $_POST["duracao_estagio"];
	$dias_semana = $_POST["dias_semana"];
	$periodo_estagio1 = $_POST["periodo_estagio1"];
	$periodo_estagio2 = $_POST["periodo_estagio2"];
	$horario_diario11 = $_POST["horario_diario11"];
	$horario_diario12 = $_POST["horario_diario12"];
	$horario_diario21 = $_POST["horario_diario21"];
	$horario_diario22 = $_POST["horario_diario22"];
	$num_visitas = $_POST["num_visitas"];
	$num_visitas_escola = $_POST["num_visitas_escola"];
	$num_visitas_estagio = $_POST["num_visitas_estagio"];
	$objetivos = $_POST["objetivos"];
	$conteudos = $_POST["conteudos"];

	
	include ("../ligacao.php");
	
	
	$sql = "INSERT INTO plano_estagio (cod_plano, num_processo, duracao_estagio, dias_semana, periodo_estagio1, periodo_estagio2, horario_diario11,horario_diario12, horario_diario21,horario_diario22, num_visitas, num_visitas_escola,
		num_visitas_estagio, objetivos, conteudos, cod_anoLetivo) VALUES (NULL, '".$_SESSION["num_proc"]."', '".$duracao_estagio."', '".$dias_semana."', '".$periodo_estagio1."', '".$periodo_estagio2."',
		'".$horario_diario11."','".$horario_diario12."', '".$horario_diario21."', '".$horario_diario22."', '".$num_visitas."', '".$num_visitas_escola."', '".$num_visitas_estagio."', '".$objetivos."', '".$conteudos."', '".$_SESSION["ano"]."');";
		
	echo $sql;
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>