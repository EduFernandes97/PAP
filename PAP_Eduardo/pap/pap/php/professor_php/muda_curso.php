<?php
	session_start();
    $curso = $_POST["curso"];
	$_SESSION["curso"]=$curso;
    if (isset($_SESSION["aluno"]))
        unset($_SESSION["aluno"]);
    if (isset($_SESSION["turma"]))
        unset($_SESSION["turma"]);
?>