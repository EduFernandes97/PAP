<?php
	session_start();
include("../ligacao.php");

$array = $_POST['nota'];
$obs_aluno = $_POST['obs_aluno'];

foreach ($array as $arr) {

    foreach ($arr as $key => $value) {
        $rest = substr($key, 1);
        $sql = "INSERT INTO av_aluno (num_processo, cod_anoLetivo, num_objetivo_aluno, nota) VALUES ('". $_SESSION['num_proc']."', '". $_SESSION['ano']."', '".$rest."', '".$value."')";
        $sql_bd = mysqli_query($ligaBD, $sql);
    }
}

$sql = "INSERT INTO av_aluno_total (num_processo, cod_anoLetivo, bloqueio, observacao) VALUES (".$_SESSION['num_proc'].", '".$_SESSION['ano']."', '0', '".$obs_aluno."')";

$sql_bd = mysqli_query($ligaBD, $sql);

	return 0;
?>