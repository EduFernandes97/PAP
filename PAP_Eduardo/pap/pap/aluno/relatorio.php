<?php
session_start();
include("../php/ligacao.php");
$sql = "SELECT ano FROM aluno where num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo=" . $_SESSION["ano"];
$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);
if ($dados ['ano'] == "12"){
    ?>
    <div id="botao">
        <input type="button"  class="pure-button " value="11º Ano" onclick="popup_visible('relatorio.php')">
    </div>
    <?php
}
$sql = "SELECT * FROM relatorio_semanal WHERE num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo= " . $_SESSION["ano"];
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
$nova_semana = $num_linha + 1;
echo "<option value='" . $nova_semana . "'>Nova Semana</option>";


echo "</select></h2>";

if (isset($_SESSION['num_semana']))
    echo "<script>$( '#muda_semana' ).val(".$_SESSION['num_semana'].");</script>";

if (isset($_SESSION["num_semana"])) {
    echo "<h3>Semana " . $_SESSION["num_semana"] . "</h3>";
    $sql = "SELECT * FROM relatorio_semanal WHERE num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo= " . $_SESSION["ano"] . " and num_semana=" . $_SESSION["num_semana"];
    $sql_bd = mysqli_query($ligaBD, $sql);
    $dados = mysqli_fetch_array($sql_bd);
    $num_linha = mysqli_num_rows($sql_bd);
    ?>
    <form onsubmit="atualiza_relatorio();return false;" class="pure-form">
        <table border=0>
            <tr>
                <td> de <input id="data_semana_1" required name="data_semana1" type="date" value="<?php echo $dados["data_semana1"]; ?>"> a <input required onclick="validate_semana(this);"
                        name="data_semana2" id="data_semana_2" type="date" value="<?php echo $dados["data_semana2"]; ?>"> das <input required
                        name="hora1" type="time" value="<?php echo $dados["hora1"]; ?>">as <input name="hora2" required
                                                                                                  type="time"
                                                                                                  value="<?php echo $dados["hora2"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Atividade Desenvolvida:</td>
            </tr>
            <tr>
                <td><textarea maxlength="500" required name="atividade_desenvolvida"
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
                <td><textarea maxlength="500" name="observacao_aluno"
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
                <td><textarea maxlength="500" style="height:100px;width:833px;"
                              readonly><?php echo $dados["observacao_monitor"]; ?></textarea></td>
            </tr>
            <tr>
                <td><input  class="pure-button " type="submit" value="<?php if ($num_linha == 0) echo "Adicionar"; else echo "Atualizar"; ?>">
                    <?php if ($num_linha != 0) echo "<input style='float:right;' type='button'  class='pure-button ' onclick='apagar_relatorio();return false;' value='Apagar'>"; ?>
                </td>
            </tr>

        </table>
    </form>
<?php
}
?>
		
		
