<?php
session_start();

include ("funcoes/funcao_selecionar.php"); 
$setor = selecionar("tabela_mecanicos","setor");

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/retiradas_setor_selecionar.js"></script>
		<title>Selecionar Setor</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    <header class="span8 offset4">
    <h1>Retiradas por Setor</h1><br>
    </header>
    
    <article class="span8 offset4">
    
    	<section>
        <div class="form-inline">
    		<br><form action="retiradas_setor.php" method="post">
        
        		<label for="setor">Setor:</label>
            	
                <select name="setor" id="selecionar">
                <?php for ($i=0; $i<count($setor); $i++){
					$setorfiltrado[] = $setor[$i]['setor']; 
				}
					$unico = array_unique($setorfiltrado);
					$setoresunicos = array_values($unico);
					
					for($y=0; $y<count($unico); $y++){
					?>
                    
                	<option value"<?php echo $setoresunicos[$y]?>"><?php echo $setoresunicos[$y];?></option> 
                <?php }?>
                </select>
                                   
                <button type="submit" formaction="retiradas_setor.php" class="btn" id="botao">Consultar</button>
                
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
   