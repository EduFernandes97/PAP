<?php
	session_start();
	$aluno = $_POST["aluno"];
	$data = $_POST["data"];
	$hora = $_POST["hora"];
	$obser = $_POST["obser"];
	
	include ("../ligacao.php");
	

	$sql="INSERT INTO reg_presenca (cod_presenca, num_processo, data, num_hora, ass_aluno, ass_monitor, observacao, cod_anoLetivo)
	VALUES(NULL,'".$_SESSION["num_proc"]."', '".$data."', '".$hora."', '".$aluno ."', '', '".$obser."', '".$_SESSION["ano"]."')";//falta verificar o ano letivo

	
	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>