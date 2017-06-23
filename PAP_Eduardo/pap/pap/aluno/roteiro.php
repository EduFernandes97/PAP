<?php
session_start();
include("../php/ligacao.php");
$sql = "SELECT ano FROM aluno where num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo=" . $_SESSION["ano"];
$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);
if ($dados ['ano'] == "12"){
?>
<div id="botao">
    <input type="button"  class="pure-button " value="11º Ano" onclick="popup_visible('roteiro.php')">
</div>
<?php } ?>
<h2>Roteiro de Atividades</h2>
<form class="pure-form">
<table border=0 id="tab_roteiro">
    <tr>
        <td></td>
        <td>Atividades a Desenvolver</td>
        <td>Observações</td>
    </tr>


    <?php


    $sql = "SELECT * FROM roteiro_atividade where num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo=" . $_SESSION["ano"];
    $sql_bd = mysqli_query($ligaBD, $sql);
    $num_linha = mysqli_num_rows($sql_bd);
    $z = 0;
    if ($num_linha != 0) {
        for ($i = 0; $i < $num_linha; $i++) {
            $dados = mysqli_fetch_array($sql_bd);
            $z = $i + 1;
            echo "<tr>
					<td>" . $z . "</td>
					<td><textarea maxlength='500' style='height:100px;width:633px;' onKeyPress='mostra_edita(" . $z . ")' name='atividade" . $z . "'>" . $dados["atividade"] . "</textarea></td>
					<td><textarea maxlength='500' style='height:100px;' onKeyPress='mostra_edita(" . $z . ")' name='obs" . $z . "'>" . $dados["observacao"] . "</textarea></td>
					<td><input type='image' src='../img/nao.png' onclick='apaga_roteiro(" . $dados["cod_atividade"] . ");return false;'></td>
					<td><input type='image' class='edita_roteiro" . $z . "' src='../img/edit.png' onclick='atualiza_roteiro(" . $dados["cod_atividade"] . ", " . $z . ");return false;'></td>
				</tr>";
        }
        if ($z < 3)
        echo "<tr><td></td><td><input type='image' src='../img/plus.png' onclick=' plus_roteiro(" . $z . "); return false; '></td></tr>";
    } else {
        echo "<tr>
				<td>1</td>
				<td><textarea maxlength='500' style='height:100px;width:633px;' name='atividade1'></textarea></td>
				<td><textarea maxlength='500' style='height:100px;' name='obs1'></textarea></td>
				<td><input type='image' src='../img/sim.png' onclick='novo_roteiro(1);return false;' style='display: block;'></td>
			</tr>";
    }

    echo "</table>";



    ?>


			</form>