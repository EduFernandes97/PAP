<?php

	session_start();
	$novo_monitor = $_POST["novo_monitor"];
	$novo_entidade = $_POST["novo_entidade"];
	$novo_prof = $_POST["novo_prof"];
	$num_processo = $_POST["num_processo"];
	$curso = $_POST["curso"];
	$nome_aluno = $_POST["nome_aluno"];
	$ano = $_POST["ano"];
	$turma = $_POST["turma"];
	$morada_aluno = $_POST["morada_aluno"];
	$codigo_postal_aluno = $_POST["codigo_postal_aluno"];
	$bi_cc_aluno = $_POST["bi_cc_aluno"];
	$arquivo_aluno = $_POST["arquivo_aluno"];
	$validade_aluno = $_POST["validade_aluno"];
	$contato_aluno = $_POST["contato_aluno"];
	$email_aluno = $_POST["email_aluno"];
	$nome_ee = $_POST["nome_ee"];
	$grau = $_POST["grau"];
	$morada_ee = $_POST["morada_ee"];
	$codigo_postal_ee = $_POST["codigo_postal_ee"];
	$contato_ee = $_POST["contato_ee"];
	$email_ee = $_POST["email_ee"];
	$prof = $_POST["prof"];
	$nome_prof = $_POST["nome_prof"];
	$contato_prof = $_POST["contato_prof"];
	$email_prof = $_POST["email_prof"];	
	$entidade = $_POST["entidade"];
	$denominacao = $_POST["denominacao"];
	$nif = $_POST["nif"];
	$morada_entidade = $_POST["morada_entidade"];
	$codigo_postal_entidade = $_POST["codigo_postal_entidade"];
	$contato_entidade = $_POST["contato_entidade"];
	$email_entidade = $_POST["email_entidade"];
	$natureza = $_POST["natureza"];
	$tipo_entidade = $_POST["tipo_entidade"];
	$atividade_entidade = $_POST["atividade_entidade"];
	$cae_entidade = $_POST["cae_entidade"];
	$monitor = $_POST["monitor"];
	$nome_monitor = $_POST["nome_monitor"];
	$contato_monitor = $_POST["contato_monitor"];
	$contato_monitor = $_POST["contato_monitor"];
	$email_monitor = $_POST["email_monitor"];
	$cargo_monitor = $_POST["cargo_monitor"];

	include ("../ligacao.php");
	if ($novo_entidade == 1){
		//adiciona entidade
		$sql = "INSERT INTO `entidade_estagio` 
			(`NIF`, `denominacao`, `morada_estagio`, `codigo_postal_estagio`, `contato_estagio`, `email_estagio`, `natureza_juridica`, `tipo_entidade`, 
			`atividade_principal`, `cae`) 
			VALUES ('".$nif."', '".$denominacao."', '".$morada_entidade."', '".$codigo_postal_entidade."', '".$contato_entidade."', '".$email_entidade."',
			'".$natureza."', '".$tipo_entidade."', '".$atividade_entidade."', '".$cae_entidade."');";
		$sql_bd = mysqli_query($ligaBD , $sql);
	}else{
		$nif = $entidade;
	}

	if ($novo_monitor == 1){
		
		//adiciona monitor
		$sql = "INSERT INTO `monitor` (`cod_monitor`, `NIF`, `nome_monitor`, `contato_monitor`, `email_monitor`, `password`, `cargo`) 
			VALUES ('', '".$nif."', '".$nome_monitor."', '".$contato_monitor."', '".$email_monitor."', 'password', '".$cargo_monitor."')";

		$sql_bd = mysqli_query($ligaBD , $sql);
		$cod_monitor = mysqli_insert_id($ligaBD);
	}else{
		
		$sql = "SELECT * FROM monitor where email_monitor = '".$monitor."'";
		$sql_bd = mysqli_query($ligaBD , $sql);
		$dados = mysqli_fetch_array($sql_bd);
		$cod_monitor = $dados['cod_monitor'];
		
	}


	if ($novo_prof == 1){
		//adiciona prof
		$sql = "INSERT INTO `professor` (`cod_prof`, `nome_prof`, `contato_prof`, `email_prof`, `password`) 
			VALUES (NULL, '".$nome_prof."', '".$contato_prof."', '".$email_prof."', 'password');";

		$sql_bd = mysqli_query($ligaBD , $sql);
		$cod_prof = mysqli_insert_id($ligaBD);
	}
	else {
		$sql = "SELECT * FROM professor where email_prof = '".$prof."'";
echo $sql;
		$sql_bd = mysqli_query($ligaBD , $sql);
		$dados = mysqli_fetch_array($sql_bd);
		$cod_prof = $dados['cod_prof'];
	}

	//adiciona aluno
	$sql = "INSERT INTO `aluno` (`num_processo`, `cod_anoLetivo`, `cod_curso`, `nome_aluno`, `ano`, `turma`, `morada_aluno`, 
		`codigo_postal_aluno`, `bi_cc`, `arquivo`, `validade`, `contato_aluno`, `email_aluno`, `password`) 
		VALUES ('".$num_processo."', '".$_SESSION['ano']."', '".$curso."', '".$nome_aluno."', '".$ano."', '".$turma."', '".$morada_aluno."',
		'".$codigo_postal_aluno."', '".$bi_cc_aluno."', '".$arquivo_aluno."', '".$validade_aluno."', '".$contato_aluno."', '".$email_aluno."', 'password');";

	$sql_bd = mysqli_query($ligaBD , $sql);
	
	//relaciona prof e aluno
	$sql = "INSERT INTO `aluno_professor` (`num_processo`, `cod_prof`, `cod_anoLetivo`) 
		VALUES ('".$num_processo."', '".$cod_prof."', '".$_SESSION['ano']."');";


	$sql_bd = mysqli_query($ligaBD , $sql);
	
	//RELACIONA MONITOR E ALUNO
	$sql = "INSERT INTO `aluno_monitor` (`num_processo`, `cod_monitor`, `cod_anoLetivo`) VALUES ('".$num_processo."', '".$cod_monitor."', '".$_SESSION['ano']."');";
	$sql_bd = mysqli_query($ligaBD , $sql);
	
	//RELACIONA ENTIDADE E ALUNO
	$sql = "INSERT INTO `entidade_estagio_aluno` (`num_processo`, `NIF`, `cod_anoLetivo`) VALUES ('".$num_processo."', '".$nif."', '".$_SESSION['ano']."');";
	$sql_bd = mysqli_query($ligaBD , $sql);
	
	return 0;
?>