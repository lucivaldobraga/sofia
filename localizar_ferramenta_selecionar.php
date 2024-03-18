<?php
session_start();

@$erro = $_REQUEST['erro'];

?>
<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/localizar_ferramenta_selecionar.js"></script>
		<title>Localizar Ferramenta</title>
     
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
        <br><p class="lead">Insira os dados da ferramenta que deseja localizar</p><br><br>
        </section>
    
    	<section>
        	<div class="form-inline">
        	<form action="localizar_ferramenta.php" method="post">
            	<label for="numeroferramenta">Código da Ferramenta:</label>
          		<input type="text" id="numeroferramenta" name="numeroferramenta" autocomplete="off">
            	<input type="submit" id="enviar" value="Consultar" formaction="localizar_ferramenta.php" class="btn">
            </form>
            </div>
            
            <?php if ($erro == "numeroferramenta"){ ?>
            <p i="erro">Esta ferramenta não está cadastrada no Banco de Dados!</p>
        <?php } ?>            
    	</section>
        
        <section>    
    		<br><p class="lead">Ou</p><br>
        </section>
        
        <section>
        	<div class="form-inline">
        	<form action="#" method="post">
		        <label for="ferramenta">Nome da Ferramenta:</label>
        		<input type="text" id="ferramenta" name="ferramenta" autocomplete="off" class="input-xlarge">
                <p><span id="sugestao"></span></p>
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