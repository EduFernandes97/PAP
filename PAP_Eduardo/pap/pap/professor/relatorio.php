<?php
session_start();
include("../php/ligacao.php");
if (!isset($_SESSION['aluno'])) {
    echo "Escolha um aluno no topo do site!";
    echo "<h2>Relatório Semanal da Atividade Desenvolvida &nbsp";

    return;
}
$sql = "SELECT * FROM relatorio_semanal WHERE num_processo='" . $_SESSION["aluno"] . "' and cod_anoLetivo= " . $_SESSION["ano"];
$sql_bd = mysqli_query($ligaBD, $sql);
$num_linha = mysqli_num_rows($sql_bd);

echo "<h2>Relatório Semanal da Atividade Desenvolvida &nbsp";

echo "<select class='select_prof' id='muda_semana' onchange='muda_semana()'>";
echo "<option value='' disabled selected>Escolha uma Semana</option>";
for ($i = 0; $i < $num_linha; $i++) {
    $dados = mysqli_fetch_array($sql_bd);
    echo "<option value=" . $dados["num_semana"] . ">";
    echo "Semana " . $dados["num_semana"] . "</option>";
}

echo "</select></h2>";

if (isset($_SESSION["num_semana"])) {
    echo "<script>$( '#muda_semana' ).val(".$_SESSION['num_semana'].");</script>";
    echo "<h3>Semana " . $_SESSION["num_semana"] . "</h3>";
    $sql = "SELECT * FROM relatorio_semanal WHERE num_processo='" . $_SESSION["aluno"] . "' and cod_anoLetivo= " . $_SESSION["ano"] . " and num_semana=" . $_SESSION["num_semana"];
    $sql_bd = mysqli_query($ligaBD, $sql);
    $dados = mysqli_fetch_array($sql_bd);
    $num_linha = mysqli_num_rows($sql_bd);
    ?>
    <form  class="pure-form" onsubmit="atualiza_relatorio();return false;" class="pure-form">
        <table border=0>
            <tr>
                <td> de <input name="data_semana1" type="date" value="<?php echo $dados["data_semana1"]; ?>"> a <input
                        name="data_semana2" type="date" value="<?php echo $dados["data_semana2"]; ?>"> das <input
                        name="hora1" type="time" value="<?php echo $dados["hora1"]; ?>">as <input name="hora2"
                                                                                                  type="time"
                                                                                                  value="<?php echo $dados["hora2"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Atividade Desenvolvida:</td>
            </tr>
            <tr>
                <td><textarea name="atividade_desenvolvida"
                              style="height:100px;width:833px;"><?php echo $dados["atividade_desenvolvida"]; ?></textarea>
                </td>
            </tr>
            <tr>
                <td><p></td>
            </tr>
            <tr>
                <td>Observações do Aluno Formando:</td>
            </tr>
            <tr>
                <td><textarea name="observacao_aluno"
                              style="height:100px;width:833px;"><?php echo $dados["observacao_aluno"]; ?></textarea>
                </td>
            </tr>
            <tr>
                <td><p></td>
            </tr>
            <tr>
                <td>Observações do Monitor / Responsável na Entidade de Estágio:(não obrigatório)</td>
            </tr>
            <tr>
                <td><textarea style="height:100px;width:833px;"
                              readonly><?php echo $dados["observacao_monitor"]; ?></textarea></td>
            </tr>
        </table>
    </form>
<?php
}
?>
		
		
