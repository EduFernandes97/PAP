<?php
session_start();
include("../ligacao.php");
?>


<select name="monitor" onchange='troca_monitor();' style='display: '>
    <option value='0' selected>Novo Monitor</option>
    <?php
    $sql = "SELECT * FROM `monitor` join entidade_estagio on monitor.NIF = entidade_estagio.NIF WHERE entidade_estagio.NIF = ".$_SESSION['NIF'];
    $sql_bd = mysqli_query($ligaBD, $sql);
    $linhas = mysqli_num_rows($sql_bd);
    for ($i = 0; $i < $linhas; $i++) {
        $dados = mysqli_fetch_array($sql_bd);
        echo "<option name='entidade' value = '" . $dados['email_monitor'] . "'>" . $dados['nome_monitor'] . "</option>";
    }

    ?>
</select>
<script>$('#monitor_table').show();</script>