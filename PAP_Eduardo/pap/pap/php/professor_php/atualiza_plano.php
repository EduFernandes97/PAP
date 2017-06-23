<?php
	session_start();
	$cod_plano = $_POST["cod_plano"];
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
	
	$sql = "UPDATE plano_estagio SET duracao_estagio = '".$duracao_estagio."', dias_semana = '".$dias_semana."', periodo_estagio1 = '".$periodo_estagio1."', periodo_estagio2 = '".$periodo_estagio2."', 
		horario_diario11 = '".$horario_diario11."', horario_diario12 = '".$horario_diario12."',horario_diario21 = '".$horario_diario21."', horario_diario22 = '".$horario_diario22."',
		num_visitas = '".$num_visitas."', num_visitas_escola = '".$num_visitas_escola."', num_visitas_estagio = '".$num_visitas_estagio."', objetivos = '".$objetivos."',
		conteudos = '".$conteudos."' WHERE plano_estagio.cod_plano = ".$cod_plano." 
		AND plano_estagio.num_processo = ".$_SESSION["num_proc"]." AND plano_estagio.cod_anoLetivo = ".$_SESSION["ano"].";";
		
	echo $sql;
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>