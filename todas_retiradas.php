<?php 
session_start();

include ("Funcoes/funcao_selecionar.php");

$offset = 50;
@$x = $_GET['x'];

if (!$x){
	$x = 0;
}else{
	$x = $_GET['x'];
}

$consulta_total = selecionar("tabela_retirada","data, numeroferramenta, aeronave, cracha",NULL,"ORDER BY DATE(data) ASC, cracha ASC, numeroferramenta ASC");
$consulta = selecionar("tabela_retirada","data, numeroferramenta, aeronave, cracha",NULL,"ORDER BY DATE(data) ASC, cracha ASC, numeroferramenta ASC","LIMIT $offset OFFSET $x");

?>
<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type:"text/css" media "screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/todas_retiradas.js"></script>
		<title>Todas as Retiradas</title>
	</head>
    
	<body>
    <div class="container">
    <div class="row">

	<?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    

    	<header class="span8 offset4">
    		<h1>Todas as Retiradas</h1><br>
    	</header>
        
    	<article class="span8 offset4">
        	<?php if ($consulta == true){?>
    		<table width="584" border="1px" class="table table-bordered table-hover">
    			<thead>
        		    <tr class="cabecalho">
 	           			<th><b>Data</b></th>
    					<th><b>SARAM</b></th>
		                <th><b>Nome de Guerra</b></th>
        		        <th><b>Código da Ferramenta</b></th>
		                <th><b>Ferramenta</b></th>
        		        <th><b>Aeronave</b></th>                
    				</tr>
                </thead>
            
				<tbody>            
            	<?php
				for ($i=0;$i<count($consulta);$i++){
					$consultacracha = $consulta[$i]['cracha'];
					$consultanumeroferramenta = $consulta[$i]['numeroferramenta']; 					
					$consultanomeguerra = selecionar("tabela_mecanicos","nomeguerra","WHERE cracha = '$consultacracha'");
					$consultaferramenta = selecionar("tabela_ferramentas", "ferramenta", "WHERE numeroferramenta = '$consultanumeroferramenta'");
				?>
                
            		<tr>
            			<td><?php echo date('d/m/Y', strtotime($consulta[$i]['data'])); ?></td>
		                <td><?php echo $consulta[$i]['cracha']; ?></td>
        		        <td><?php echo $consultanomeguerra[0]['nomeguerra']; ?></td>
		                <td><?php echo $consulta[$i]['numeroferramenta']; ?></td>
        		        <td><?php echo $consultaferramenta[0]['ferramenta']; ?></td>
                		<td><?php echo $consulta[$i]['aeronave']; ?></td>
		            </tr>
            
            	<?php } ?>
				
				</tbody>
            </table>
				
				<?php }else{ ?>
            <section>
            	<p>Nenhuma ferramenta foi retirada da Ferramentaria!</p>
            </section>
            	<?php }?>
          
            <section class="pagination">
	            <ul>
    	      	 	<?php for ($y=0;$offset*$y<count($consulta_total);$y++){
					if ($y*$offset == $x){
					?>
    	            <li class="active"><a href="todas_retiradas.php?x=<?php echo ($y)*$offset ?>"> <?php echo $y+1 ?></a></li>
        	        <?php }else{ ?>
        		    <li><a href="todas_retiradas.php?x=<?php echo ($y)*$offset ?>"> <?php echo $y+1 ?></a></li>		
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