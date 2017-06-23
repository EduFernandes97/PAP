<?php
	session_start();

	
	include ("../ligacao.php");

	$sql = "DELETE FROM relatorio_semanal WHERE num_processo='".$_SESSION["num_proc"]."' and cod_anoLetivo= ".$_SESSION["ano"]." and num_semana=".$_SESSION["num_semana"];
		
	echo $sql;
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>