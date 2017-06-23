<?php
	session_start();
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	
	include ("ligacao.php");

    $sql = "SELECT * FROM ano_letivo WHERE ano_atual = '1'";

    $sql_bd = mysqli_query($ligaBD , $sql);
    $dados_ano_letivo = mysqli_fetch_array($sql_bd);
    $_SESSION["ano"]=$dados_ano_letivo['cod_anoLetivo'];

	$sql = "SELECT * FROM admin where email_admin='".$user."' and password='".$pass."'";
	$sql_bd = mysqli_query($ligaBD , $sql);
	$linhas = mysqli_num_rows($sql_bd);
	
	if ($linhas==1){
		$dados = mysqli_fetch_array($sql_bd);
		$_SESSION["email"] = $dados["email_admin"];
		header("Location:../pag/admin.php");
		exit;
	}
	else {
		$sql = "SELECT * FROM professor where email_prof='".$user."' and password='".$pass."'";
		$sql_bd = mysqli_query($ligaBD , $sql);
		$linhas = mysqli_num_rows($sql_bd);
	}
	
	if ($linhas==1){
		$dados = mysqli_fetch_array($sql_bd);
		$_SESSION["email"] = $dados["email_prof"];
		header("Location:../pag/professor.php");exit;
	}
	else {
		$sql = "SELECT * FROM monitor where email_monitor='".$user."' and password='".$pass."'";
		$sql_bd = mysqli_query($ligaBD , $sql);
		$linhas = mysqli_num_rows($sql_bd);
	}
		
	if ($linhas==1){
		$dados = mysqli_fetch_array($sql_bd);
		$_SESSION["email"] = $dados["email_monitor"];
		header("Location:../pag/monitor.php");exit;
	}
	
	else {
		$sql = "SELECT * FROM aluno where email_aluno='".$user."' and password='".$pass."' and cod_anoLetivo = ".$dados_ano_letivo["cod_anoLetivo"];
		$sql_bd = mysqli_query($ligaBD , $sql);
		$linhas = mysqli_num_rows($sql_bd);
	}
			
	if ($linhas==1){
		$dados = mysqli_fetch_array($sql_bd);
		$_SESSION["email"] = $dados["email_aluno"];
		$_SESSION["num_proc"] = $dados["num_processo"];
		header("Location:../pag/aluno.php");exit;
	}
	
	else {
		header("Location:../index.html");
	}
	
?>