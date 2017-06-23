<?php
session_start();
include("../php/ligacao.php");
?>
<h2>Altera Ano Letivo</h2>
<?php
$sql = "SELECT * FROM ano_letivo WHERE ano_atual = '1'";

$sql_bd = mysqli_query($ligaBD, $sql);
$dados_ano_letivo = mysqli_fetch_array($sql_bd);


?>
<table>
    <tr>
        <td>Ano Letivo Corrente: </td>
        <td><?php echo $dados_ano_letivo['anoLetivo']; ?></td>
    </tr>
</table>
<input class="pure-button" type="button" onclick="muda_ano()" value="Ano Seguinte">