<?php
	$ligaBD = mysqli_connect('localhost','root','');
	if (!$ligaBD){
		echo "<br>ERRO: Erro a ligar a MySql";exit;
	}
	
	$escolhaBD = mysqli_select_db($ligaBD, 'pap');
	if (!$escolhaBD){
		echo "<br>ERRO: Erro a selecionar BD";exit;
	}
?>