<?php
session_start();

if (@$_SESSION['logado']){ 

include ("../Funcoes/funcao_inserir.php");

@$x = $_REQUEST['x'];
$aeronave = $_REQUEST['aeronave'];

$inserir = inserir("aeronave",$aeronave, "tabela_aeronaves");

if ($inserir){
header ("location: ../inserir_aeronaves.php?novo=ok");
}elseif (mysql_errno() == 1062){
header ("location: ../inserir_aeronaves.php?novo=chaveprimaria&x=$x");
}else{
echo "Erro não previsto!";
}

}else{
	echo ("Área Restrita!");
}
?>