<?php
	session_start();
	$escolha = $_POST["cod_aluno"];
	$_SESSION["aluno"]=$escolha;
	
?>