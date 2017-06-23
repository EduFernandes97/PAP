<?php
	session_start();
    $turma = $_POST["turma"];
	$_SESSION["turma"]=$turma;
    if (isset($_SESSION["aluno"]))
        unset($_SESSION["aluno"]);
?>