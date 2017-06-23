<?php
session_start();
include("../../php/ligacao.php");
$ano = $_SESSION["ano"] - 1;
$sql = "SELECT * FROM relatorio_semanal WHERE num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo= " . $ano;
$sql_bd = mysqli_query($ligaBD, $sql);
$num_linha = mysqli_num_rows($sql_bd);
?>
<img src="../img/close.png" onclick="popup_visible()" width="45px" height="auto" style="float: right;cursor: pointer;">

<script>
$("div[id^='head_semana']").click(function () {
    var id = this.id.replace('head_semana_', '');

    if ( $( "#con_semana_"+id ).is( ":hidden" ) ) {
        $('#head_semana_'+id).text(function (_,txt) {
            return txt.slice(0, -1);
        });
        $('#head_semana_'+id).append("▲");
        $( "#con_semana_"+id ).slideDown( "slow" );
    } else {
        $( "#con_semana_"+id ).slideUp( "slow" );
        $('#head_semana_'+id).text(function (_,txt) {
            return txt.slice(0, -1);
        });
        $('#head_semana_'+id).append("▼");
    }
});
</script>
<?php
echo '<form class="pure-form">';
for ($i=0;$i< $num_linha; $i++) {
    $dados = mysqli_fetch_array($sql_bd);
    echo "<h2><div id='head_semana_".$i."' style='cursor: pointer'>Relatório Semanal da Atividade Desenvolvida ".$dados['num_semana']." ▼</div></h2>";
    ?>


<div id="con_semana_<?php echo $i; ?>" style="display: none">
    <table border=0>
        <tr>
            <td> de <input readonly name="data_semana1" type="date" value="<?php echo $dados["data_semana1"]; ?>"> a <input readonly
                    name="data_semana2" type="date" value="<?php echo $dados["data_semana2"]; ?>"> das <input readonly
                    name="hora1" type="time" value="<?php echo $dados["hora1"]; ?>">as <input readonly name="hora2"
                                                                                              type="time"
                                                                                              value="<?php echo $dados["hora2"]; ?>">
            </td>
        </tr>
        <tr>
            <td>Atividade Desenvolvida:</td>
        </tr>
        <tr>
            <td><textarea readonly name="atividade_desenvolvida"
                          style="height:100px;width:800px;"><?php echo $dados["atividade_desenvolvida"]; ?></textarea>
            </td>
        </tr>
        <tr>
            <td><p></td>
        </tr>
        <tr>
            <td>Observações do Aluno Formando:</td>
        </tr>
        <tr>
            <td><textarea readonly name="observacao_aluno"
                          style="height:100px;width:800px;"><?php echo $dados["observacao_aluno"]; ?></textarea>
            </td>
        </tr>
        <tr>
            <td><p></td>
        </tr>
        <tr>
            <td>Observações do Monitor / Responsável na Entidade de Estágio:(não obrigatório)</td>
        </tr>
        <tr>
            <td><textarea readonly style="height:100px;width:800px;"><?php echo $dados["observacao_monitor"]; ?></textarea></td>
        </tr>

    </table>
</div>

    <?php
}
echo '</form>';
return;



    ?>
