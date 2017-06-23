<?php session_start();


if (!isset($_SESSION["email"])) {
    return;
    header("Location:../index.html");
}
include("../php/ligacao.php");

$sql = "SELECT * FROM professor WHERE email_prof LIKE '" . $_SESSION["email"] . "'";

$sql_bd = mysqli_query($ligaBD, $sql);
$linhas = mysqli_num_rows($sql_bd);
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
    <script src="../script/professor/load.js"></script>
    <script src="../script/professor/presencas.js"></script>
    <script src="../script/professor/popup.js"></script>
    <script src="../script/professor/plano_estagio.js"></script>
    <script src="../script/professor/submenu.js"></script>
    <script src="../script/professor/roteiro.js"></script>
    <script src="../script/professor/relatorio.js"></script>
    <script src="../script/professor/av.js"></script>
    <script src="../script/professor/inserir_av.js"></script>
    <script src="../script/professor/inserir_aluno.js"></script>
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
            $dir_curso = false;
            $sql = "SELECT * FROM professor \n"
                . "	left JOIN aluno_professor on aluno_professor.cod_prof = professor.cod_prof and aluno_professor.cod_anoLetivo = '" . $_SESSION['ano'] . "'	\n"
                . "	left JOIN aluno on aluno.num_processo = aluno_professor.num_processo \n"
                . "	join diretor_curso on diretor_curso.email_prof = professor.email_prof\n"
                . "where diretor_curso.email_prof = '" . $_SESSION['email'] . "' or professor.email_prof = '" . $_SESSION['email'] . "'";


            $sql_bd = mysqli_query($ligaBD, $sql);
            $num_linhas_prof = mysqli_num_rows($sql_bd);

            $cursos = array();
            for ($i = 0; $i < $num_linhas_prof; $i++) {
                $dados = mysqli_fetch_array($sql_bd);
                $cursos[] = $dados["cod_curso"];
            }
            $cursos = array_unique($cursos);

            echo "Aluno: <select class='select_prof' id='muda_curso' onchange='muda_curso();'> ";
            echo "<option disabled selected>Escolha um Curso</option>";
            foreach ($cursos as $value) {
                echo "<option value='" . $value . "'>" . $value . "</option>";
            }
            echo "</select>";
            if (isset($_SESSION["curso"])) {
                echo "<script> $('#muda_curso').val('" . $_SESSION['curso'] . "'); </script>";

                echo " <select class='select_prof' id='muda_turma' onchange='muda_turma();'>
                            <option disabled selected>Escolha uma Turma</option>
                            <option value='11'>11º</option>
                            <option value='12'>12º</option>
                        </select>";
            }
            if (isset($_SESSION['turma']))
                echo "<script> $('#muda_turma').val('" . $_SESSION['turma'] . "'); </script>";

            if (isset($_SESSION["curso"]) && isset($_SESSION["turma"])) {

                $sql = "SELECT * FROM diretor_curso \n"
                    . " where email_prof = '" . $_SESSION['email'] . "' and cod_curso = '" . $_SESSION["curso"] . "' and turma = '" . $_SESSION["turma"] . "' and cod_anoLetivo = " . $_SESSION["ano"];

                $sql_bd = mysqli_query($ligaBD, $sql);

                $num_linhas = mysqli_num_rows($sql_bd);
                $dados = mysqli_fetch_array($sql_bd);

                if ($num_linhas > 0) { // SE FOR DIRETOR DE CURSO
                    $dir_curso = true;


                    $sql = "SELECT * FROM diretor_curso \n"
                        . " where email_prof = '" . $_SESSION['email'] . "' and cod_curso = '" . $_SESSION["curso"] . "' and cod_anoLetivo = " . $_SESSION["ano"] . " and turma = ".$_SESSION["turma"] ;
                    $sql_bd = mysqli_query($ligaBD, $sql);
                    $num_linhas = mysqli_num_rows($sql_bd);

                    $sql = "SELECT * FROM aluno \n"
                        . " where cod_curso = '" . $_SESSION["curso"] . "' and cod_anoLetivo = " . $_SESSION["ano"] . " and ano = '" . $_SESSION['turma'] . "'";

                    $sql_bd = mysqli_query($ligaBD, $sql);
                    $num_linhas = mysqli_num_rows($sql_bd);

                    echo "  <select class='select_prof' id='muda_aluno' onchange='muda_aluno();'>";
                    echo "<option disabled selected>Escolha um Aluno</option>";
                    for ($i = 0; $i < $num_linhas; $i++) {
                        $dados = mysqli_fetch_array($sql_bd);
                        echo "<option value='" . $dados["num_processo"] . "'>" . $dados["nome_aluno"] . "</option>";
                    }

                    echo "</select>";

                    if (isset($_SESSION["aluno"]))
                        echo "<script> $('#muda_aluno').val('" . $_SESSION['aluno'] . "'); </script>";

                } else {
                    $dir_curso = false;

                    if (isset($_SESSION['turma'])) {
                        echo "<script> $('#muda_turma').val('" . $_SESSION['turma'] . "'); </script>";

                        $sql = "SELECT * FROM professor \n"
                            . "	JOIN aluno_professor on aluno_professor.cod_prof = professor.cod_prof and aluno_professor.cod_anoLetivo = '" . $_SESSION['ano'] . "'"
                            . "	JOIN aluno on aluno.num_processo = aluno_professor.num_processo and aluno.cod_anoLetivo = '" . $_SESSION['ano'] . "'"
                            . " where professor.email_prof = '" . $_SESSION['email'] . "' and aluno.cod_curso = '" . $_SESSION["curso"] . "' and aluno.ano = " . $_SESSION['turma'];

                        $sql_bd = mysqli_query($ligaBD, $sql);
                        $num_linhas = mysqli_num_rows($sql_bd);

                        echo "  <select class='select_prof' id='muda_aluno' onchange='muda_aluno();'>";
                        echo "<option disabled selected>Escolha um Aluno</option>";
                        for ($i = 0; $i < $num_linhas; $i++) {
                            $dados = mysqli_fetch_array($sql_bd);
                            echo "<option value='" . $dados["num_processo"] . "'>" . $dados["nome_aluno"] . "</option>";
                        }
                        echo "</select>";
                    }
                }
            }
            if (isset($_SESSION["aluno"])){
                echo "<script> $('#muda_aluno').val('" . $_SESSION['aluno'] . "'); </script>";
                echo "<br><input type='image'src='../img/export.png' width='30px' height='auto' onclick='document.location.href = \" ../caderneta-do-aluno.php \" '>";

            }
            ?>

        </div>
    </div>

    <div id="menu" unselectable='on' onselectstart='return false;' onmousedown='return false;'>
        <div>
            <ul>
                <a href="#plano_estagio.php">
                    <li id="plano_estagio">Plano de Estágio</li>
                </a>
                <a href="#roteiro.php">
                    <li id="roteiro">Roteiro de Atividades</li>
                </a>
                <a href="#relatorio.php">
                    <li id="relatorio">Relatórios Semanal</li>
                </a>
                <a href="#registo_presencas.php">
                    <li id="registo_presencas">Registo de Presenças</li>
                </a>
                <a href="#av.php">
                    <li id="av">Avaliação</li>
                </a>
                <?php if ($dir_curso) { ?>
                    <li class="menu_sub">Director Curso
                        <ul id="submenu">
                            <a href="#inserir_aluno.php">
                                <li class="sub">Inserir Aluno</li>
                            </a>
                            <a href="#inserir_av.php">
                                <li class="sub">Definir Objetivos de Avaliação</li>
                        </ul>
                    </li>
                <?php } ?>

                <a href="sair.php">
                    <li>Terminar Sessão</li>
                </a>


            </ul>
        </div>

    </div>
    <div id="down"></div>

    <div id="conteudo">

    </div>
    <div id="popup">
        <div class="popupConteudo">

            <p>Clique <a href="javascript:void(0)" onclick="popup_visible('popup');">aqui</a> para fechar.</p>
        </div>
    </div>

    <div id="rodape" align="center">
        <br><b>Eduardo Fernandes @ 2015</b>
    </div>

</div>


</body>


</html>