<?php

include ("../Funcoes/funcao_inserir.php");

@$x = $_REQUEST['x'];
$numeroferramenta = $_REQUEST['numeroferramenta'];
$ferramenta = $_REQUEST['ferramenta'];

$inserir = inserir(array("numeroferramenta","ferramenta"), array($numeroferramenta,$ferramenta), "tabela_ferramentas");

if ($inserir){
header ("location: ../inserir_ferramentas.php?novo=ok&x=$x");
}elseif (mysql_errno() == 1062){
header ("location: ../inserir_ferramentas.php?novo=chaveprimaria&x=$x");
}else{
echo "Erro não previsto!";
}

?>