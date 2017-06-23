<?php
session_start();
include("../php/ligacao.php");

if (isset($_SESSION['email']) && isset($_SESSION['curso']) && isset($_SESSION['turma']) && isset($_SESSION['ano']) ) {
    $sql = "SELECT * FROM diretor_curso \n"
        . " where email_prof = '" . $_SESSION['email'] . "' and cod_curso = '" . $_SESSION["curso"] . "' and turma = '" . $_SESSION["turma"] . "' and cod_anoLetivo = " . $_SESSION["ano"];

    $sql_bd = mysqli_query($ligaBD, $sql);
    $dados = mysqli_fetch_array($sql_bd);
    $num_linhas = mysqli_num_rows($sql_bd);
    if ($num_linhas == 0){
        echo "Não tem previlegios de aceder a esta pagina!";
        return;
    }
}
else {
    echo "Não tem previlegios de aceder a esta pagina!";
    return;
}

?>
<h2>Inserir Novo Aluno</h2>

<h4>Informação do Aluno</h4>
<form class="pure-form" onsubmit='novo_aluno("<?php echo $_SESSION["curso"]; ?>");return false;'>
<table>
    <tr>
        <td>Numero de Processo:</td>
        <td><input type="text" name="num_processo"></td>
    </tr>

    <tr>
        <td>Nome:</td>
        <td><input type="text" name="nome_aluno"></td>
    </tr>
    <tr>
        <td>Ano:</td>
        <td><select name="ano">
                <option value="11">11º</option>
                <option value="12">12º</option>
            </select></td>
    </tr>
    <tr>
        <td>Turma:</td>
        <td><input type="text" name="turma"></td>
    </tr>
    <tr>
        <td>Morada:</td>
        <td><input type="text" name="morada_aluno"></td>
    </tr>
    <tr>
        <td>Código Postal:</td>
        <td><input type="text" name="codigo_postal_aluno"></td>
    </tr>
    <tr>
        <td>BI/CC:</td>
        <td><input type="text" name="bi_cc_aluno"></td>
    </tr>
    <tr>
        <td>Arquivo:</td>
        <td><input type="text" name="arquivo_aluno"></td>
    </tr>
    <tr>
        <td>Validade:</td>
        <td><input type="text" name="validade_aluno"></td>
    </tr>
    <tr>
        <td>Contato:</td>
        <td><input type="text" name="contato_aluno"></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input type="text" name="email_aluno"></td>
    </tr>
</table>


<h4>Informação do Representante do Aluno Formando</h4>


<table>
    <tr>
        <td>Nome:</td>
        <td><input type="text" name="nome_ee"></td>
    </tr>
    <tr>
        <td>Grau de Parentesco:</td>
        <td><input type="text" name="grau"></td>
    </tr>
    <tr>
        <td>Morada:</td>
        <td><input type="text" name="morada_ee"></td>
    </tr>
    <tr>
        <td>Código Postal:</td>
        <td><input type="text" name="codigo_postal_ee"></td>
    </tr>
    <tr>
        <td>Contato:</td>
        <td><input type="text" name="contato_ee"></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input type="text" name="email_ee"></td>
    </tr>
</table>

<h4>Professor Orientador de Estágio</h4>

<select name="prof" onchange="troca_prof()">

    <?php
    $sql = "SELECT * FROM professor";
    $sql_bd = mysqli_query($ligaBD, $sql);
    $linhas = mysqli_num_rows($sql_bd);

    for ($i = 0; $i < $linhas; $i++) {
        $dados = mysqli_fetch_array($sql_bd);
        echo "<option name='prof' value = '" . $dados['email_prof'] . "'>" . $dados['nome_prof'] . "</option>";
    }

    ?>
    <option value='0'>Novo Professor</option>
</select>
<br>

<br>

<table id="prof_table" style='display: none;'>
    <tr>
        <td>Nome:</td>
        <td><input type="text" name="nome_prof"></td>
    </tr>
    <tr>
        <td>Contato:</td>
        <td><input type="text" name="contato_prof"></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input type="email" name="email_prof"></td>
    </tr>
</table>


<h4>Entidade de Estágio</h4>

<select name="entidade" onchange='troca_entidade();'>
    <option value='0' select>Nova Entidade de Estágio</option>
    <?php

    $sql = "SELECT * FROM entidade_estagio";
    $sql_bd = mysqli_query($ligaBD, $sql);
    $linhas = mysqli_num_rows($sql_bd);

    for ($i = 0; $i < $linhas; $i++) {
        $dados = mysqli_fetch_array($sql_bd);
        echo "<option name='entidade' value = '" . $dados['NIF'] . "'>" . $dados['denominacao'] . "</option>";
    }

    ?>

</select>
<br>

<br>

<table id="entidade_table">
    <tr>
        <td>Denominação:</td>
        <td><input type="text" name="denominacao"></td>
    </tr>
    <tr>
        <td>NIPC/NIF:</td>
        <td><input type="text" name="nif"></td>
    </tr>
    <tr>
        <td>Morada:</td>
        <td><input type="text" name="morada_entidade"></td>
    </tr>
    <tr>
        <td>Código Postal:</td>
        <td><input type="text" name="codigo_postal_entidade"></td>
    </tr>
    <tr>
        <td>Contato:</td>
        <td><input type="text" name="contato_entidade"></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input type="email" name="email_entidade"></td>
    </tr>
    <tr>
        <td>Natureza Jurídica:</td>
        <td><input type="text" name="natureza"></td>
    </tr>
    <tr>
        <td>Tipo de Entidade:</td>
        <td><input type="text" name="tipo_entidade"></td>
    </tr>
    <tr>
        <td>Atividade Principal:</td>
        <td><input type="text" name="atividade_entidade"></td>
    </tr>
    <tr>
        <td>CAE:</td>
        <td><input type="text" name="cae_entidade"></td>
    </tr>
</table>

<div id="novo_monitor">
    <h4>Monitor / Responsável na Entidade de Estágio</h4>

    <div id="monitor_select"></div>
    <br>

    <br>

    <table id='monitor_table'>
        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome_monitor"></td>
        </tr>
        <tr>
            <td>Contato:</td>
            <td><input type="text" name="contato_monitor"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email_monitor"></td>
        </tr>
        <tr>
            <td>Cargo/Função:</td>
            <td><input type="text" name="cargo_monitor"></td>
        </tr>

    </table>

</div>
<input type="submit" class='pure-button'>
</form>