<?php
include ("../Funcoes/funcao_conexao.php");
include ("../Funcoes/funcao_fecharconexao.php");

function deletar($tabela,$where=NULL){
	
	$deletar = "DELETE FROM {$tabela} {$where}";
	
	if($conexao = connect()){
		if(mysqli_query($conexao,$deletar)){
			FecharConexao($conexao);
			return true;
		}else{
			echo "Query inválida!";
			return false;
		}
	}else{
		return false;
	}
}

?>