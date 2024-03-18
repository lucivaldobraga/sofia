<?php
include ("../Funcoes/funcao_selecionar.php");

$numeroferramenta = selecionar("tabela_retirada","numeroferramenta");
for ($i=0; $i<count($numeroferramenta);$i++){
	$cadanumero = $numeroferramenta[$i]['numeroferramenta'];
	$ferramenta = selecionar("tabela_ferramentas", "ferramenta", "WHERE numeroferramenta = '$cadanumero'");
	for ($y=0;$y<count($ferramenta);$y++){
		$ferramentas[] = $ferramenta[$y]['ferramenta'];
		
	}
}

$letra = $_REQUEST['letra'];

$dica = "";

if ($letra !== ""){
	$letra = strtolower($letra);
	$len=strlen($letra);
	foreach($ferramentas as $nome){
		if (stristr($nome, substr($letra, 0, $len))){
			$link = selecionar("tabela_ferramentas","numeroferramenta","WHERE ferramenta='$nome'");
			if($dica === ""){
				$dica = "<a href='localizar_ferramenta.php?numeroferramenta=".$link[0]['numeroferramenta']."'>" . $nome."</a>";
			} else {
				$dica .= "<br>"."<a href='localizar_ferramenta.php?numeroferramenta=".$link[0]['numeroferramenta']."'>".$nome."</a>";
			}
		}
	}
}

echo $dica === "" ? "Sem sugestões" : $dica;
?>

