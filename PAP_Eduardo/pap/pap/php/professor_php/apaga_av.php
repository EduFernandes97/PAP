<?php
session_start();

$num_obj = $_POST["num_obj"];



include ("../ligacao.php");

$sql = "DELETE FROM `objetivo_aluno` WHERE `objetivo_aluno`.`cod_curso` = '".$_SESSION['curso']."' AND `objetivo_aluno`.`cod_anoLetivo` = ".$_SESSION['ano']."
    AND `objetivo_aluno`.`num_objetivo_aluno` = ".$num_obj;

$sql_bd = mysqli_query($ligaBD , $sql);

$sql = "SELECT * FROM `objetivo_aluno` WHERE `cod_anoLetivo` = " . $_SESSION['ano'] . " and `cod_curso` = '" . $_SESSION['curso'] . "' order by dominio";
$sql_objetivos = mysqli_query($ligaBD, $sql);
$num = mysqli_num_rows($sql_objetivos);

for ($i = 0;$i<$num;$i++){
    $dados = mysqli_fetch_array($sql_objetivos);
    $sql = "UPDATE `objetivo_aluno` SET `num_objetivo_aluno` = '".$i."' WHERE `objetivo_aluno`.`cod_curso` = '".$_SESSION['curso']."'
        AND `objetivo_aluno`.`cod_anoLetivo` = ".$_SESSION['ano']." AND `objetivo_aluno`.`num_objetivo_aluno` = ".$dados['num_objetivo_aluno'];
    $sql_bd = mysqli_query($ligaBD , $sql);

}



if (!$sql_bd){
    echo "Erro a procurar dados!";
    exit;
}
return 0;
?>