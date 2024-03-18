<?php 
session_start();

include ("Funcoes/funcao_selecionar.php");

@$numeroferramenta = $_REQUEST['numeroferramenta'];

$verificarferramenta = selecionar("tabela_ferramentas", "numeroferramenta", "WHERE numeroferramenta = '$numeroferramenta'");
$consulta = selecionar("tabela_retirada","data, numeroferramenta, aeronave, cracha","WHERE numeroferramenta = '$numeroferramenta'");

?>


<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/localizar_ferramenta.js"></script>
		<title>Localizar Ferramenta</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php if($verificarferramenta){ include ("nav.php"); }?>    
    
	    <header class="span8 offset4">
    		<h1>Localizar Ferramenta</h1><br>
	    </header>
           
    	<article class="span8 offset4">
    	 
           <?php if ($consulta == true){ ?>
    		<table width="584" border="1" class="table table-bordered table-hover">
    			<tbody>
    		
            		<tr class="cabecalho">
    					<td><b>Código da Ferramenta</b></td>
                		<td><b>Ferramenta</b></td>
                		<td><b>SARAM</b></td>
                		<td><b>Nome de Guerra</b></td>
                		<td><b>Aeronave</b></td>
                        <td><b>Data</b></td>
    				</tr>
            
            	<?php
					for ($i=0;$i<count($consulta);$i++){
					$consultacracha = $consulta[$i]['cracha'];
					$consultanumeroferramenta = $consulta[$i]['numeroferramenta']; 					
					$consultanomeguerra = selecionar("tabela_mecanicos","nomeguerra","WHERE cracha = '$consultacracha'");
					$consultaferramenta = selecionar("tabela_ferramentas", "ferramenta", "WHERE numeroferramenta = '$consultanumeroferramenta'");
				?>
                
            		<tr>
                    	<td><?php echo $numeroferramenta; ?></td>
                        <td><?php echo $consultaferramenta[0]['ferramenta'] ?></td>
            			<td><?php echo $consulta[$i]['cracha']; ?></td>
                		<td><?php echo $consultanomeguerra[0]['nomeguerra']; ?></td>
 		     	        <td><?php echo $consulta[$i]['aeronave']; ?></td>
                		<td><?php echo date('d/m/Y', strtotime($consulta[$i]['data'])); ?></td>
		            </tr>
            	<?php }?>
                
        		</tbody>
        	</table>
              
              <?php }else{
					if ($verificarferramenta){ ?>
            			<section> 
            				<p>Esta ferramenta encontra-se na Ferramentaria!</p>
						</section>
            	<?php }else{
					header ("location: localizar_ferramenta_selecionar.php?erro=numeroferramenta");
				}}?>
              
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