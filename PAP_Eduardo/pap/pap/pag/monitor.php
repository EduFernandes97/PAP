<!DOCTYPE html>
<?php session_start(); 
	if (!isset($_SESSION["email"])){
		header("Location:../index.html");
	}
	include ("../php/ligacao.php");
	$sql = "SELECT * FROM monitor WHERE email_monitor LIKE '".$_SESSION["email"]."'";

	$sql_bd = mysqli_query($ligaBD , $sql);
	$linhas = mysqli_num_rows($sql_bd);
	if ($linhas==0) header("Location:sair.php");
	
	$sql = "SELECT * FROM ano_letivo WHERE ano_atual = '1'";

	$sql_bd = mysqli_query($ligaBD , $sql);
	$dados_ano_letivo = mysqli_fetch_array($sql_bd);
	$_SESSION["ano"]=$dados_ano_letivo['cod_anoLetivo'];
?>
<html>
	<head>
		<title>PAP - Eduardo Fernandes</title>
		<link href="../CSS/estilo_admin.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../img/icon.png">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../script/monitor/load.js">	</script>
		<script src="../script/monitor/submenu.js">	</script>
		<script src="../script/monitor/presencas.js">	</script>
        <script src="../script/monitor/popup.js">	</script>
        <script src="../script/monitor/relatorio.js">	</script>
        <script src="../script/monitor/av.js">	</script>
        <link href="../CSS/pure-release-0.5.0/forms.css" rel="stylesheet" type="text/css">
        <link href="../CSS/pure-release-0.5.0/buttons.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
		
		<div id = "geral">
		
			<div id="cabeca">
			<br>
				<div id="ano">
					<?php 
						
						$sql = "SELECT * FROM `monitor` 
							join aluno_monitor 
								on monitor.`cod_monitor` = aluno_monitor.`cod_monitor`
							join aluno 
								on aluno_monitor.`num_processo` = aluno.`num_processo` 
							where monitor.email_monitor='".$_SESSION["email"]."' and aluno.cod_anoLetivo= ".$dados_ano_letivo['cod_anoLetivo'];
						$sql_bd = mysqli_query($ligaBD , $sql);
						
						$num_aluno=mysqli_num_rows($sql_bd);
						echo "Ano Letivo: ".$dados_ano_letivo['anoLetivo'];
						
					?>

				
				
				</div>
				<div id="user-data">
					<font color="white"><b>Escolha o Aluno: </b><?php
						if (isset($_SESSION["aluno"])){
							$sql_aluno = "SELECT * FROM `aluno` where num_processo='".$_SESSION["aluno"]."'";
							$sql_aluno = mysqli_query($ligaBD , $sql_aluno);
							$dados_aluno = mysqli_fetch_array($sql_aluno);

						}
					?>

					<select class='select_prof' id="muda_aluno" onchange="muda_aluno();"><option value="" disabled selected>Escolha um Aluno</option><?php
						for ($i=0;$i<$num_aluno;$i++){
							
							$dados_aluno_monitor = mysqli_fetch_array($sql_bd);
							echo "<option value=".$dados_aluno_monitor["num_processo"].">";
							echo $dados_aluno_monitor["nome_aluno"]."</option>";
						}

					?></select>
					
                    </font>
                   <?php if (isset($_SESSION["aluno"]))
                    echo "<script> $('#muda_aluno').val('" . $_SESSION['aluno'] . "'); </script>";
                   ?>

				</div>
			</div>
			
			<div id="menu" unselectable='on' onselectstart='return false;'  onmousedown='return false;'>
				<div >
					<ul>
						<a href="#plano_estagio.php"><li id="plano_estagio">Plano de Estágio</li></a>
						<a href="#roteiro.php"><li id="roteiro">Roteiro de Atividades</li></a>
						<a href="#relatorio.php"><li id="relatorio">Relatórios Semanal</li></a>
						<a href="#registo_presencas.php"><li id="registo_presencas">Registo de Presenças</li></a>
						<a href="#av.php"><li id="av">Avaliação</li></a>
                        <a href="sair.php"><li>Terminar Sessão</li></a>
						

					</ul>
				</div>
				
			</div>
			<div id="down"></div>

			<div id="conteudo"></div>
			<div id="popup">
				<div class="popupConteudo">
					<?php include('popup/plano_estagio.php'); ?>
					<p>Clique <a href="javascript:void(0)" onclick="popup_visible('popup');">aqui</a> para fechar.</p>
				</div>
			</div>
	
	<div id="rodape" align="center" >	
		<br><b>Eduardo Fernandes @ 2015</b>
	</div>
	

	</div>


	</body>


</html>