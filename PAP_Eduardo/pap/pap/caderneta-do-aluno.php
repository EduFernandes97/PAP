<?php
$ligaBD = mysqli_connect('localhost', 'root', '');
if (!$ligaBD) {
    echo "<br>ERRO: Erro a ligar a MySql";
    exit;
}

$escolhaBD = mysqli_select_db($ligaBD, 'pap');
if (!$escolhaBD) {
    echo "<br>ERRO: Erro a selecionar BD";
    exit;
}
session_start();

$sql = "SELECT * FROM ano_letivo WHERE ano_atual = '1'";

$sql_bd = mysqli_query($ligaBD, $sql);
$dados_ano_letivo = mysqli_fetch_array($sql_bd);
$_SESSION["ano"] = $dados_ano_letivo['cod_anoLetivo'];


$sql = "select * from aluno
			join aluno_monitor on aluno.num_processo = aluno_monitor.num_processo and aluno_monitor.cod_anoLetivo='" . $dados_ano_letivo['cod_anoLetivo'] . "'
			join monitor on aluno_monitor.cod_monitor = monitor.`cod_monitor` 
			join aluno_professor on aluno.num_processo = aluno_professor.num_processo and aluno_professor.cod_anoLetivo='" . $dados_ano_letivo['cod_anoLetivo'] . "'
			join responsavel_aluno_aluno on responsavel_aluno_aluno.num_processo = aluno.num_processo
			join responsavel_aluno on responsavel_aluno.cod_responsavel = responsavel_aluno_aluno.cod_responsavel
			join professor on aluno_professor.cod_prof = professor.cod_prof 
			join entidade_estagio on entidade_estagio.NIF = monitor.NIF 
			join ano_letivo on aluno.cod_anoLetivo = ano_letivo.cod_anoLetivo 
			join plano_estagio on aluno.num_processo = plano_estagio.num_processo and plano_estagio.cod_anoLetivo='" . $dados_ano_letivo['cod_anoLetivo'] . "'
			where aluno.num_processo = '" . $_SESSION["aluno"] . "' and aluno.cod_anoLetivo = '" . $dados_ano_letivo['cod_anoLetivo'] . "'";

$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);


require_once('FPDF/fpdf17/fpdf.php');
require_once('FPDF/FPDI-1.5.2/fpdi.php');

$pdf = new FPDI();
$pdf->setSourceFile("FPDF/132.pdf");

$pdf->AddPage();
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$tplIdx = $pdf->importPage(3);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$tplIdx = $pdf->importPage(4);
$pdf->useTemplate($tplIdx, 0, 0, 210);
$pdf->SetFont('Arial');
$pdf->SetFontSize(12);
$pdf->SetXY(57, 60.4);
$pdf->Write(0, $dados["nome_aluno"]);
$pdf->SetXY(57, 66.5);
$pdf->Write(0, $dados["num_processo"]);
$pdf->SetXY(105, 66.5);
$pdf->Write(0, $dados["ano"] . "º");
$pdf->SetXY(143, 66.5);
$pdf->Write(0, $dados["turma"]);
$pdf->SetXY(57, 72.6);
$pdf->Write(0, $dados["morada_aluno"]);
$pdf->SetXY(57, 78.6);
$pdf->Write(0, $dados["codigo_postal_aluno"]);
$pdf->SetXY(57, 85);
$pdf->Write(0, $dados["bi_cc"]);
$pdf->SetXY(108, 85);
$pdf->Write(0, $dados["arquivo"]);
$pdf->SetXY(160, 85);
$pdf->Write(0, $dados["validade"]);
$pdf->SetXY(57, 91.5);
$pdf->Write(0, $dados["contato_aluno"]);
$pdf->SetXY(132, 91.5);
$pdf->Write(0, $dados["email_aluno"]);

$pdf->SetXY(57, 108);
$pdf->Write(0, $dados["nome_ee"]);
$pdf->SetXY(57, 115);
$pdf->Write(0, $dados["grau_pare"]);
$pdf->SetXY(57, 121);
$pdf->Write(0, $dados["morada_ee"]);
$pdf->SetXY(57, 127);
$pdf->Write(0, $dados["codigo_postal_ee"]);
$pdf->SetXY(57, 133);
$pdf->Write(0, $dados["contato_ee"]);
$pdf->SetXY(132, 133);
$pdf->Write(0, $dados["email_ee"]);

$pdf->SetXY(57, 147);
$pdf->Write(0, "ESCOLA SECUNDÁRIA SERAFIM LEITE");
$pdf->SetXY(57, 154);
$pdf->Write(0, "Rua Manuel Luís da Costa, São João da Madeira");
$pdf->SetXY(57, 160);
$pdf->Write(0, "3700-179, Portugal");
$pdf->SetXY(57, 166);
$pdf->Write(0, "256837550");
$pdf->SetXY(127, 166);
$pdf->Write(0, "secretaria@essl.pt");


$pdf->AddPage();
$tplIdx = $pdf->importPage(5);
$pdf->useTemplate($tplIdx, 0, 0, 210);
//info prof
$pdf->SetXY(57, 62);
$pdf->Write(0, $dados["nome_prof"]);
$pdf->SetXY(57, 68);
$pdf->Write(0, $dados["contato_prof"]);
$pdf->SetXY(123.5, 68);
$pdf->Write(0, $dados["email_prof"]);

//info estagio
$pdf->SetXY(57, 88.5);
$pdf->Write(0, $dados["denominacao"]);
$pdf->SetXY(57, 97);
$pdf->Write(0, $dados["NIF"]);
$pdf->SetXY(57, 105.5);
$pdf->Write(0, $dados["morada_estagio"]);
$pdf->SetXY(57, 114);
$pdf->Write(0, $dados["codigo_postal_estagio"]);
$pdf->SetXY(57, 122);
$pdf->Write(0, $dados["contato_estagio"]);
$pdf->SetXY(132, 122);
$pdf->Write(0, $dados["email_estagio"]);
$pdf->SetXY(57, 130);
$pdf->Write(0, $dados["natureza_juridica"]);
$pdf->SetXY(57, 139);
$pdf->Write(0, $dados["tipo_entidade"]);
$pdf->SetXY(57, 147);
$pdf->Write(0, $dados["atividade_principal"]);
$pdf->SetXY(179, 147);
$pdf->Write(0, $dados["cae"]);

//info monitor
$pdf->SetXY(57, 169);
$pdf->Write(0, $dados["nome_monitor"]);
$pdf->SetXY(57, 177.5);
$pdf->Write(0, $dados["contato_monitor"]);
$pdf->SetXY(124, 177);
$pdf->Write(0, $dados["email_monitor"]);
$pdf->SetXY(57, 185.5);
$pdf->Write(0, $dados["cargo"]);

$pdf->AddPage();
$tplIdx = $pdf->importPage(6);
$pdf->useTemplate($tplIdx, 0, 0, 210);
$pdf->SetXY(57, 54.5);
$pdf->Write(0, $dados["duracao_estagio"]);
$pdf->SetXY(57, 61);
$pdf->Write(0, $dados["dias_semana"]);
$pdf->SetXY(77, 67);
$pdf->Write(0, $dados["periodo_estagio1"]);
$pdf->SetXY(162, 67);
$pdf->Write(0, $dados["periodo_estagio2"]);
$pdf->SetXY(68, 73);
$pdf->Write(0, $dados["horario_diario11"]);
$pdf->SetXY(93, 73);
$pdf->Write(0, $dados["horario_diario12"]);
$pdf->SetXY(140, 73);
$pdf->Write(0, $dados["horario_diario21"]);
$pdf->SetXY(166.5, 73);
$pdf->Write(0, $dados["horario_diario22"]);
$pdf->SetXY(143, 88);
$pdf->Write(0, $dados["num_visitas"]);
$pdf->SetXY(67, 94);
$pdf->Write(0, $dados["num_visitas_escola"]);
$pdf->SetXY(67, 101);
$pdf->Write(0, $dados["num_visitas_estagio"]);


$pdf->SetXY(18, 155);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 5, 'Objetivos Específicos', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(18, 160);
$pdf->Multicell(170, 5, $dados["objetivos"], 1);

$pdf->Ln(15);
$pdf->SetX(18);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 5, 'Conteúdos a abordar', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(18);
$pdf->Multicell(170, 5, $dados["conteudos"], 1);

$pdf->AddPage();//ROTEIRO
$tplIdx = $pdf->importPage(7);
$pdf->useTemplate($tplIdx, 0, 0, 210);


$sql = "SELECT * FROM roteiro_atividade WHERE num_processo=" . $_SESSION["aluno"] . " and cod_anoLetivo = " . $dados_ano_letivo['cod_anoLetivo'];
$sql_bd = mysqli_query($ligaBD, $sql);
$num = mysqli_num_rows($sql_bd);
$y = 50;
for ($i = 0; $i < $num; $i++) {
    $pdf->SetXY(17, $y);
    $soma = $i+1;
    $pdf->Multicell(18, 5, "\n\n\n". $soma ."\n\n\n\n\n", 1);

    $dados_roteiro = mysqli_fetch_array($sql_bd);
    $pdf->SetXY(35.5, $y);
    $pdf->Multicell(129, 5, $dados_roteiro["atividade"], 0);
    $pdf->SetXY(35.5, $y);
    $pdf->Multicell(129, 5, "\n\n\n\n\n\n\n\n",1);
    $y += 40;
}


$sql_bd = mysqli_query($ligaBD, $sql);
$num = mysqli_num_rows($sql_bd);
$y = 50;
for ($i = 0; $i < $num; $i++) {
    $dados_roteiro = mysqli_fetch_array($sql_bd);
    $pdf->SetXY(165, $y);
    $pdf->Multicell(25.5, 5, $dados_roteiro["observacao"], 0);
    $pdf->SetXY(165, $y);
    $pdf->Multicell(25.8, 5, "\n\n\n\n\n\n\n\n",1);
    $y += 40;
}


$sql = "SELECT * FROM `relatorio_semanal` WHERE num_processo = ".$_SESSION["aluno"]." and cod_anoLetivo = ". $dados_ano_letivo['cod_anoLetivo'];
$sql_bd = mysqli_query($ligaBD, $sql);
$num = mysqli_num_rows($sql_bd);
for ($i = 0; $i < $num; $i++) {
    $dados_relatorio = mysqli_fetch_array($sql_bd);
    $pdf->AddPage();
    $tplIdx = $pdf->importPage(8);
    $pdf->useTemplate($tplIdx, 0, 0, 210);

    $pdf->SetXY(144, 38);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->SetTextColor(0, 128, 0);
    $pdf->Write(0, $dados_relatorio["num_semana"].":");

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetXY(18, 45.5);
    $pdf->Write(0, "De ".$dados_relatorio["data_semana1"]." a ".$dados_relatorio["data_semana2"]." Das ".$dados_relatorio["hora1"] ." às ".$dados_relatorio["hora2"] ." horas");

    $pdf->SetXY(18, 58);
    $pdf-> Multicell(170, 5,  $dados_relatorio["atividade_desenvolvida"], 1);
    $pdf->SetXY(18, 119);
    $pdf-> Multicell(170, 5,  $dados_relatorio["observacao_aluno"], 1);
    $pdf->SetXY(18, 182);
    $pdf-> Multicell(170, 5,  $dados_relatorio["observacao_monitor"], 1);
}
$pdf->AddPage();
$tplIdx = $pdf->importPage(21);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$sql = "SELECT * FROM `av_aluno`\n"
    . "	JOIN objetivo_aluno on objetivo_aluno.num_objetivo_aluno = av_aluno.num_objetivo_aluno\n"
    . "WHERE av_aluno.num_processo = " . $_SESSION["aluno"] . " and av_aluno.cod_anoLetivo = " . $dados_ano_letivo['cod_anoLetivo'] . " and objetivo_aluno.cod_anoLetivo =" . $_SESSION['ano']." order by objetivo_aluno.dominio";

$sql_bd = mysqli_query($ligaBD, $sql);
$y = 55.5;
$dom1=0;
$dom2=0;
$aux = 1;
$y_dom2=0;
$num = mysqli_num_rows($sql_bd);
for ($i = 0; $i < $num; $i++) {

    $pdf->SetFontSize(8);
    $dados_av = mysqli_fetch_array($sql_bd);
    if ($dados_av["dominio"]=="Cognitivo"){
        $dom1+=7;
    }
    if ($dados_av["dominio"]=="Socioafetivo"){
        if ($aux==1) {
            $pdf->SetXY(15, 55.5);
            $pdf->Cell(40, $dom1, "Cognitivo", 1);
            $aux=0;
        }
        $dom2+=7;
    }
    $pdf->SetXY(55, $y);
    $pdf-> Cell(101, 7,  $dados_av["objetivo"], 1);

    $pdf->SetXY(155.6, $y);
    $pdf-> Cell(29.1, 7,  $dados_av["nota"], 1);
    $y+=7;
}
$pdf->SetXY(15, $dom1+55.5);
$pdf-> Cell(40, $dom2,  "Socioafetivo", 1);

$sql = "SELECT * FROM `av_aluno_total` WHERE num_processo = ". $_SESSION["aluno"]." and cod_anoLetivo = ".$dados_ano_letivo['cod_anoLetivo'];
$sql_bd = mysqli_query($ligaBD, $sql);
$dados_av = mysqli_fetch_array($sql_bd);
$pdf->SetXY(25, 180);
$pdf-> Multicell(150, 7.1,  $dados_av["observacao"], 1);

$pdf->AddPage();
$tplIdx = $pdf->importPage(22);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$sql = "SELECT * FROM `av_monitor`\n"
    . "	JOIN objetivo_final on objetivo_final.num_objetivo_final = av_monitor.num_objetivo_final\n"
    . "WHERE av_monitor.num_processo = " . $_SESSION["aluno"] . " and av_monitor.cod_anoLetivo = " . $dados_ano_letivo['cod_anoLetivo'] . " and objetivo_final.cod_anoLetivo =" . $_SESSION['ano']." order by objetivo_final.dominio";
$sql_bd = mysqli_query($ligaBD, $sql);
$y = 50;
$dom1=0;
$dom2=0;
$aux = 1;
$y_dom2=0;
$num = mysqli_num_rows($sql_bd);
for ($i = 0; $i < $num; $i++) {

    $pdf->SetFontSize(8);
    $dados_av = mysqli_fetch_array($sql_bd);
    if ($dados_av["dominio"]=="Cognitivo"){
        $dom1+=7;
    }
    if ($dados_av["dominio"]=="Socioafetivo"){
        if ($aux==1) {
            $pdf->SetXY(15, 50);
            $pdf->Cell(40, $dom1, "Cognitivo", 1);
            $aux=0;
        }
        $dom2+=7;
    }
    $pdf->SetXY(55, $y);
    $pdf-> Cell(101, 7,  $dados_av["objetivo"], 1);

    $pdf->SetXY(155.6, $y);
    $pdf-> Cell(29.1, 7,  $dados_av["nota"], 1);
    $y+=7;
}
$pdf->SetXY(15, $dom1+50);
$pdf-> Cell(40, $dom2,  "Socioafetivo", 1);

$sql = "SELECT * FROM `av_monitor_total` WHERE num_processo =".$_SESSION["aluno"]." and cod_anoLetivo = ".$dados_ano_letivo['cod_anoLetivo'];
$sql_bd = mysqli_query($ligaBD, $sql);
$dados_av = mysqli_fetch_array($sql_bd);
$pdf->SetXY(25, 172);
$pdf-> Multicell(150, 7.1,  $dados_av["observacao"], 1);


$pdf->AddPage();
$tplIdx = $pdf->importPage(23);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$sql = "SELECT * FROM `reg_presenca` WHERE num_processo =".$_SESSION["aluno"]." and cod_anoLetivo = ".$dados_ano_letivo['cod_anoLetivo']." ORDER by data ASC";
$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);
$num_linhas = mysqli_num_rows($sql_bd);
$a=0;
$todos_meses = array('Janeira', 'Fevereiro', 'Março', 'Abril', 'Maio', "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");

$pdf->SetXY(17, 45);
$pdf-> Multicell(40, 7.2,  $todos_meses[ intval( $dados["data"][5].$dados["data"][6]) -1 ], 0);



$pdf->SetFontSize(9);
$y=71;
$pdf->SetXY(17, $y);
$pdf-> Multicell(21.5, 7.2,  $dados["data"], 1);

$pdf->SetXY(39, $y);
$pdf-> Multicell(16.8, 7.2,  $dados["num_hora"], 1);

$pdf->SetXY(56, $y);
$pdf-> Multicell(29, 7.2, "", 1);

$pdf->SetXY(85, $y);
$pdf-> Multicell(30, 7.2, "", 1);

$pdf->SetXY(115, $y);
$pdf-> Multicell(75.5, 7.2,  $dados["observacao"], 1);


do{
    if ($a != 0){
        $dados = mysqli_fetch_array($sql_bd);
        if ($data[6] != $dados['data'][6]){
            $pdf->AddPage();
            $tplIdx = $pdf->importPage(23);
            $pdf->useTemplate($tplIdx, 0, 0, 210);
            $pdf->SetXY(17, 45);
            $pdf-> Multicell(40, 7.2,  $todos_meses[ intval( $dados["data"][5].$dados["data"][6]) -1 ], 0);
            $y=71;
            $pdf->SetXY(17, $y);
            $pdf-> Multicell(21.5, 7.2,  $dados["data"], 1);

            $pdf->SetXY(39, $y);
            $pdf-> Multicell(16.8, 7.2,  $dados["num_hora"], 1);

            $pdf->SetXY(56, $y);
            $pdf-> Multicell(29, 7.2, "", 1);

            $pdf->SetXY(85, $y);
            $pdf-> Multicell(30, 7.2, "", 1);

            $pdf->SetXY(115, $y);
            $pdf-> Multicell(75.5, 7.2,  $dados["observacao"], 1);
        }
        else{
            $y+=7;
            $pdf->SetXY(17, 45);
            $pdf-> Multicell(40, 7.2,  $todos_meses[ intval( $dados["data"][5].$dados["data"][6]) -1 ], 0);
            $pdf->SetXY(17, $y);
            $pdf-> Multicell(21.5, 7.2,  $dados["data"], 1);

            $pdf->SetXY(39, $y);
            $pdf-> Multicell(16.8, 7.2,  $dados["num_hora"], 1);

            $pdf->SetXY(56, $y);
            $pdf-> Multicell(29, 7.2, "", 1);

            $pdf->SetXY(85, $y);
            $pdf-> Multicell(30, 7.2, "", 1);

            $pdf->SetXY(115, $y);
            $pdf-> Multicell(75.5, 7.2,  $dados["observacao"], 1);

        }

    }
    $data=$dados['data'];
    $a++;
}while ($a<$num_linhas);

$pdf->AddPage();
$tplIdx = $pdf->importPage(26);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$tplIdx = $pdf->importPage(27);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$sql = "SELECT * FROM `av_prof`\n"
    . "	JOIN objetivo_final on objetivo_final.num_objetivo_final = av_prof.num_objetivo_final\n"
    . "WHERE av_prof.num_processo = " . $_SESSION["aluno"] . " and av_prof.cod_anoLetivo = " . $dados_ano_letivo['cod_anoLetivo'] . " and objetivo_final.cod_anoLetivo =" . $_SESSION['ano']." order by objetivo_final.dominio";
$sql_bd = mysqli_query($ligaBD, $sql);
$y = 50;
$dom1=0;
$dom2=0;
$aux = 1;
$y_dom2=0;
$num = mysqli_num_rows($sql_bd);
for ($i = 0; $i < $num; $i++) {

    $pdf->SetFontSize(8);
    $dados_av = mysqli_fetch_array($sql_bd);
    if ($dados_av["dominio"]=="Cognitivo"){
        $dom1+=7;
    }
    if ($dados_av["dominio"]=="Socioafetivo"){
        if ($aux==1) {
            $pdf->SetXY(15, 50);
            $pdf->Cell(40, $dom1, "Cognitivo", 1);
            $aux=0;
        }
        $dom2+=7;
    }
    $pdf->SetXY(55, $y);
    $pdf-> Cell(101, 7,  $dados_av["objetivo"], 1);

    $pdf->SetXY(155.6, $y);
    $pdf-> Cell(29.1, 7,  $dados_av["nota"], 1);
    $y+=7;
}
$pdf->SetXY(15, $dom1+50);
$pdf-> Cell(40, $dom2,  "Socioafetivo", 1);

$sql = "SELECT * FROM `av_monitor_total` WHERE num_processo =".$_SESSION["aluno"]." and cod_anoLetivo = ".$dados_ano_letivo['cod_anoLetivo'];
$sql_bd = mysqli_query($ligaBD, $sql);
$dados_av = mysqli_fetch_array($sql_bd);
$pdf->SetXY(25, 140);
$pdf-> Multicell(150, 7.1,  $dados_av["observacao"], 1);


$pdf->AddPage();
$tplIdx = $pdf->importPage(28);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$tplIdx = $pdf->importPage(29);
$pdf->useTemplate($tplIdx, 0, 0, 210);


$sql = "select * from aluno
			where aluno.num_processo = '" . $_SESSION["aluno"] . "' and aluno.cod_anoLetivo = '" . $dados_ano_letivo['cod_anoLetivo'] . "'";

$sql_bd = mysqli_query($ligaBD, $sql);
$dados = mysqli_fetch_array($sql_bd);

$pdf->Output('caderneta_de_estagio_'.$dados['nome_aluno'].'.pdf','D');
//$pdf->Output();
?>