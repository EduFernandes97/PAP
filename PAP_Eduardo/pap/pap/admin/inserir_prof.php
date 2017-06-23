<?php
session_start();
include("../php/ligacao.php");
?>
<h2>Inserir Novo Professor</h2>

<h4>Informação do Professor</h4>
<form class="pure-form" onsubmit='inserir_prof();return false;'>
<table>
    <tr>
        <td>Nome: </td>
        <td><input required type="text" name="nome"></td>
    </tr>
    <tr>
        <td>Contato:</td>
        <td><input  type="number" name="contato"></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input required type="email" name="email"></td>
    </tr>
    <tr>
        <td>Diretor de Curso:</td>
        <td><input required type="radio" class="dir" name="dir_curso" onclick="op_dir_curso('s');" value="s">Sim<br>
            <input required type="radio" class="dir" name="dir_curso" onclick="op_dir_curso('n');" value="n">Não</td>


    </tr>
    <tr id="tr_curso" style="display: none;">
        <td>Curso/Ano: </td>
        <td>
            <select id="turma_np" name='turma' onchange="muda_turma_np();">
                <option value="11">11º</option>
                <option value="12">12º</option>
            </select>

            <select  id="cursos11" name='cursos11'>
                <?php
                $sql = "SELECT * "
                    . "FROM cursos "
                    . "WHERE cod_curso NOT IN ( "
                    . " SELECT DISTINCT cod_curso "
                    . " FROM diretor_curso "
                    . " where turma = '11' and cod_anoLetivo = ".$_SESSION['ano']." "
                    . " )";

                $sql_bd = mysqli_query($ligaBD, $sql);
                $linhas = mysqli_num_rows($sql_bd);

                for ($i = 0; $i < $linhas; $i++) {
                    $dados = mysqli_fetch_array($sql_bd);
                    echo "<option name='curso' value = '" . $dados['cod_curso'] . "'>" . utf8_encode($dados['curso']) . "</option>";
                }

                ?>
            </select>
            <select id="cursos12" name='cursos12' style="display: none;">
                <?php
                $sql = "SELECT * "
                    . "FROM cursos "
                    . "WHERE cod_curso NOT IN ( "
                    . " SELECT DISTINCT cod_curso "
                    . " FROM diretor_curso "
                    . " where turma = '12' and cod_anoLetivo = ".$_SESSION['ano']." "
                    . " )";

                $sql_bd = mysqli_query($ligaBD, $sql);
                $linhas = mysqli_num_rows($sql_bd);

                for ($i = 0; $i < $linhas; $i++) {
                    $dados = mysqli_fetch_array($sql_bd);
                    echo "<option name='curso' value = '" . $dados['cod_curso'] . "'>" . utf8_encode($dados['curso']) . "</option>";
                }

                ?>
            </select>


        </td>
    </tr>


</table>
<input type="submit" class='pure-button'>
</form>