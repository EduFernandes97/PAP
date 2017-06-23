<?php
	session_start();
	$atividade = $_POST["atividade"];
	$obs = $_POST["obs"];
	
	include ("../ligacao.php");
	
	$sql = "INSERT INTO roteiro_atividade (cod_atividade, cod_anoLetivo, num_processo, atividade, observacao) VALUES (NULL, '".$_SESSION["ano"]."', '".$_SESSION["num_proc"]."',
		'".$atividade."', '".$obs."');";

	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>