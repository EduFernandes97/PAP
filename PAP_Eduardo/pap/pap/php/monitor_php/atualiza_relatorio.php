<?php
	session_start();
	include ("../ligacao.php");
	$num_semana = $_SESSION["num_semana"];
	$observacao_monitor = $_POST["observacao_monitor"];


    $sql = "UPDATE relatorio_semanal SET observacao_monitor = '".$observacao_monitor."'
    WHERE num_semana = ".$num_semana." AND num_processo = ".$_SESSION['aluno']." AND cod_anoLetivo = ".$_SESSION['ano'];

	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>