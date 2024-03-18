<?php

include("../funcoes/funcao_conexao.php");
include("../funcoes/funcao_fecharconexao.php");

function atualizar ($coluna,$valor,$tabela,$where){
	
	if ((is_array($coluna)) and (is_array($valor))){
		if(count($coluna) == count($valor)){
			
			$valor_coluna = NULL;
			for ($i=0;$i<count($coluna);$i++){
				$valor_coluna .="{$coluna[$i]}='{$valor[$i]}',";
			}
			$valor_coluna = substr($valor_coluna,0,-1);
			
			$atualizar = "UPDATE {$tabela} SET {$valor_coluna} {$where}";
		
		}else{
			return false;
		}
	}else{	
		$atualizar = "UPDATE {$tabela} SET {$coluna} = '{$valor}' {$where}";
// Verificar se esse valor é realmente assim ou se é Valor_coluna
}
	if($conexao = connect()){
		if(mysqli_query($conexao,$atualizar)){
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
