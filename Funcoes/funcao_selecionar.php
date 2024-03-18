<?php

include("funcao_conexao.php");
include("funcao_fecharconexao.php");

function selecionar ($tabela,$coluna="*",$where=NULL,$ordem=NULL,$limite=NULL){
	
	$selecionar = "SELECT {$coluna} FROM {$tabela} {$where} {$ordem} {$limite}";
	
	if ($conexao = connect()){
		if($query = mysqli_query($conexao, $selecionar)){
			if(mysqli_num_rows($query)>0){
			
				$resultados_totais = array();
				
				while ($resultado = mysqli_fetch_assoc($query)){
					$resultados_totais[] = $resultado;
				}
				
				fecharConexao($conexao);
				
				return $resultados_totais;
			
			}else{
				return false;
			}
		}else{
			return false;
		}
	}else{
		return false;
	}
}
				
?>		