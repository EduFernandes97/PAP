<?php
	session_start();
	$cod_presenca = $_POST["cod_presenca"];
	
	include ("../ligacao.php");
	$sql = "DELETE FROM reg_presenca WHERE cod_presenca = ".$cod_presenca;
		
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>