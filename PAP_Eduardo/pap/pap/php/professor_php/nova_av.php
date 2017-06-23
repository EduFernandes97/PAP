<?php
	session_start();
	$objetivo = $_POST["objetivo"];
	$dominio = $_POST["dominio"];
    $num_obj = $_POST["num_obj"];


	
	include ("../ligacao.php");

$num = $num_obj + 1;
    $sql = "INSERT INTO `objetivo_aluno` (`cod_curso`, `cod_anoLetivo`, `num_objetivo_aluno`, `dominio`, `objetivo`) VALUES ('".$_SESSION['curso']."', '".$_SESSION['ano']."', '". $num ."', '".$dominio."', '".$objetivo."');";


	$sql_bd = mysqli_query($ligaBD , $sql);
	if (!$sql_bd){
		echo "Erro a procurar dados!";
		exit;
	}
	return 0;
?>