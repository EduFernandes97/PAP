<?php

	session_start();
    $nome = $_POST["nome"];
	$contato = $_POST["contato"];
	$email = $_POST["email"];
    $dir_curso = $_POST["dir_curso"];

    $cursos11 = $_POST["cursos11"];
    $cursos12 = $_POST["cursos12"];

    $turma= $_POST["turma"];

	include ("../ligacao.php");
    $sql = "INSERT INTO professor (`cod_prof`, `nome_prof`, `contato_prof`, `email_prof`, `password`) VALUES (NULL, '".$nome."', '".$contato."', '".$email."', 'password')";
    $sql_bd = mysqli_query($ligaBD , $sql);

if ($dir_curso == 's') {
    if ($turma == '11')
        $sql = "INSERT INTO `diretor_curso` (`email_prof`, `cod_curso`, `cod_anoLetivo`, `turma`) VALUES ('" . $email . "', '" . $cursos11 . "', '" . $_SESSION['ano'] . "', '" . $turma . "');";
    if ($turma == '12')
        $sql = "INSERT INTO `diretor_curso` (`email_prof`, `cod_curso`, `cod_anoLetivo`, `turma`) VALUES ('" . $email . "', '" . $cursos12 . "', '" . $_SESSION['ano'] . "', '" . $turma . "');";
    echo $sql;
    $sql_bd = mysqli_query($ligaBD, $sql);
}

	return 0;
?>