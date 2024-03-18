<?php 
session_start();

include ("funcoes/funcao_selecionar.php");

@$numeroferramenta = $_REQUEST['numeroferramenta'];
$consulta = selecionar("tabela_ferramentas","*","WHERE numeroferramenta = '$numeroferramenta'", "ORDER BY numeroferramenta ASC");	  
@$editar = $_REQUEST['editar'];
@$x = $_REQUEST['x'];

?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/editar_ferramentas.js"></script>
		<title>Editar Ferramentas</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    <header class="span8 offset4">
    <h1>Editar Ferramentas</h1><br>
    </header>
    
    <article class="span8 offset4">

		<?php
		if ($consulta == true){
		for ($i=0;$i<count($consulta);$i++){
        ?>
    
    	<section>
        	<div class="form-inline">
    		<br><form action="operacoes/editar_ferramentas_operacao.php" method="post">
                		       
            	<label for="ferramenta">Ferramenta:</label>
            	<input type="text" id="ferramenta" name="ferramenta" value="<?php echo $consulta[$i]['ferramenta'] ?>" required autofocus>
                        
            	<input type="hidden" id="numeroferramenta" name="numeroferramenta" value="<?php echo $consulta[$i]['numeroferramenta'] ?>">
                                        
                <input type="hidden" value="<?php echo $x ?>" name="x" id="x">                        
                <button type="submit" formaction="operacoes/editar_ferramentas_operacao.php" class="btn">Atualizar</button>
        	</form>
            </div>
         </section>
         
        	 	<?php }
				}else{ ?>
					<section> <?php
					echo "Nenhuma ferramenta encontrada";
					?>
            		</section>
            	<?php }?>
         
         <a class="btn btn-info span1" href="gerenciar_ferramentas.php?x=<?php echo $x ?>">Voltar</a>
         
       		<?php if ($editar == "erro"){ ?>
 
          	<section>
           		<p>Ocorreu um erro durante a atualização!</p>
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
   