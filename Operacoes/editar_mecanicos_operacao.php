<?php
session_start();

if (@$_SESSION['logado']){ 

include ("../funcoes/funcao_atualizar.php"); 

@$x = $_REQUEST['x'];
$posto = $_REQUEST['posto'];
$nomeguerra = $_REQUEST['nomeguerra'];
$cracha = $_REQUEST['cracha'];
$setor = $_REQUEST['setor'];

$atualizar = atualizar(array("posto","nomeguerra","setor"), array($posto, $nomeguerra, $setor), "tabela_mecanicos", "WHERE cracha = '$cracha'");

if ($atualizar){
	header ("location: ../gerenciar_mecanicos.php?&x=$x");
}else{
	header ("location: ../editar_mecanicos.php?editar=erro");
}

}else{
	echo ("Área Restrita!");
}
?>	
	