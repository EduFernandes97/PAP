<?php
	session_start();
	$cod_roteiro = $_POST["cod_roteiro"];

	
	include ("../ligacao.php");

	$sql = "DELETE FROM roteiro_atividade WHERE cod_atividade = ".$cod_roteiro;
		
	echo $sql;
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>