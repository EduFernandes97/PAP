<?php
session_start();
include("../../php/ligacao.php");
$ano = $_SESSION["ano"] - 1;
?>
<div>
    <img src="../img/close.png" onclick="popup_visible()" width="45px" height="auto" style="float: right;cursor: pointer;">

    <h2>Registo de Presenças FCT/Estágio <select class='select_prof' name='mes_pop' onchange='muda_mes_pop();'></select></h2>
    <h3><p id="mes_sele_pop"></p></h3>

<?php
$sql = "SELECT * FROM aluno where num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo=".$ano;
$sql_nome = mysqli_query($ligaBD, $sql);
$dados_aluno = mysqli_fetch_array($sql_nome);
$nome = $dados_aluno["nome_aluno"];

$sql = "SELECT * FROM reg_presenca where num_processo='" . $dados_aluno["num_processo"] . "' and cod_anoLetivo=" . $ano." order by data asc";
$sql_bd = mysqli_query($ligaBD, $sql);
$num_linha = mysqli_num_rows($sql_bd);

$meses = array
(
    array()
);

$edit = 0;
$ult_mes="";

$qwe = 0;
$table = -1;
for ($i = 0; $i < $num_linha; $i++) {
    $dados_presencas = mysqli_fetch_array($sql_bd);

    if ($ult_mes != $dados_presencas["data"][6] ){
        $table++;
        ?>
        <script>$("#reg_pre_pop_"+(<?php echo $table; ?> - 1)).hide();</script>
        <form class="pure-form" onsubmit="return false;">
            <table border=2 width="700" id="reg_pre_pop_<?php echo $qwe; ?>">
                <tr id="linha1">
                    <td rowspan="2" align="center">Data</td>
                    <td rowspan="2" align="center">N.º de horas</td>
                    <td colspan="2" align="center">Assinatura</td>
                    <td rowspan="2" align="center">Observações</td>
                </tr>
                <tr>
                    <td align="center">Aluno Formando</td>
                    <td align="center">Monitor /<br> Responsável na <br> Entidade</td>
                </tr>

            </table>
        </form>

        <?php
        $qwe++;
        $ult_mes=$dados_presencas["data"][6];
        $meses[$qwe-1][0] = $dados_presencas["data"][5].$dados_presencas["data"][6];
        $meses[$qwe-1][] = $dados_presencas["data"][8].$dados_presencas["data"][9];

    }
    else{

        $meses[$qwe-1][] = $dados_presencas["data"][8].$dados_presencas["data"][9];
    }
    echo '<script>plus_img_popup(0,"' . $dados_presencas["cod_presenca"] . '",""
			,"' . $dados_presencas["data"] . '","' . $dados_presencas["num_hora"] . '",
			"' . $dados_presencas["ass_aluno"] . '","' . $dados_presencas["ass_monitor"] . '",
			"' . $dados_presencas["observacao"] . '","' . $edit . '", "'.$table.'");</script>';


}

$todos_meses = array('Janeira', 'Fevereiro', 'Março', 'Abril', 'Maio', "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");


for ($row = 0; $row < count($meses); $row++) {
    $ult = count($meses) - 1;
    if ($ult == $row)
        echo "<script>add_select_pop(1, ".$row.", '".$todos_meses[ intval($meses[$row][0]) -1 ]."');</script>";
    else
        echo "<script>add_select_pop(0, ".$row.", '".$todos_meses[ intval($meses[$row][0]) -1 ]."');</script>";

}


return;
