<?php 
include ("../funcoes/funcao_selecionar.php");

$numeroanv = $_REQUEST['numeroanv'];

$consulta = selecionar("missoes_peo1","missoes","WHERE aeronaves = '$numeroanv'");

echo json_encode($consulta);

?>