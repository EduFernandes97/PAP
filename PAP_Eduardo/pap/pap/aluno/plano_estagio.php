<?php
session_start();
include("../php/ligacao.php");

$sql = "SELECT ano FROM aluno where num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo=" . $_SESSION["ano"];
$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);
if ($dados ['ano'] == "12"){
    ?>
    <div id="botao">
        <input type="button" class="pure-button " value="11º Ano" onclick="popup_visible('plano_estagio.php')">
    </div>
<?php
}

$sql = "SELECT * FROM plano_estagio where num_processo='" . $_SESSION["num_proc"] . "' and cod_anoLetivo=" . $_SESSION["ano"];
$sql_bd = mysqli_query($ligaBD, $sql);
$num_linha = mysqli_num_rows($sql_bd);


if ($num_linha == 1) {

    $dados = mysqli_fetch_array($sql_bd);

    ?>



    <h2>Plano de Estágio</h2>

    <h5>Cronograma de Realização do Estágio</h5>
    <form class="pure-form" onsubmit="atualiza_plano(<?php echo $dados["cod_plano"]; ?>);return false;">
        <table border=0>
            <tr>
                <td>Duração do Estágio: </td>
                <td><input onchange="validate_data()" name="duracao_estagio" id="duracao_estagio" max="999" type="number" value="<?php echo $dados["duracao_estagio"] ?>" ></td>
            </tr>
            <tr>
                <td>Dia(s) da Semana:</td>
                <td><input name="dias_semana" type="text" maxlength="50" value="<?php echo $dados["dias_semana"] ?>"></td>
            </tr>
            <tr>
                <td>Período de Estágio:</td>
                <td> <input name="periodo_estagio1" onchange="validate_data()" id="periodo_estagio_1" type="date" value="<?php echo $dados["periodo_estagio1"] ?>">
                </td>
                <td> a <input type="date" onchange="conf_semana()" id="periodo_estagio_2" name="periodo_estagio2" value="<?php echo $dados["periodo_estagio2"] ?>"><a id="add_dia"></a></td>

            </tr>
            <tr>
                <td>Horário Diário:</td>
                <td>das <input type="time" name="horario_diario11" value="<?php echo $dados["horario_diario11"]; ?>"> às
                    <input type="time" name="horario_diario12" value="<?php echo $dados["horario_diario12"]; ?>"></td>
                <td>e das <input type="time" name="horario_diario21" value="<?php echo $dados["horario_diario21"] ?>">
                    às <input type="time" name="horario_diario22" value="<?php echo $dados["horario_diario22"] ?>"></td>
            </tr>

        </table>
        <br>

        <h5>Previsão das Ações de Acompanhamento</h5>

        <table border=0>
            <tr>
                <td>Número de visitas de acompanhamento <br>pelo professor orientador de estágio:</td>
                <td><input type="number" name="num_visitas" max="10" value="<?php echo $dados["num_visitas"] ?>"></td>
            </tr>
            <tr>
                <td>Na Escola:</td>
                <td><input type="number" name="num_visitas_escola" max="10" value="<?php echo $dados["num_visitas_escola"] ?>">
                </td>
            </tr>
            <tr>
                <td>Na Entidade de Estágio:</td>
                <td><input type="number" name="num_visitas_estagio" max="10" value="<?php echo $dados["num_visitas_estagio"] ?>">
                </td>
            </tr>


        </table>
        <br>

        <h5>Objetivos Gerais</h5>
        <table border=1 style="width:900px">
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
        <textarea style="height:135px;width:900px;" maxlength="500" name="objetivos"><?php echo $dados["objetivos"] ?></textarea>

        <h5>Conteudos a abordar</h5>
        <textarea style="height:105px;width:900px;" maxlength="500" name="conteudos"><?php echo $dados["conteudos"] ?></textarea>
        <?php if($dados['bloqueio'] == 0) echo '<br><br><input type="submit" class="pure-button " value="Atualizar">'; ?>
    </form>
<?php
} else { //se nao tiver registos
    ?>

    <h2>Plano de Estágio</h2>

    <h5>Cronograma de Realização do Estágio</h5>
    <form class="pure-form" onsubmit="novo_plano();return false;">
        <table border=0>
            <tr>
                <td>Duração do Estágio:</td>
                <td><input onchange="validate_data()" id="duracao_estagio" name="duracao_estagio" type="number" max="999"></td>
            </tr>
            <tr>
                <td>Dia(s) da Semana:</td>
                <td><input name="dias_semana" type="text" maxlength="50"></td>
            </tr>
            <tr>
                <td>Período de Estágio:</td>
                <td> de <input id="periodo_estagio_1" onchange="validate_data()" name="periodo_estagio1" type="date"></td>
                <td> a <input id="periodo_estagio_2" onchange="conf_semana()" type="date" name="periodo_estagio2"></td>
            </tr>
            <tr>
                <td>Horário Diário:</td>
                <td>das <input type="time" name="horario_diario11"> às <input type="time" name="horario_diario12"></td>
                <td>e das <input type="time" name="horario_diario21"> às <input type="time" name="horario_diario22">
                </td>
            </tr>

        </table>
        <br>

        <h5>Previsão das Ações de Acompanhamento</h5>

        <table border=0>
            <tr>
                <td>Número de visitas de acompanhamento <br>pelo professor orientador de estágio:</td>
                <td><input type="number" value="6" max="10" name="num_visitas"></td>
            </tr>
            <tr>
                <td>Na Escola:</td>
                <td><input type="number" max="10" name="num_visitas_escola"></td>
            </tr>
            <tr>
                <td>Na Entidade de Estágio:</td>
                <td><input type="number" max="10" name="num_visitas_estagio"></td>
            </tr>


        </table>
        <br>

        <h5>Objetivos Gerais</h5>
        <table border=1 style="width:900px">
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
        <textarea maxlength="500" style="height:135px;width:900px;" name="objetivos" id="obje"></textarea>

        <h5>Conteudos a abordar</h5>
        <textarea maxlength="500" style="height:105px;width:900px;" name="conteudos" id="conte"></textarea>
        <br><br>
        <input type="submit" class="pure-button " value="Atualizar">
    </form>
<?php } ?>