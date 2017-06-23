﻿<?php
session_start();
include("../php/ligacao.php");

$sql = "SELECT ano FROM aluno where num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo=" . $_SESSION["ano"];
$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);
if ($dados ['ano'] == "12"){
    ?>
    <div id="botao">
        <input type="button"  class="pure-button " value="11º Ano" onclick="popup_visible('registo_presencas.php')">
    </div>
<?php } ?>
<div>
    <h2>Registo de Presenças FCT/Estágio <select class='select_prof' name='mes' onchange='muda_mes();'></select></h2>
    <h3><p id="mes_sele"></p></h3>


    <?php
    $sql = "SELECT * FROM aluno where email_aluno='" . $_SESSION["email"] . "'";
    $sql_nome = mysqli_query($ligaBD, $sql);
    $dados_aluno = mysqli_fetch_array($sql_nome);
    $nome = $dados_aluno["nome_aluno"];

    $sql = "SELECT * FROM reg_presenca where num_processo='" . $dados_aluno["num_processo"] . "' and cod_anoLetivo=" . $_SESSION["ano"]." order by data asc";
    $sql_bd = mysqli_query($ligaBD, $sql);
    $num_linha = mysqli_num_rows($sql_bd);

    if ($num_linha == 0){
        ?>
        <form  onsubmit="nova_presenca();plus_img(3);return false;">
            <table border=2 width="900" id="reg_pre_<?php echo $qwe; ?>">
                <tr id="linha1">
                    <td rowspan="2" align="center">Data</td>
                    <td rowspan="2" align="center">N.º de horas</td>
                    <td colspan="2" align="center">Assinatura</td>
                    <td rowspan="2" align="center">Observações</td>
                    <td rowspan="2" align="center" class="no_border"></td>
                </tr>
                <tr>
                    <td align="center">Aluno Formando</td>
                    <td align="center">Monitor /<br> Responsável na <br> Entidade</td>
                </tr>

                <tr>
                    <td >
                        <input type='date' name='data_presen' required>
                    </td>
                    <td >
                        <input type='number' name='hora_presen' required>
                    </td>
                    <td >
                        <input value='<?php echo $nome; ?>' type='text' name='nome_aluno' readonly>
                    </td>
                    <td >

                    </td>
                    <td >
                        <textarea name='obs_presen'></textarea>
                    </td>
                    <td class="no_border">
                        <input type='image' src='../img/sim.png' onclick=''>
                    </td>

                </tr>

            </table>
        </form>

        <?php
        return;
    }

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
            <script>$("#reg_pre_"+(<?php echo $table; ?> - 1)).hide();</script>
            <form  onsubmit="nova_presenca();plus_img(3);return false;">
                <table border=2 width="900" id="reg_pre_<?php echo $qwe; ?>">
                    <tr id="linha1">
                        <td rowspan="2" align="center">Data</td>
                        <td rowspan="2" align="center">N.º de horas</td>
                        <td colspan="2" align="center">Assinatura</td>
                        <td rowspan="2" align="center">Observações</td>
                        <td rowspan="2" align="center" class="no_border"></td>
                    </tr>
                    <tr>
                        <td align="center">Aluno Formando</td>
                        <td align="center">Monitor /<br> Responsável na <br> Entidade</td>
                    </tr>

                    <tr>
                        <td class="no_border">
                            <?php
                            $sql = "SELECT * FROM aluno where email_aluno='" . $_SESSION["email"] . "'";
                            $sql_nome = mysqli_query($ligaBD, $sql);
                            $dados_aluno = mysqli_fetch_array($sql_nome);
                            $nome = $dados_aluno["nome_aluno"];
                            echo "<input type='image' id=\"no_submit\" src=\"../img/plus.png\" alt=\"Submit\" width=\"15\" height=\"15\" onclick=\" plus_img(1,'','" . $nome . "','','','','','','','".$table."'); return false; \">"; ?>
                        </td>

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
        echo '<script>plus_img(0,"' . $dados_presencas["cod_presenca"] . '",""
			,"' . $dados_presencas["data"] . '","' . $dados_presencas["num_hora"] . '",
			"' . $dados_presencas["ass_aluno"] . '","' . $dados_presencas["ass_monitor"] . '",
			"' . $dados_presencas["observacao"] . '","' . $edit . '", "'.$table.'");</script>';


    }

    $todos_meses = array('Janeira', 'Fevereiro', 'Março', 'Abril', 'Maio', "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");


    for ($row = 0; $row < count($meses); $row++) {
        $ult = count($meses) - 1;
        if ($ult == $row)
            echo "<script>add_select(1, ".$row.", '".$todos_meses[ intval($meses[$row][0]) -1 ]."');</script>";
        else
            echo "<script>add_select(0, ".$row.", '".$todos_meses[ intval($meses[$row][0]) -1 ]."');</script>";

    }


return;
