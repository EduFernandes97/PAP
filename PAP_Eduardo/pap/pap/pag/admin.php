<?php session_start();


if (!isset($_SESSION["email"])) {
    return;
    header("Location:../index.html");
}
include("../php/ligacao.php");

$sql = "SELECT * FROM admin WHERE email_admin LIKE '" . $_SESSION["email"] . "'";

$sql_bd = mysqli_query($ligaBD, $sql);
$linhas = mysqli_num_rows($sql_bd);
$dados = mysqli_fetch_array($sql_bd);
if ($linhas == 0) header("Location:sair.php");

$sql = "SELECT * FROM ano_letivo WHERE ano_atual = '1'";

$sql_bd = mysqli_query($ligaBD, $sql);
$dados_ano_letivo = mysqli_fetch_array($sql_bd);


?>
<html>
<head>
    <title>PAP - Eduardo Fernandes</title>
    <link href="../CSS/estilo_admin.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../img/icon.png">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../script/jquery.js"></script>
    <script src="../script/admin/load.js"></script>
    <script src="../script/admin/presencas.js"></script>
    <script src="../script/admin/popup.js"></script>
    <script src="../script/admin/plano_estagio.js"></script>
    <script src="../script/admin/submenu.js"></script>
    <script src="../script/admin/roteiro.js"></script>
    <script src="../script/admin/relatorio.js"></script>
    <script src="../script/admin/av.js"></script>
    <script src="../script/admin/inserir_av.js"></script>
    <script src="../script/admin/inserir_prof.js"></script>
    <link href="../CSS/pure-release-0.5.0/forms.css" rel="stylesheet" type="text/css">
    <link href="../CSS/pure-release-0.5.0/buttons.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>

<div id="geral">

    <div id="cabeca">
        <br>

        <div id="ano">

            <?php


            echo "Ano Letivo: " . $dados_ano_letivo['anoLetivo'];

            ?>


        </div>

        <div id="user-data">
            <?php
            echo "User: ".$dados['email_admin'];

            ?>
        </div>
    </div>

    <div id="menu" unselectable='on' onselectstart='return false;' onmousedown='return false;'>
        <div>
            <ul>
                <a href="#inserir_prof.php">
                    <li id="inserir_prof">Inserir Professor</li>
                </a>
                <a href="#inserir_av.php">
                    <li id="inserir_av">Inserir Objetivos Finais</li>
                </a>
                <a href="#mudar_anoletivo.php">
                    <li id="mudar_anoletivo">Alterar Ano Letivo</li>
                </a>
                <a href="sair.php">
                    <li>Terminar Sessão</li>
                </a>


            </ul>
        </div>

    </div>
    <div id="down"></div>

    <div id="conteudo">

    </div>

    <div id="rodape" align="center">
        <br><b>Eduardo Fernandes @ 2015</b>
    </div>

</div>


</body>


</html>