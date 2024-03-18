<?php

include ("../funcoes/funcao_selecionar.php");

$missao = $_REQUEST['missao'];

$consultamissao = selecionar("missoes_peo1","*","WHERE missoes = '$missao'");
$noturno = $consultamissao[0]['noturno'];
$poda = $consultamissao[0]['poda'];
$nvg = $consultamissao[0]['nvg'];
$caa = $consultamissao[0]['caa'];

$pilotos = selecionar("pilotos_peo1","pilotos", "WHERE (poda = '$poda' OR poda = 's') AND (nvg = '$nvg' OR nvg = 's') AND (caa = '$caa' OR caa = 's')");

echo 'json_encode($pilotos)';


?>