<?php
session_start();
include("../../php/ligacao.php");
$ano = $_SESSION["ano"] - 1 ;
$sql = "SELECT * FROM plano_estagio where num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo=" . $ano;
$sql_bd = mysqli_query($ligaBD, $sql);
$num_linha = mysqli_num_rows($sql_bd);


$dados = mysqli_fetch_array($sql_bd);

?>
<img src="../img/close.png" onclick="popup_visible()" width="45px" height="auto" style="float: right;cursor: pointer;">

<h2>Plano de Estágio</h2>

<h5>Cronograma de Realização do Estágio</h5>
<form class="pure-form" onsubmit="atualiza_plano(<?php echo $dados["cod_plano"]; ?>);return false;">
    <table border=0>
        <tr>
            <td>Duração do Estágio:</td>
            <td><input name="duracao_estagio" type="text" readonly value="<?php echo $dados["duracao_estagio"] ?>"></td>
        </tr>
        <tr>
            <td>Dia(s) da Semana:</td>
            <td><input name="dias_semana" type="text" readonly value="<?php echo $dados["dias_semana"] ?>"></td>
        </tr>
        <tr>
            <td>Período de Estágio:</td>
            <td> de <input name="periodo_estagio1" readonly type="date" value="<?php echo $dados["periodo_estagio1"] ?>">
            </td>
            <td> a <input type="date" readonly name="periodo_estagio2" value="<?php echo $dados["periodo_estagio2"] ?>"></td>
        </tr>
        <tr>
            <td>Horário Diário:</td>
            <td>das <input type="time" readonly name="horario_diario11" value="<?php echo $dados["horario_diario11"]; ?>"> às
                <input type="time" readonly name="horario_diario12" value="<?php echo $dados["horario_diario12"]; ?>"></td>
            <td>e das <input readonly type="time" name="horario_diario21" value="<?php echo $dados["horario_diario21"] ?>">
                às <input readonly type="time" name="horario_diario22" value="<?php echo $dados["horario_diario22"] ?>"></td>
        </tr>

    </table>
    <br>

    <h5>Previsão das Ações de Acompanhamento</h5>

    <table border=0>
        <tr>
            <td>Número de visitas de acompanhamento <br>pelo professor orientador de estágio:</td>
            <td><input readonly type="number" name="num_visitas" value="<?php echo $dados["num_visitas"] ?>"></td>
        </tr>
        <tr>
            <td>Na Escola:</td>
            <td><input readonly type="number" name="num_visitas_escola" value="<?php echo $dados["num_visitas_escola"] ?>">
            </td>
        </tr>
        <tr>
            <td>Na Entidade de Estágio:</td>
            <td><input readonly type="number" name="num_visitas_estagio" value="<?php echo $dados["num_visitas_estagio"] ?>">
            </td>
        </tr>


    </table>
    <br>

    <h5>Objetivos Gerais</h5>
    <table border=1 style="width:800px">
        <tr>
            <td><b>O1</b>. Desenvolver e consolidar, em contexto real de trabalho, os conhecimentos e as
                competências profissionais adquiridos durante a frequência do curso;
            </td>
        </tr>
        <tr>
            <td><b>O2</b>. Proporcionar experiências de carácter sócio - profissional que facilitem a futura
                integração dos jovens no mundo de trabalho;
            </td>
        </tr>
        <tr>
            <td><b>O3</b>. Desenvolver aprendizagens no âmbito da saúde, higiene e segurança no trabalho.</td>
        </tr>
    </table>
    <h5>Objetivos Específicos</h5>
    <textarea readonly style="height:135px;width:800px;" name="objetivos"><?php echo $dados["objetivos"] ?></textarea>

    <h5>Conteudos a abordar</h5>
    <textarea readonly style="height:105px;width:800px;" name="conteudos"><?php echo $dados["conteudos"] ?></textarea>
</form>
