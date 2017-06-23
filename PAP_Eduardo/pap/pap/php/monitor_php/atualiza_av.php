<?php
session_start();
include("../ligacao.php");

$array = $_POST['nota'];
$obs_monitor = $_POST['obs_monitor'];


foreach ($array as $arr) {

    foreach ($arr as $key => $value) {
        $rest = substr($key, 1);
        $sql = "UPDATE av_monitor SET nota = '".$value."' WHERE av_monitor.email_monitor = '".$_SESSION['email']."' AND av_monitor.num_processo = ".$_SESSION['aluno']." AND av_monitor.cod_anoLetivo = ".$_SESSION['ano']."
            AND av_monitor.num_objetivo_final = ".$rest;

        $sql_bd = mysqli_query($ligaBD, $sql);
    }
}
$sql = "UPDATE av_monitor_total SET observacao ='".$obs_monitor."' WHERE av_monitor_total.email_monitor = '".$_SESSION['email']."' AND av_monitor_total.num_processo = ".$_SESSION['aluno']." AND av_monitor_total.cod_anoLetivo =". $_SESSION['ano'];

$sql_bd = mysqli_query($ligaBD, $sql);




return 0;
?>