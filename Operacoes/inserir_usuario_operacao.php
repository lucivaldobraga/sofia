<?php

include ("../Funcoes/funcao_inserir.php");

$usuario = "eda";
$senha = "eda";
$cryptsenha = crypt($senha,$senha);

inserir(array("usuario","senha"), array($usuario, $cryptsenha), "tabela_login");

?>