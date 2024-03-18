<?php 
session_start();

@$x = $_REQUEST['x'];
@$erro = $_REQUEST['erro'];
@$errno = $_REQUEST['errno'];
@$pane = $_REQUEST['pane'];

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<title>Erro na Exclusão</title>
	</head>
    
	<body><br>

    <div class="container-fluid">
    <div class="row-fluid">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    <?php if ($erro == "ferramentausada"){ ?>
    	<header class="span9 offset2">
	    <h1>Gerenciar Ferramentas</h1><br>
        </header>

		<article class="span9 offset2">
        
	        <section> 
				<br><p>Esta ferramenta está sendo utilizada por algum mecânico e não pode ser excluída!</p>
			</section>
            
            <br><a class="btn btn-info span1" href="../gerenciar_ferramentas.php?x=<?php echo $x ?>">Voltar</a>
            
         </article>
     <?php } ?>
     
     
     <?php if ($erro == "mecanicousando"){ ?>
    	<header class="span9 offset2">
	    <h1>Gerenciar Mecânicos</h1><br>
        </header>

		<article class="span9 offset2">
        
	        <section> 
				<br><p>Este mecânico está em posse de ferramentas e não pode ser excluído!</p>
			</section>
            
            <br><a class="btn btn-info span1" href="../gerenciar_mecanicos.php?x=<?php echo $x ?>">Voltar</a>
            
         </article>
     <?php } ?>
     
     
     <?php if ($erro == "aeronaveusada"){ ?>
    	<header class="span9 offset2">
	    <h1>Gerenciar Aeronaves</h1><br>
        </header>

		<article class="span9 offset2">
        
	        <section> 
				<br><p>Existem ferramentas alocadas nesta aeronave. Não é possível excluí-la!</p>
			</section>
            
            <br><a class="btn btn-info span1" href="../gerenciar_aeronaves.php?x=<?php echo $x ?>">Voltar</a>
            
         </article>
     <?php } ?>
     
     
     <?php if ($erro == "imprevisto"){ ?>
    	<header class="span9 offset2">
	    <h1>Erro Imprevisto</h1><br>
        </header>

		<article class="span9 offset2">
        
	        <section> 
				<br><p>Ocorreu um imprevisto. Por favor, contate o administrador do sistema!</p>
                <br><br><p>Erro número: <?php echo $errno; ?></p>
                <br><br><p>Descrição: <?php echo $pane; ?></p>
			</section>
            
         </article>
     <?php } ?>
     
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