<?php

function connect($banco="sofia", $usuario="root", $senha="", $hostname="localhost"){
	
	$connect = mysqli_connect($hostname,$usuario,$senha,$banco);
	if(!$connect){
		die (trigger_error("Não foi possível estabelecer a conexção."));
		return false;
	}else{
		mysqli_query($connect, "SET NAMES 'utf8'");
		mysqli_query($connect, 'SET character_set_connection=utf8');
		mysqli_query($connect, 'SET character_set_client=utf8');
		mysqli_query($connect, 'SET character_set_results=utf8');
		return $connect;
	}
}

?>