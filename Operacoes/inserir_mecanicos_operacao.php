<?php
session_start();

if (@$_SESSION['logado']){ 
include ("../Funcoes/funcao_inserir.php");

@$x = $_REQUEST['x'];
$posto = $_REQUEST['posto'];
$nomeguerra = $_REQUEST['nomeguerra'];
$cracha = $_REQUEST['cracha'];
$setor = $_REQUEST['setor'];

$inserir = inserir(array("posto","nomeguerra","cracha","setor"), array($posto, $nomeguerra, $cracha, $setor), "tabela_mecanicos");

if ($inserir){
header ("location: ../inserir_mecanicos.php?novo=ok");
}elseif (mysql_errno() == 1062){
header ("location: ../inserir_mecanicos.php?novo=chaveprimaria&x=$x");
}else{
echo "Erro não previsto!";
}

}else{
	echo ("Área Restrita!");
}
?>