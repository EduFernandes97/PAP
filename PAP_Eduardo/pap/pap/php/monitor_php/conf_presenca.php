<?php
	session_start();
	$cod_presenca = $_POST["cod_presenca"];
	
	include ("../ligacao.php");
	
	$sql = "UPDATE reg_presenca SET ass_monitor = '1' WHERE cod_presenca = ".$cod_presenca;
	
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>