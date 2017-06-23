<?php
	session_start();
    $aluno = $_POST["aluno"];
	$_SESSION["aluno"]=$aluno;
?>