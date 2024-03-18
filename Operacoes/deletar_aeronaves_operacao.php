<?php

include ("../Funcoes/funcao_deletar.php");

@$x = $_GET['x'];
$aeronave = $_REQUEST['aeronave'];

$deletar = deletar("tabela_aeronaves","WHERE aeronave = '$aeronave'");

if ($deletar) {
	header ("location: ../gerenciar_aeronaves.php?x=$x");
}elseif(mysql_errno() == 1451){
	header ("location: ../gerenciar_erro.php?x=$x&erro=aeronaveusada");
}else{
	$numero = mysql_errno();
	$pane = mysql_error();
	header ("location: ../gerenciar_erro.php?x=$x&erro=imprevisto&errno=$numero&pane=$pane");
}

?>
