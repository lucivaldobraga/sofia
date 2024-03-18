<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/procurar_ferramenta.js"></script>
		<title>Procurar Ferramenta</title>
        
	</head>

	<body><br>

    <div class="container">
    <div class="row">
		
        <?php if (@$_SESSION['logado']){ ?>	
        <?php include ("nav.php"); ?>    
    
    	<header class="span8 offset4">
		    <h1>Localizar Ferramenta</h1><br>
	    </header>
    
		<article class="span8 offset4">
			<section>
    		    <br><p class="lead">Insira a ferramenta que deseja pesquisar</p><br><br>
       		</section>
    
	        <section>
        	<div class="form-inline">
    	    	<form action="#" method="post">
			        <label for="ferramenta">Nome da Ferramenta:</label>
        			<input type="text" id="ferramenta" name="ferramenta" autocomplete="off" autofocus>
                	<p><span id="sugestao"></span></p>
		        </form>            
                </div>
    	    </section>
            
            <br><a class="btn btn-info span1" href="gerenciar_ferramentas.php">Voltar</a>
            
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