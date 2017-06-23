<?php
	session_start();
	$cod_presenca = $_POST["cod_presenca"];
	$horas = $_POST["horas"];
	
	include ("../ligacao.php");
	
	$sql = "UPDATE reg_presenca SET num_hora = '".$horas."',ass_monitor='' WHERE cod_presenca = ".$cod_presenca;

	
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>