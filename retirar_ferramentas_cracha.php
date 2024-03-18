<?php 
session_start();

include ("Funcoes/funcao_selecionar.php");

@$cracha = $_REQUEST['cracha'];

$verificarcracha = selecionar ("tabela_mecanicos","cracha","WHERE cracha = '$cracha'");
$consulta = selecionar("tabela_retirada","*","WHERE cracha = '$cracha'","ORDER BY data ASC, numeroferramenta ASC");
$consultaposto = selecionar("tabela_mecanicos","posto","WHERE cracha = '$cracha'");
$consultamecanico = selecionar("tabela_mecanicos","nomeguerra","WHERE cracha = '$cracha'");
$consultasetor = selecionar("tabela_mecanicos","setor","WHERE cracha = '$cracha'");

?>
<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-Control" content="no-store" />
		<link href="css/sofia.css" rel="stylesheet" type:"text/css" media "screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/retirar_ferramentas_cracha.js"></script>
		<title>Retirada de Ferramentas</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php if($verificarcracha){ include ("nav.php");} ?>    
    
	    <header class="span8 offset4">
    		<h1>Retirada de Ferramentas</h1><br>
	    </header>
           
    	<article class="span8 offset4">
        	<?php if($verificarcracha){ ?>
    		<section>
        		<br><h4><b><?php echo $consultaposto[0]['posto']; ?> <?php echo $consultamecanico[0]['nomeguerra']; ?>   -   <?php echo $consultasetor[0]['setor'];?></b></h4><br>         
	        </section>
            <?php }?>
    	    
            <?php if ($consulta == true){ ?>
   			<table width="584" border="1" class="table table-bordered table-hover";>
		    	<tbody>
    		
        		    <tr class="cabecalho">
		    			<td><b>Data</b></td>
        		        <td><b>Código da Ferramenta</b></td>
                		<td><b>Ferramenta</b></td>
		                <td><b>Aeronave</b></td>
        		        <td><b>Devolver</b></td>
		            </tr>
            
            	<?php
				for ($i=0;$i<count($consulta);$i++){
					$consultanumeroferramenta = $consulta[$i]['numeroferramenta'];
					$consultaferramenta = selecionar ("tabela_ferramentas", "ferramenta", "WHERE numeroferramenta = '$consultanumeroferramenta'");
					?>
                             
        		    <tr>
		            	<td><?php echo date('d/m/Y', strtotime ($consulta[$i]['data'])); ?></td>
        		        <td><?php echo $consulta[$i]['numeroferramenta']; ?></td>
                		<td><?php echo $consultaferramenta[0]['ferramenta']; ?></td>
		                <td><?php echo $consulta[$i]['aeronave']; ?></td>
        		        <td><a class="devolver" href="operacoes/devolver_ferramentas_operacao.php?numeroferramenta=<?php echo $consulta[$i]['numeroferramenta'];?>&cracha= <?php echo $consulta[$i]['cracha']; ?>">Devolver</a></td>
		            </tr>
  
            	<?php } ?>
				
				</tbody>
           </table>
	     
				<?php }else{
					if ($verificarcracha){ ?>
            			<section> 
            				<p>Este mecânico não possui ferramentas!</p><br>
						</section>
            	<?php }else{
					header ("location: retirar_ferramentas.php?erro=cracha");
				}}?>
            
	    	<section>
       	    	<form action="retirar_ferramentas_formulario.php">
        	    	<input type="hidden" id="cracha" name="cracha" value="<?php echo $cracha; ?>">
            		<input type ="submit" value="Retirar Ferramenta" formaction="retirar_ferramentas_formulario.php" class="btn" id="botao">
            	</form>
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