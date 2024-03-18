<?php
session_start();

if (@$_SESSION['logado']){ 
include ("../funcoes/funcao_atualizar.php"); 

@$x = $_REQUEST['x'];
$numeroferramenta = $_REQUEST['numeroferramenta'];
$ferramenta = $_REQUEST['ferramenta'];


$atualizar = atualizar("ferramenta","$ferramenta", "tabela_ferramentas", "WHERE numeroferramenta = '$numeroferramenta'");

if ($atualizar){
	header ("location: ../gerenciar_ferramentas.php?x=$x");
}else{
	header ("location: ../editar_ferramentas.php?editar=erro&x=$x");
}

}else{
	echo ("Área Restrita!");
}
?>	
	