<?php
session_start();

if (@$_SESSION['logado']){ 
include ("../Funcoes/funcao_selecionar.php");

$numeroferramenta = $_REQUEST['numeroferramenta'];

$ferramenta = selecionar("tabela_ferramentas","ferramenta", "WHERE numeroferramenta = '$numeroferramenta'");
$mecanico = selecionar("tabela_retirada","numeroferramenta","WHERE numeroferramenta = '$numeroferramenta'");

if($ferramenta && $mecanico){
	echo "erroFerramentaEmUso";
}elseif ($ferramenta && !$mecanico){
	echo $ferramenta[0]['ferramenta'];
}else{
	echo "erroFerramentaInexistente";
}

}else{
	echo ("Área Restrita!");
}
?>