<?php
	session_start();
	$cod_roteiro = $_POST["cod_roteiro"];
	$atividade = $_POST["atividade"];
	$obs = $_POST["obs"];

	
	include ("../ligacao.php");
	
	$sql = "UPDATE roteiro_atividade SET atividade = '".$atividade."', observacao = '".$obs."' WHERE cod_atividade = ".$cod_roteiro;
		
	echo $sql;
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>