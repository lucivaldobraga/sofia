<?php 
session_start();

include ("funcoes/funcao_selecionar.php"); 

$aeronaves = selecionar("tabela_aeronaves","aeronave");
@$cracha = $_REQUEST['cracha'];

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type:"text/css" media "screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/retirar_ferramentas_formulario.js"></script>
		<title>Formulário de Retirada de Ferramentas</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    	
        <?php if (@$_SESSION['logado']){ ?>
		<?php include ("nav.php"); ?>    
    
    <header class="span8 offset4">
    <h1>Retirar Ferramentas</h1><br>
    </header>
    
    <article class="span8 offset4">
    
    	<section>
        <div class="form-inline">
    		<br><form action="retirar_ferramentas_formulario2.php" method="post">
           		<label for="aeronave">Aeronave:</label>
           
                <select name="aeronave" class="input-medium" id="selecionar">
                <?php for ($i=0; $i<count($aeronaves); $i++){ ?>
                	<option value="<?php echo $aeronaves[$i]['aeronave']?>"><?php echo $aeronaves[$i]['aeronave']?></option>
                <?php } ?>
                </select>
            
            	<input type="hidden" id="cracha" name="cracha" value="<?php echo $cracha; ?>">
                
                <button type="submit" formaction="retirar_ferramentas_formulario2.php" class="btn" id="botao">Inserir</button>
        	</form>
            </div>
         </section>
         
         <a class="btn btn-info span1" href="retirar_ferramentas_cracha.php?x=0&cracha=<?php echo $cracha; ?>">Voltar</a>
			
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
   
