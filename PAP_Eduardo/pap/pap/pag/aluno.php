
<?php session_start(); 
	if (!isset($_SESSION["email"])){
		header("Location:../index.html");
	}
	
	include ("../php/ligacao.php");
	$sql = "SELECT * FROM aluno WHERE email_aluno LIKE '".$_SESSION["email"]."'";

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
		<link href="../CSS/estilo_aluno.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="../img/icon.png">
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
        <script src="../script/jquery.js"></script>
		<script src="../script/aluno/load.js">	</script>
		<script src="../script/aluno/submenu.js">	</script>
		<script src="../script/aluno/presencas.js">	</script>
		<script src="../script/aluno/popup.js">	</script>
		<script src="../script/aluno/plano_estagio.js">	</script>
		<script src="../script/aluno/roteiro.js">	</script>
		<script src="../script/aluno/relatorio.js">	</script>
		<script src="../script/aluno/av.js">	</script>
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
						
						$sql = "select * from aluno
							join aluno_monitor on aluno.num_processo = aluno_monitor.num_processo and aluno_monitor.cod_anoLetivo='".$dados_ano_letivo['cod_anoLetivo']."'
							join monitor on aluno_monitor.cod_monitor = monitor.cod_monitor
							join aluno_professor on aluno.num_processo = aluno_professor.num_processo and aluno_professor.cod_anoLetivo='".$dados_ano_letivo['cod_anoLetivo']."'
							join professor on aluno_professor.cod_prof = professor.cod_prof 
							join entidade_estagio on entidade_estagio.NIF = monitor.NIF 
							join ano_letivo on aluno.cod_anoLetivo = ano_letivo.cod_anoLetivo 
							where aluno.email_aluno = '".$_SESSION["email"]."' and aluno.cod_anoLetivo = '".$dados_ano_letivo['cod_anoLetivo']."'";
						
						$sql_bd = mysqli_query($ligaBD , $sql);
						$dados_aluno_monitor_prof_ent = mysqli_fetch_array($sql_bd);
						
						echo "Ano Letivo: ".$dados_ano_letivo['anoLetivo'];
					?>
					
				
				
					
				</div>
								
				<div id="user-data">
					
					<b>Nome do Aluno:</b> <?php echo utf8_encode($dados_aluno_monitor_prof_ent["nome_aluno"]); ?> <br/>
					<b>Nome do Professor/Orientador:</b> <?php echo utf8_encode($dados_aluno_monitor_prof_ent["nome_prof"]); ?> <br/>
					<b>Nome do Monitor de Estágio:</b> <?php echo utf8_encode($dados_aluno_monitor_prof_ent["nome_monitor"]); ?> <br/>
					<b>Entidade de Estágio:</b> <?php echo utf8_encode($dados_aluno_monitor_prof_ent["denominacao"]); ?> <br/>
					<b>Ano:</b> <?php echo $dados_aluno_monitor_prof_ent["ano"]; ?>º <br/>
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

                        <!--<li onclick="av()" class="menu_sub">Avaliação
                            <ul id="submenu">
                                <li onclick="av()" class="sub">sub1 ►</li>
                                <li onclick="av()" class="sub">sub2 ►</li>
                            </ul>
                        </li>-->
					</ul>
				</div>
				
			</div>
			<div id="down"></div>

			<div id="conteudo">
				
			</div>
			<div id="popup">
				<div class="popupConteudo">

					<p>Clique <a href="javascript:void(0)" onclick="popup_visible('popup');">aqui</a> para fechar.</p>
				</div>
			</div>
	
	<div id="rodape" align="center" >	
		<br><b>Eduardo Fernandes @ 2015</b>
	</div>
	
	</div>


	</body>


</html>