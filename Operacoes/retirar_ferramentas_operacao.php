<?php
session_start();

if (@$_SESSION['logado']){ 
include ("../Funcoes/funcao_inserir.php");

$cracha = $_REQUEST['cracha'];
$aeronave = $_REQUEST['aeronave'];
$numeroferramenta = $_REQUEST['numeroferramenta'];

$inserir = inserir(array("numeroferramenta","aeronave","cracha"), array($numeroferramenta, $aeronave, $cracha), "tabela_retirada");
$inserirhistorico = inserir(array("numeroferramenta","aeronave","cracha"), array($numeroferramenta, $aeronave, $cracha), "tabela_historicoretirada");

}else{
	echo ("Área Restrita!");}
?>