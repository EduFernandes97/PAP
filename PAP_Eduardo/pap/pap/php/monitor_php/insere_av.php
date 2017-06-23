<?php
	session_start();
include("../ligacao.php");

$array = $_POST['nota'];
$obs_monitor = $_POST['obs_monitor'];

foreach ($array as $arr) {

    foreach ($arr as $key => $value) {
        $rest = substr($key, 1);
        $sql = "INSERT INTO av_monitor (email_monitor, num_processo, cod_anoLetivo, num_objetivo_final, nota) VALUES ('". $_SESSION['email']."', '".$_SESSION['aluno']."', '".$_SESSION['ano']."', '".$rest."', '".$value."');";

        $sql_bd = mysqli_query($ligaBD, $sql);
    }
}

$sql = "INSERT INTO av_monitor_total (email_monitor,num_processo, cod_anoLetivo, bloqueio, observacao) VALUES ('".$_SESSION['email']."',".$_SESSION['aluno'].", '".$_SESSION['ano']."', '0', '".$obs_monitor."')";

$sql_bd = mysqli_query($ligaBD, $sql);

	return 0;
?>