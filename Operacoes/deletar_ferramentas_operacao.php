<?php

include ("../Funcoes/funcao_deletar.php");

@$x = $_GET['x'];
$numeroferramenta = $_REQUEST['numeroferramenta'];

$deletar = deletar("tabela_ferramentas","WHERE numeroferramenta = '$numeroferramenta'");

if ($deletar) {
	header ("location: ../gerenciar_ferramentas.php?x=$x");
}elseif(mysql_errno() == 1451){
	header ("location: ../gerenciar_erro.php?x=$x&erro=ferramentausada");
}else{
	$numero = mysql_errno();
	$pane = mysql_error();
	header ("location: ../gerenciar_erro.php?x=$x&erro=imprevisto&errno=$numero&pane=$pane");
}

?>
