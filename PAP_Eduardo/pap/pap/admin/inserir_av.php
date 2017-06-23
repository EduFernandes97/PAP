<?php
session_start();
include("../php/ligacao.php");

$sql = 'SELECT * FROM cursos';
$sql_bd = mysqli_query($ligaBD, $sql);
$linhas = mysqli_num_rows($sql_bd);

echo "<form class='pure-form'><select onchange='muda_curso()' name='curso'><option disabled selected>Escolha um Curso</option>";

for ($i = 0; $i < $linhas; $i++) {
    $dados = mysqli_fetch_array($sql_bd);
    echo "<option name='curso' value = '" . $dados['cod_curso'] . "'>" . utf8_encode($dados['curso']) . "</option>";
}

echo "</select></form>";


if (!isset($_SESSION['curso'])){
    echo "<br> Escolha um Curso da Lista";
    return;
}
echo "<script> $('select[name=curso]').val('" . $_SESSION['curso'] . "'); </script>";
//Todos os objetivos do curso do aluno
$sql = "SELECT * FROM `objetivo_final` WHERE `cod_anoLetivo` = " . $_SESSION['ano'] . " and cod_curso = '".$_SESSION['curso']."' order by dominio";


$sql_objetivos = mysqli_query($ligaBD, $sql);
$num_objetivo = mysqli_num_rows($sql_objetivos);

//numero de objetivos de Cognitivo
$sql = "SELECT Count(*) as num FROM `objetivo_final` WHERE `cod_anoLetivo` = " . $_SESSION['ano'] . " and cod_curso = '".$_SESSION['curso']."' and dominio = 'Cognitivo'";
$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);
$num_cognitivo = $dados["num"];

$num_socioafetivo = $num_objetivo - $num_cognitivo;


?>
<br>
<table border=1 width=900>
    <tr>
        <th align="center">Domínio</th>
        <th align="center">Objectivos</th>
        <td style="border: none; width: 1px"></td>
    </tr>
    <?php


    for ($i = 0; $i < $num_cognitivo; $i++) {

        $objetivos = mysqli_fetch_array($sql_objetivos);
        if ($i == 0) {
            echo "
			<tr>
			    <td rowspan='" . $num_cognitivo . "' align='center'><b>Cognitivo</b></td>
				<td >" . $objetivos["objetivo"] . "</td>
				<td style='border: none;width: 1px'><input type='image' src='../img/nao.png' onclick='apaga_av(".$objetivos['num_objetivo_final'].");return false;'></td>
			</tr>
		    ";
        }
        else{
            $soma = $i +1;
            echo "
			<tr>
				<td >" . $objetivos["objetivo"] . "</td>
				<td style='border: none'><input type='image' src='../img/nao.png' onclick='apaga_av(". $objetivos['num_objetivo_final'] .");return false;'></td>
			</tr>
		    ";
        }
    }

    for ($i = 0; $i < $num_socioafetivo; $i++) {

        $objetivos = mysqli_fetch_array($sql_objetivos);
        if ($i == 0) {
            $soma =$num_cognitivo + 1;
            echo "
			<tr>
			    <td rowspan='" . $num_socioafetivo . "' align='center'><b>Socioafetivo</b></td>
				<td >" . $objetivos["objetivo"] . "</td>
				<td style='border: none'><input type='image' src='../img/nao.png' onclick='apaga_av(". $objetivos['num_objetivo_final'] .");return false;'></td>
			</tr>
		    ";
        }
        else{
            $soma = $num_cognitivo + $i +1;
            echo "
			<tr>
				<td >" . $objetivos["objetivo"] . "</td>
				<td style='border: none'><input type='image' src='../img/nao.png' onclick='apaga_av(". $objetivos['num_objetivo_final'] .");return false;'></td>
			</tr>
		    ";
        }
    }
    echo "</table>";


    ?>

    <br>
    <form  class="pure-form" onsubmit="insere_nova_av(<?php echo $num_objetivo; ?>);return false;">
        <table >
            <tr>
                <td>Objetivo:</td>
                <td><input type="text" required name="objetivo"></td>

                <td>
                    <select name="dominio">
                        <option value="Cognitivo">Cognitivo</option>
                        <option value="Socioafetivo">Socioafetivo</option>
                    </select>
                </td>
                <td>


                </td>
            </tr>
            <tr>

                <td><input class='pure-button' type="submit" value="Novo Objetivo"></td>
            </tr>

        </table>
    </form>



