<?php
session_start();

include ("funcoes/funcao_inserir.php"); 

@$novo = $_REQUEST['novo'];
@$x = $_REQUEST['x'];

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/inserir_aeronaves.js"></script>
		<title>Inserir Aeronaves</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    <header class="span8 offset4">
    <h1>Inserir Aeronaves</h1><br>
    </header>
    
    <article class="span8 offset4">
    
    	<section>
        
    		<br><form action="operacoes/inserir_aeronaves_operacao.php" method="post">
        		<div class="form-inline">
        		<label for="aeronave">Aeronave:</label>
            	<input type="text" id="aeronave" name="aeronave" autocomplete="off" required autofocus> <br><br>
                 </div>
                 <input type="hidden" value="<?php echo $x ?>" name="x" id="x">
                <button type="submit" formaction="operacoes/inserir_aeronaves_operacao.php" class="btn">Inserir</button>
        	</form>
         </section>
         
         <a class="btn btn-info span1" href="gerenciar_aeronaves.php?x=<?php echo $x ?>">Voltar</a>
         
       	 <?php if ($novo == "ok"){ ?>
         
         	<section>
           		<p>Aeronave inserida com sucesso!</p>
         	</section>
    
		<?php }elseif ($novo == "chaveprimaria"){ ?>
 
          	<section>
           		<p>Esta aeronave já foi registrada! Tente novamente.</p>
         	</section>
        	
            <?php }else{} ?>
          
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
   