<?php
include ("../Funcoes/funcao_selecionar.php");

$ferramenta = selecionar("tabela_ferramentas", "ferramenta");
for ($y=0;$y<count($ferramenta);$y++){
	$ferramentas[] = $ferramenta[$y]['ferramenta'];
}

$letra = $_REQUEST['letra'];

$dica = "";

if ($letra !== ""){
	$letra = strtolower($letra);
	$len=strlen($letra);
	foreach($ferramentas as $nome){
		if (stristr($nome, substr($letra, 0, $len))){
			if($dica === ""){
				$dica = $nome;
			} else {
				$dica .= "<br>".$nome;
			}
		}
	}
}

echo $dica === "" ? "Sem sugestões" : $dica;
?>

