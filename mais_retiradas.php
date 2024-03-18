<?php
session_start();
 
include ("Funcoes/funcao_selecionar.php");
include ("funcoes/funcao_selecionar_join.php");

$ferramenta = selecionar_join("tabela_ferramentas.ferramenta","tabela_ferramentas","tabela_historicoretirada","tabela_ferramentas.numeroferramenta = tabela_historicoretirada.numeroferramenta", "ORDER BY tabela_historicoretirada.numeroferramenta ASC");

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/mais_retiradas.js"></script>
		<title>Ferramentas mais Retiradas</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    	<header class="span8 offset4">
    		<h1>Ferramentas mais Retiradas</h1><br>
    	</header>
    
    	<article class="span8 offset4">
        	<?php if ($ferramenta == true){?>
    		<table width="584" border="1" class="table table-bordered table-hover">
    			<tbody>
    		
        		    <tr class="cabecalho">
 	           			<td><b>Ferramenta</b></td>
    					<td><b>N° de Retiradas</b></td>
		           	</tr>
            
            	<?php
				for($i=0;$i<count($ferramenta);$i++){
				$explode = explode(" ",$ferramenta[$i]['ferramenta']);
				$pedaco = array_pop ($explode);
				$juntar[] = implode (" ",$explode);
				}
				
                $contar = array_count_values($juntar); 
				$ordem = arsort($contar);
				$ajuste = array_values($contar);
				$keys = array_keys($contar); 
               
			   	for($y=0;$y<count($contar);$y++){
				?>
                
            		<tr>
            			<td><?php echo $keys[$y]; ?></td>
		                <td><?php echo $ajuste[$y]; ?></td>
        		    </tr>
            
            	<?php } ?>
				
				</tbody>
            </table>
				
				<?php }else{ ?>
            <section>
            	<p>Não há registros que alimentem esta estatística!</p>
            </section>
            	<?php }?>
              
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