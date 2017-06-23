<?php
	session_start();
	include ("../ligacao.php");
	$num_semana = $_SESSION["num_semana"];
	$data_semana1 = $_POST["data_semana1"];
	$data_semana2 = $_POST["data_semana2"];
	$hora1 = $_POST["hora1"];
	$hora2 = $_POST["hora2"];
	$atividade_desenvolvida = $_POST["atividade_desenvolvida"];
	$observacao_aluno = $_POST["observacao_aluno"];
	
	$sql = "SELECT * FROM relatorio_semanal WHERE num_processo='".$_SESSION["num_proc"]."' and cod_anoLetivo= ".$_SESSION["ano"]." and num_semana=".$_SESSION["num_semana"];
	$sql_bd = mysqli_query($ligaBD , $sql);
	$num_linha=mysqli_num_rows($sql_bd);
	if ($num_linha==0){
		$sql = "INSERT INTO relatorio_semanal (`num_semana`, `num_processo`, `cod_anoLetivo`, `data_semana1`, `data_semana2`, `hora1`, `hora2`, `atividade_desenvolvida`, `observacao_aluno`, `observacao_monitor`)
			VALUES ('".$num_semana."', '".$_SESSION["num_proc"]."', '".$_SESSION["ano"]."', '".$data_semana1."', '".$data_semana2."', '".$hora1."', '".$hora2."',
			'".$atividade_desenvolvida."', '".$observacao_aluno."', '')";
	}else {
		$sql = "UPDATE relatorio_semanal SET data_semana1 = '".$data_semana1."', data_semana2 = '".$data_semana2."', hora1 = '".$hora1."', hora2 = '".$hora2."',
		atividade_desenvolvida = '".$atividade_desenvolvida."', observacao_aluno = '".$observacao_aluno."' 
		WHERE num_semana = ".$num_semana." AND num_processo = ".$_SESSION['num_proc']." AND relatorio_semanal.cod_anoLetivo = ".$_SESSION['ano'];
	}


	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>