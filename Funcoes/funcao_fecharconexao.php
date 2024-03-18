<?php

function FecharConexao($connect){
	$fechar = mysqli_close($connect);
	if(!$fechar){
		echo "Impossível fechar a conexão";
		return false;
	}else{
		return true;
	}
}


?>