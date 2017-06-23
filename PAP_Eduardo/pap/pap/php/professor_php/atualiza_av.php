<?php
session_start();
include("../ligacao.php");

$array = $_POST['nota'];
$obs_prof = $_POST['obs_prof'];


foreach ($array as $arr) {

    foreach ($arr as $key => $value) {
        $rest = substr($key, 1);
        $sql = "UPDATE av_prof SET nota = '".$value."' WHERE av_prof.email_prof = '".$_SESSION['email']."' AND av_prof.num_processo = ".$_SESSION['aluno']." AND av_prof.cod_anoLetivo = ".$_SESSION['ano']."
            AND av_prof.num_objetivo_final = ".$rest;

        $sql_bd = mysqli_query($ligaBD, $sql);
    }
}
$sql = "UPDATE av_prof_total SET observacao ='".$obs_prof."' WHERE av_prof_total.email_prof = '".$_SESSION['email']."' AND av_prof_total.num_processo = ".$_SESSION['aluno']." AND av_prof_total.cod_anoLetivo =". $_SESSION['ano'];

$sql_bd = mysqli_query($ligaBD, $sql);





?>
