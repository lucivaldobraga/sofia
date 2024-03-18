<?php

include ("../funcoes/funcao_selecionar.php");

$missao = $_REQUEST['missao'];

$consulta = selecionar("missoes_peo1","aeronaves", "WHERE missoes = '$missao'");
$numeroanv = $consulta[0]['aeronaves'];

echo $numeroanv;
?>