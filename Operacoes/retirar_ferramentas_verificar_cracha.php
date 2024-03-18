<?php

include ("../Funcoes/funcao_selecionar.php");

$cracha = $_REQUEST['cracha'];

$consulta = selecionar("tabela_mecanicos","cracha","WHERE cracha = '$cracha'");

if($consulta){
	return;
}else{
	echo "Este mecânico não está cadastrado no Banco de Dados!";
	return false;
}
