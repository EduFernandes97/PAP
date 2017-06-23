<?php
	session_start();
	$escolha = $_POST["aluno_escolhido"];
	
	
	include ("ligacao.php");
	
	$_SESSION["aluno"]=$escolha;
	
	// $sql = "SELECT * FROM aluno where num_processo='".$escolha."'";
	// $sql_bd = mysqli_query($ligaBD , $sql);
	// $dados = mysqli_fetch_array($sql_bd);
	
	// echo $dados["nome_aluno"];
	header("Location:../pag/monitor.php");
	
?>