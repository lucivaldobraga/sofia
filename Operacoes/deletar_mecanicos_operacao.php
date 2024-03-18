<?php

include ("../Funcoes/funcao_deletar.php");

@$x = $_GET['x'];
$cracha = $_REQUEST['cracha'];

$deletar = deletar("tabela_mecanicos","WHERE cracha = '$cracha'");

if ($deletar) {
	header ("location: ../gerenciar_mecanicos.php?x=$x");
}elseif(mysql_errno() == 1451){
	header ("location: ../gerenciar_erro.php?x=$x&erro=mecanicousando");
}else{
	$numero = mysql_errno();
	$pane = mysql_error();
	header ("location: ../gerenciar_erro.php?x=$x&erro=imprevisto&errno=$numero&pane=$pane");
}

?>
