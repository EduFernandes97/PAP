<?php
	session_start();
	$escolha = $_POST["num_semana"];
	$_SESSION["num_semana"]=$escolha;
	
?>