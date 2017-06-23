<?php
session_start();
include("../../php/ligacao.php");

$ano = $_SESSION ['ano'];
$ano = $ano-1 ;



    ?>
    <img src="../img/close.png" onclick="popup_visible()" width="45px" height="auto" style="float: right;cursor: pointer;">

<?php

echo "<h2>Autoavaliação do aluno formando na FCT</h2>";

$sql = "SELECT * FROM av_aluno_total \n"
    . "WHERE num_processo = " . $_SESSION['num_proc'] ." and cod_anoLetivo = " . $ano;
$sql_bd = mysqli_query($ligaBD, $sql);
$dados_total = mysqli_fetch_array($sql_bd);

//numero de objetivos de Cognitivo
$sql = "SELECT count(*) as num FROM `aluno` \n"
    . "	JOIN objetivo_aluno on objetivo_aluno.cod_curso = aluno.cod_curso\n"
    . "WHERE aluno.cod_anoLetivo = " . $ano . " and aluno.num_processo = " . $_SESSION['num_proc'] . " and objetivo_aluno.dominio = \"Cognitivo\" and objetivo_aluno.cod_anoLetivo =" . $ano;

$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);
$num_cognitivo = $dados["num"];


//numero de objetivos de Socioafetivo
$sql = "SELECT count(*) as num FROM aluno \n"
    . "	JOIN objetivo_aluno on objetivo_aluno.cod_curso = aluno.cod_curso\n"
    . "WHERE aluno.cod_anoLetivo = " . $ano . " and aluno.num_processo = " . $_SESSION['num_proc'] . " and objetivo_aluno.dominio = \"Socioafetivo\" and objetivo_aluno.cod_anoLetivo =" . $ano ;

$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);
$num_socioafetivo = $dados["num"];


//Todos os objetivos do curso do aluno
$sql = "SELECT * FROM aluno \n"
    . "	JOIN objetivo_aluno on objetivo_aluno.cod_curso = aluno.cod_curso\n"
    . "WHERE aluno.cod_anoLetivo = " . $ano . " and aluno.num_processo = " . $_SESSION['num_proc'] ." and objetivo_aluno.cod_anoLetivo =" . $ano." order by dominio";

$sql_objetivos = mysqli_query($ligaBD, $sql);
$objetivos = mysqli_fetch_array($sql_objetivos);
$num_objetivo = mysqli_num_rows($sql_objetivos);


//Notas de cada objetivo
$sql = "SELECT av_aluno.nota, av_aluno.num_objetivo_aluno, objetivo_aluno.dominio, objetivo_aluno.objetivo FROM aluno
  JOIN objetivo_aluno ON objetivo_aluno.cod_curso = aluno.cod_curso
  join av_aluno on av_aluno.num_objetivo_aluno = objetivo_aluno.num_objetivo_aluno and av_aluno.num_processo = aluno.num_processo
  WHERE aluno.num_processo = " . $_SESSION['num_proc'] . "  and aluno.cod_anoLetivo =" . $ano ." and av_aluno.cod_anoLetivo =" . $ano." order by dominio";

$sql_notas = mysqli_query($ligaBD, $sql);
$num_linhas = mysqli_num_rows($sql_notas);


$num_cognitivo1 = 0;
$num_socioafetivo1 = 0;
while($row = mysqli_fetch_array($sql_notas)) { $rows[] = $row;}
if (!empty($rows)){
    foreach($rows as $row){
        $dom = stripslashes($row['dominio']);
        if ($dom == "Cognitivo"){
            $num_cognitivo1++;
        }
        if ($dom == "Socioafetivo"){
            $num_socioafetivo1++;
        }
    }
}
$sql_notas = mysqli_query($ligaBD, $sql);
$notas =  mysqli_fetch_array($sql_notas);





if ($num_linhas > 0) {

?>

<form onsubmit="atualiza_av();return false;" class="pure-form">
    <table border=1 width=800>
        <tr>
            <th align="center">Domínio</th>
            <th align="center">Objetivos</th>
            <th align="center">Autoavaliação*</th>
        </tr>
        <tr>
            <td rowspan='<?php echo $num_cognitivo ?>' align="center"><b>Cognitivo</b></td>
            <td><?php echo $notas["objetivo"] ?></td>
            <td align="center"><input readonly max='5' min'1'name='nota[<?php echo $notas["num_objetivo_aluno"] ?>]' type='number' max='5' min='1' size='5' value='<?php echo $notas["nota"] ?>'></td>
        </tr>

        <?php
        for ($i = 1; $i < $num_cognitivo ; $i++) {
            $notas = mysqli_fetch_array($sql_notas);
            $objetivos = mysqli_fetch_array($sql_objetivos);
            echo "
			<tr>
				<td >" . $objetivos["objetivo"] . "</td>
				<td align=\"center\"><input readonly name='nota[" . $notas["num_objetivo_aluno"] . "]' type='number' max='5' min='1' size='5' value='" . $notas["nota"] . "'></td>
			</tr>
		";


        }
        $notas = mysqli_fetch_array($sql_notas);
        $objetivos = mysqli_fetch_array($sql_objetivos);

        ?>
        <tr>
            <td rowspan='<?php echo $num_socioafetivo1 ?>' align="center"><b>Socioafetivo</b></td>
            <td><?php echo $objetivos["objetivo"] ?></td>
            <td align="center"><input readonly name='nota[<?php echo $notas["num_objetivo_aluno"] ?>]' type='number' max='5' min='1' size='5'
                                      value='<?php echo $notas["nota"] ?>'></td>
        </tr>


        <?php
        for ($i = $num_cognitivo; $i < $num_objetivo - 1; $i++) {

            $notas = mysqli_fetch_array($sql_notas);
            $objetivos = mysqli_fetch_array($sql_objetivos);
            echo "
			<tr>
				<td >" . $objetivos["objetivo"] . "</td>
				<td align=\"center\"><input readonly name='nota[" . $notas["num_objetivo_aluno"] . "]' max='5' min='1' type='number' size='5' value='" . $notas["nota"] . "'></td>
			</tr>
		";

        }
        echo "<tr>
		<td colspan=4 ><b>1</b> - Mau
		<b>2</b> - Insuficiente
		<b>3</b> - Suficiente
		<b>4</b> - Bom
		<b>5</b> - Muito Bom</td>
	</tr>
</table>";

        echo "<br>
<br>
Observações do aluno formando (Autoavaliação Global):<br>
<textarea readonly maxlength='500' name='obs_aluno' style='height:135px;width:800px;''>".$dados_total['observacao']."</textarea>";



        echo "</form>";


        } else {
        //SE NÃO TEM REGISTOS
        ?>
        <form class="pure-form" onsubmit="insere_av();return false;">

            <table border=1 width=800>
                <tr>
                    <th align="center">Domínio</th>
                    <th align="center">Objetivos</th>
                    <th align="center">Autoavaliação*</th>
                </tr>
                <tr>
                    <td rowspan='<?php echo $num_cognitivo ?>' align="center"><b>Cognitivo</b></td>
                    <td><?php echo $objetivos["objetivo"] ?></td>
                    <td align="center"><input readonly max="5" min="1"
                                              name='nota[<?php echo $objetivos["num_objetivo_aluno"] ?>]' type='number'
                                              size='5'></td>
                </tr>

                <?php


                for ($i = 1; $i < $num_cognitivo; $i++) {
                    $notas = mysqli_fetch_array($sql_notas);
                    $objetivos = mysqli_fetch_array($sql_objetivos);

                    echo "
			<tr>
				<td >" . $objetivos["objetivo"] . "</td>
				<td align=\"center\"><input readonly max='5' min='1' name='nota[" . $objetivos["num_objetivo_aluno"] . "]' type='number' size='5' ></td>
			</tr>
		";


                }

                $notas = mysqli_fetch_array($sql_notas);
                $objetivos = mysqli_fetch_array($sql_objetivos);

                ?>
                <tr>
                    <td rowspan='<?php echo $num_socioafetivo ?>' align="center"><b>Socioafetivo</b></td>
                    <td><?php echo $objetivos["objetivo"] ?></td>
                    <td align="center"><input readonly max='5' min='1'
                                              name='nota[<?php echo $objetivos["num_objetivo_aluno"] ?>]' type='number'
                                              size='5'></td>
                </tr>


                <?php
                for ($i = $num_cognitivo; $i < $num_objetivo - 1; $i++) {
                    $notas = mysqli_fetch_array($sql_notas);
                    $objetivos = mysqli_fetch_array($sql_objetivos);
                    echo "
			<tr>
				<td >" . $objetivos["objetivo"] . "</td>
				<td align=\"center\"><input  readonly max='5' min='1' name='nota[" . $objetivos["num_objetivo_aluno"] . "]' type='number' value='" . $notas["nota"] . "'></td>
			</tr>
		";

                }
                echo "<tr>
		<td colspan=4 ><b>1</b> - Mau
		<b>2</b> - Insuficiente
		<b>3</b> - Suficiente
		<b>4</b> - Bom
		<b>5</b> - Muito Bom</td>
	</tr>
</table>";

                echo "<br>
<br>
Observações do aluno formando (Autoavaliação Global):<br>
<textarea readonly maxlength='500' name='obs_aluno' style='height:135px;width:800px;''></textarea>";
                if ($num_objetivo == 0) {
                    echo "<br><b>O professor orientador ainda não defeniu os objetivos.</b>";

                }


                }
                return;
                ?>


