<?php 
session_start();

include ("funcoes/funcao_selecionar.php"); 
$aeronaves = selecionar("tabela_aeronaves","aeronave");
?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/movimentacoes_por_aeronave_selecionar.js"></script>
		<title>Selecionar Aeronave e Período</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    <header class="span8 offset4">
    <h1>Movimentacões por Aeronave</h1><br>
    </header>
    
    <article class="span8 offset4">
       	<section>
    		<br><form action="movimentacoes_por_aeronave.php" method="post" role="form">	
            <div class="form-inline">
				<label for="datainicial">Data Inicial:</label>
				<input type="date" name="datainicial"  class="form-inline" placeholder="dd/mm/aaaa"><br><br>
            </div>
            <div class="form-inline">    
				<label for="datafinal">Data Final:</label>
				<input type="date" id="datafinal" name="datafinal" placeholder="dd/mm/aaaa"><br><br>
			</div>
            <div class="form-inline">
            	<label for="aeronave">Aeronave:</label>
            	<select name="aeronave">
                <?php for ($i=0; $i<count($aeronaves);$i++){ ?>
                <option value="<?php echo $aeronaves[$i]['aeronave']?>"><?php echo $aeronaves[$i]['aeronave']?></option>
                <?php } ?>
                </select><br><br>
                
                </div>
                <button type="submit" formaction="movimentacoes_por_aeronave.php" class="btn">Consultar</button>
                
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
   