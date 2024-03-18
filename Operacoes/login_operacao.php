<?php

include ("../Funcoes/funcao_selecionar.php");


$usuario = htmlspecialchars(strip_tags($_REQUEST['campousuario']));
$senha = htmlspecialchars(strip_tags($_REQUEST['camposenha']));

$consulta = selecionar("tabela_login", "*", "WHERE usuario = '$usuario'");

if ($usuario == "" and $senha == ""){
	header("location: ../login.php?erro=negado");
}
elseif($consulta == true){
	for ($i=0; $i<count($consulta); $i++){
		if (crypt($senha, $consulta[$i]['senha']) == $consulta[$i]['senha']){
			session_start();
			$_SESSION['logado'] = true;
			header("location: ../retirar_ferramentas.php");
		}else{
			header ("location: ../login.php?erro=senha");
		}
	}
}else{
	header ("location: ../login.php?erro=usuario");
}
?>
