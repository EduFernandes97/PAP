<?php
	session_start();
	include ("../php/ligacao.php");
	if (isset($_SESSION["aluno"])){
		$sql = "SELECT * FROM plano_estagio where num_processo='".$_SESSION["aluno"]."' and cod_anoLetivo=".$_SESSION["ano"];
		$sql_bd = mysqli_query($ligaBD , $sql);
		$num_linha=mysqli_num_rows($sql_bd);
		
		$dados = mysqli_fetch_array($sql_bd);
	}else {
		echo "<br>Escolha um aluno no topo do site.";
		$dados=0;
	}
?>

<h2>Plano de Estágio</h2>
<form class="pure-form">
<h5>Cronograma de Realização do Estágio</h5>
<table border=0>
	<tr>
		<td>Duração do Estágio:</td>
		<td><input name="duracao_estagio" type="text" value="<?php echo $dados["duracao_estagio"] ?>" readonly></td>
	</tr>
	<tr>
		<td>Dia(s) da Semana:</td>
		<td><input name="dias_semana" type="text" value="<?php echo $dados["dias_semana"] ?>" readonly></td>
	</tr>
	<tr>
		<td>Período de Estágio:</td>
		<td> de <input name="periodo_estagio1" type="date" value="<?php echo $dados["periodo_estagio1"] ?>" readonly> </td><td> a <input type="date" name="periodo_estagio2" readonly value="<?php echo $dados["periodo_estagio2"] ?>" ></td>
	</tr>
	<tr>
		<td>Horário Diário:</td>
			<td>das <input readonly type="time" name="horario_diario11" value="<?php echo $dados["horario_diario11"] ?>"> às <input readonly type="time" name="horario_diario12" value="<?php echo $dados["horario_diario12"] ?>"></td>
			<td>e das <input readonly type="time" name="horario_diario21" value="<?php echo $dados["horario_diario21"] ?>"> às <input readonly type="time" name="horario_diario22" value="<?php echo $dados["horario_diario22"] ?>"></td>
	</tr>

</table>
<br>

<h5>Previsão das Ações de Acompanhamento</h5>

<table border=0>
	<tr>
		<td>Número de visitas de acompanhamento <br>pelo professor orientador de estágio:</td>
		<td><input type="number" name="num_visitas" value="<?php echo $dados["num_visitas"] ?>" readonly></td>
	</tr>
	<tr>
		<td>Na Escola:</td>
		<td><input type="number" name="num_visitas_escola" value="<?php echo $dados["num_visitas_escola"] ?>" readonly ></td>
	</tr>
	<tr>
		<td>Na Entidade de Estágio:</td>
		<td><input type="number" name="num_visitas_estagio" value="<?php echo $dados["num_visitas_estagio"] ?>" readonly> </td>
	</tr>


</table>
<br>

<h5>Objetivos Gerais</h5>
<table border=1 style="width:900px">
	<tr>
		<td><b>O1</b>. Desenvolver e consolidar, em contexto real de trabalho, os conhecimentos e as competências profissionais adquiridos durante a frequência do curso;</td>
	</tr>
	<tr>
		<td><b>O2</b>. Proporcionar experiências de carácter sócio - profissional que facilitem a futura integração dos jovens no mundo de trabalho;</td>
	</tr>
	<tr>
		<td><b>O3</b>. Desenvolver aprendizagens no âmbito da saúde, higiene e segurança no trabalho.</td>
	</tr>
</table>
<h5>Objetivos Específicos</h5>
<textarea style="height:135px;width:900px;" name="objetivos" readonly><?php echo $dados["objetivos"] ?></textarea>

<h5>Conteudos a abordar</h5>
<textarea style="height:105px;width:900px;" name="conteudos" readonly><?php echo $dados["conteudos"] ?></textarea>
</form>
