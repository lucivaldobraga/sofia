<?php

include ("../Funcoes/funcao_deletar.php");

$cracha = $_REQUEST['cracha'];
$numeroferramenta = $_REQUEST['numeroferramenta'];

$deletar = deletar("tabela_retirada","WHERE numeroferramenta = '$numeroferramenta'");

if ($deletar) {
	header ("location: ../retirar_ferramentas_cracha.php?cracha=$cracha");
}else{
	echo mysql_error();?>
    <a href="../retirar_ferramentas_cracha.php">Voltar</a>
    <?php
}

?>
