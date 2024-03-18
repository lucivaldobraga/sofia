<?php 
session_start();

include ("Funcoes/funcao_selecionar.php");

$offset = 100;
@$x = $_GET['x'];

if (!$x){
	$x = 0;
}else{
	$x = $_GET['x'];
}

$consulta_total = selecionar("tabela_ferramentas","*",NULL,"ORDER BY numeroferramenta ASC");
$consulta = selecionar("tabela_ferramentas","*",NULL,"ORDER BY numeroferramenta ASC","LIMIT $offset OFFSET $x");

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/gerenciar_ferramentas.js"></script>
		<title>Gerenciar Ferramentas</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
  
    
    	<header class="span8 offset4">
	    	<h1>Gerenciar Ferramentas</h1><br>
    	</header>
    
	    <article class="span8 offset4">
        	<?php if ($consulta == true){ ?>
    		<table width="584" border="1" class="table table-bordered table-hover">
		    	<tbody>
    		
        		    <tr class="cabecalho">
		    			<td><b>N° da Ferramenta</b></td>
        		        <td><b>Ferramenta</b></td>
		                <td><b>Editar/Excluir</b></td>
    				</tr>
            
            	<?php
				for ($i=0;$i<count($consulta);$i++){
            	?>
                
		            <tr>
        		    	<td><?php echo $consulta[$i]['numeroferramenta']; ?></td>
		                <td><?php echo $consulta[$i]['ferramenta']; ?></td>
        		        <td><a href="editar_ferramentas.php?numeroferramenta=<?php echo $consulta[$i]['numeroferramenta']; ?>&x=<?php echo $x ?>">Editar</a> / <a class="excluir" href="operacoes/deletar_ferramentas_operacao.php?numeroferramenta=<?php echo $consulta[$i]['numeroferramenta']; ?>&x=<?php echo $x ?>">Excluir</a></td>
		            </tr>
            
            	<?php } ?>
                
        		</tbody>
	        </table>
                
				<?php }else{ ?>
			<section>
        		<p>Nenhuma ferramenta registrada!</p>
	   		</section>
            	<?php }?>
       
    	    <section class="pagination">
            <ul>
           		<?php for ($y=0;$offset*$y<count($consulta_total);$y++){ 
				if ($y*$offset == $x){
				?>
                <li class="active"><a href="gerenciar_ferramentas.php?x=<?php echo ($y)*$offset ?>"> <?php echo $y+1 ?></a></li>
                <?php }else{ ?>
	            <li><a href="gerenciar_ferramentas.php?x=<?php echo ($y)*$offset ?>"> <?php echo $y+1 ?></a></li>
    	        <?php }} ?>
                </ul>
       		</section>	
        
        	<section>
            <div class="form-inline">
   				<form>
                	<input type="hidden" value="<?php echo $x ?>" name="x" id="x">
  	         		<input type="submit" value="Inserir" formaction="inserir_ferramentas.php" class="btn">
                    <input type="submit" value="Procurar Ferramenta" formaction="procurar_ferramenta.php" class="btn" id="procurarferramenta">
	            </form>
            </div>
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