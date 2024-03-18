<?php 
session_start();

include ("Funcoes/funcao_selecionar.php");

@$setor = $_REQUEST['setor'];

$offset = 50;
@$x = $_GET['x'];

if (!$x){
	$x = 0;
}else{
	$x = $_GET['x'];
}

$consultacracha = selecionar("tabela_mecanicos", "cracha", "WHERE setor = '$setor'", "ORDER BY cracha");

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/retiradas_setor.js"></script>
		<title>Retiradas por Setor</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
   		<header class="span8 offset4">
   			<h1>Retiradas por Setor</h1><br>
   		</header>
    
   		<article class="span8 offset4">
    			
	        <section>
       			<br><h4><b><?php echo $setor; ?></b></h4><br>         
       		</section>
                
				
            <?php if ($consultacracha == true){ ?>
    		<table width="584" border="1" class="table table-bordered table-hover">
    			<tbody>
    			 		
    	            <tr class="cabecalho">
    					<td><b>SARAM</b></td>
    	            	<td><b>Nome de Guerra</b></td>
	       		        <td><b>Código da Ferramenta</b></td>
               			<td><b>Ferramenta</b></td>
		                <td><b>Data</b></td>
    				</tr>
            
           		<?php
				for ($i=0;$i<count($consultacracha);$i++){
				$consultacrachai = $consultacracha[$i]['cracha'];
				$consulta = selecionar("tabela_retirada","data, numeroferramenta","WHERE cracha = '$consultacrachai'","ORDER BY cracha ASC, numeroferramenta ASC, DATE(data) ASC","LIMIT $offset OFFSET $x");
				$consulta_total = selecionar("tabela_retirada","data, numeroferramenta","WHERE cracha = '$consultacrachai'","ORDER BY cracha ASC, numeroferramenta ASC, DATE(data) ASC");
				
				for($z=0;$z<count($consulta);$z++){
				$consultanumeroferramenta = $consulta[$z]['numeroferramenta'];
				$consultanomeguerra = selecionar("tabela_mecanicos","nomeguerra","WHERE cracha = '$consultacrachai'");
				$consultaferramenta = selecionar("tabela_ferramentas", "ferramenta", "WHERE numeroferramenta = '$consultanumeroferramenta'");
				if ($consulta){
				?>
                
               		<tr>
           				<td class="cracha"><?php echo $consultacracha[$i]['cracha']; ?></td>
		                <td><?php echo $consultanomeguerra[0]['nomeguerra']; ?></td>
           			    <td><?php echo $consulta[$z]['numeroferramenta']; ?></td>
		                <td><?php echo $consultaferramenta[0]['ferramenta'] ?></td>
           			    <td><?php echo date('d/m/Y', strtotime($consulta[$z]['data'])); ?></td>
           			</tr>
                
                    
           		<?php }}} ?>
				</tbody>
			</table>
				
				<?php }else{ ?>
            <section> 
				<p>Nenhum mecânico deste setor possui ferramentas!</p>
			</section>
            <?php }?>
            
       		<section class="pagination">
            <ul>
           	<?php for ($y=0;$offset*$y<count(@$consulta_total);$y++){
			if ($y*$offset == $x){
			?>
            <li class="active"><a href="retiradas_setor.php?x=<?php echo ($y)*$offset ?>"> <?php echo $y+1 ?></a></li>
            <?php }else{ ?>
            <li><a href="retiradas_setor.php?x=<?php echo ($y)*$offset ?>&setor=<?php echo $setor?>"> <?php echo $y+1 ?></a></li>
            <?php }} ?>
            </ul>
        	</section>
                
    	</article>
    
    <?php }else{ ?>    
    <article>
    	<section>
        	<p><b>Acesso restrito! Faça login no sistema!</b></p><br>
            <a class="btn btn-info pagination-centered" href="login.php">Fazer login</a>
        </section>    
    </article>
    <?php } ?>
    
    </div>
    </div>
	</body>
    
</html>