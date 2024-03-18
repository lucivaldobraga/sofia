<?php

function selecionar_join ($coluna, $tabelafrom, $innerjoin, $on, $ordem=NULL, $limite=NULL){
	
	$selecionar_join = "SELECT {$coluna} FROM {$tabelafrom} INNER JOIN {$innerjoin} ON {$on} {$ordem} {$limite}";

	if($conexao = connect()){
		if($query = mysqli_query($conexao, $selecionar_join)){
			if (mysqli_num_rows($query)>0){
				
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
