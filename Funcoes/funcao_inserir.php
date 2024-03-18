<?php
include ("funcao_conexao.php");
include ("funcao_fecharconexao.php");

function inserir($coluna,$valor,$tabela){
	if((is_array($coluna)) and (is_array($valor))){
		if(count($coluna) == count($valor)){
			$inserir = "INSERT INTO {$tabela} (".implode(', ',$coluna).")
			VALUES('".implode('\',\'',$valor)."')";
		}else{
			return false;
		}
	}else{
		$inserir = "INSERT INTO {$tabela} ({$coluna}) VALUES ('{$valor}')";
	}
	
	if($conexao = connect()){
		if(mysqli_query($conexao,$inserir)){
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