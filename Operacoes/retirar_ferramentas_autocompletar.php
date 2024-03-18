<?php
include ("../Funcoes/funcao_selecionar.php");

$mecanico = selecionar("tabela_mecanicos","nomeguerra, cracha");

$letra = $_REQUEST['letra'];

$dica = "";

if ($letra !== ""){
	$letra = strtolower($letra);
	$len=strlen($letra);
	for($a=0;$a<count($mecanico);$a++){
		$nome = $mecanico[$a]['nomeguerra'];
		$cracha = $mecanico[$a]['cracha'];	
		if (stristr($letra, substr($nome, 0, $len))){
			$link = selecionar("tabela_mecanicos","cracha, setor, posto","WHERE nomeguerra='$nome' AND cracha='$cracha'");
			if($dica === ""){
				$dica = "<a href='retirar_ferramentas_cracha.php?cracha=".$link[0]['cracha']."'>" . $nome. " (".$link[0]['posto'].")"." - ".$link[0]['setor']. "</a>";
			} else {
				$dica .="<br>"."<a href='retirar_ferramentas_cracha.php?cracha=".$link[0]['cracha']."'>".$nome." (".$link[0]['posto'].")"." - ".$link[0]['setor']."</a>";
			}
		}
	}
}


echo $dica === "" ? "Sem sugestões" : $dica;
?>






