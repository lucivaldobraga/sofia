<?php 
session_start();
@$erro = $_REQUEST["erro"];
?>
<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/retirar_ferramentas.js"></script>
		<title>Retirada de Ferramentas</title>
     
	</head>
    
	<body><br>
    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    	<header class="span8 offset4">
    		<h1>Retirada de Ferramentas</h1><br>
	    </header>
           
    	<article class="span8 offset4">
        
    		<section>
		        <br><p class="lead">Insira os dados do mecânico que deseja consultar</p><br><br>
        	</section>
	
    		<section>
				<div class="form-inline"> 	   		
        		<form action="retirar_ferramentas_cracha.php" method="post" role="form">
            	   	<label for="cracha">N° SARAM:</label>
                	<input type="password" id="cracha" name="cracha" class="input-large" autofocus>
					<input type="submit" id="enviar" value="Consultar" formaction="retirar_ferramentas_cracha.php" class="btn">
            	</form>            
        		</div>    
        <?php if ($erro == "cracha"){ ?>
            <p i="erro">Este mecânico não está cadastrado no Banco de Dados!</p>
        <?php } ?>
	    	</section>
        
	        <section>    
    		    <br><p class="lead"></p><br>
<br>
<br>
<br>
<br>
        	</section>
        
	        
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