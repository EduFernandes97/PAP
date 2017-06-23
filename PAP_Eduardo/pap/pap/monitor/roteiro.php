<h2>Roteiro de Atividades</h2>
<form  class="pure-form">
<table border=0 id="tab_roteiro">
    <tr>
        <td></td>
        <td>Atividades a Desenvolver</td>
        <td>Observações</td>
    </tr>


<?php
session_start();
include("../php/ligacao.php");
$sql = "SELECT * FROM roteiro_atividade where num_processo='" . $_SESSION["aluno"] . "' and cod_anoLetivo=" . $_SESSION["ano"];

$sql_bd = mysqli_query($ligaBD, $sql);
$num_linha = mysqli_num_rows($sql_bd);
$z = 0;
if ($num_linha != 0) {
    for ($i = 0; $i < $num_linha; $i++) {
        $dados = mysqli_fetch_array($sql_bd);
        $z = $i + 1;
        echo "<tr>
					<td>" . $z . "</td>
					<td><textarea readonly style='height:100px;width:633px;' onKeyPress='mostra_edita(" . $z . ")' name='atividade" . $z . "'>" . $dados["atividade"] . "</textarea></td>
					<td><textarea readonly style='height:100px;' onKeyPress='mostra_edita(" . $z . ")' name='obs" . $z . "'>" . $dados["observacao"] . "</textarea></td>
				</tr>";
    }
} else {
    echo "<tr>
				<td>1</td>
				<td><textarea readonly style='height:100px;width:633px;' name='atividade1'></textarea></td>
				<td><textarea readonly  style='height:100px;' name='obs1'></textarea></td>
			</tr>";
}

echo "</table>";



?>
    </form>