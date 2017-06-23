<?php
	session_start();
	$escolha = $_POST["curso"];
	$_SESSION["curso"]=$escolha;
echo $_SESSION["curso"];
	
?>