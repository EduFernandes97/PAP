<?php
session_start();
include("../ligacao.php");

$array = $_POST['nota'];
$obs_aluno = $_POST['obs_aluno'];


foreach ($array as $arr) {

    foreach ($arr as $key => $value) {
        $rest = substr($key, 1);
        $sql = "UPDATE av_aluno SET nota = '" . $value . "' WHERE av_aluno.num_processo = '" . $_SESSION['num_proc'] . "' AND av_aluno.cod_anoLetivo = " . $_SESSION['ano'] . " AND av_aluno.num_objetivo_aluno = " . "$rest ";

        $sql_bd = mysqli_query($ligaBD, $sql);
    }
}
$sql = "UPDATE av_aluno_total SET observacao = '".$obs_aluno."' WHERE av_aluno_total.num_processo = ".$_SESSION['num_proc']." AND av_aluno_total.cod_anoLetivo = ". $_SESSION['ano'] ;
$sql_bd = mysqli_query($ligaBD, $sql);




return 0;
?>