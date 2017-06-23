<?php

	session_start();


	include ("../ligacao.php");
    $sql = "SELECT * FROM `ano_letivo` ORDER BY cod_anoLetivo";
    $sql_bd = mysqli_query($ligaBD , $sql);
$num = mysqli_num_rows($sql_bd);

for ($i=0;$i<$num;$i++){
    $dados = mysqli_fetch_array($sql_bd);
    if ($dados['ano_atual'] == '1'){
        $sql = "UPDATE `ano_letivo` SET `ano_atual` = '0' WHERE `ano_letivo`.`cod_anoLetivo` = ".$dados['cod_anoLetivo'];
        $sql_bd = mysqli_query($ligaBD , $sql);
        $soma = $dados['cod_anoLetivo'] + 1;
        $sql = "UPDATE `ano_letivo` SET `ano_atual` = '1' WHERE `ano_letivo`.`cod_anoLetivo` = ".$soma;
        $sql_bd = mysqli_query($ligaBD , $sql);
        break;

    }

}

	return 0;
?>