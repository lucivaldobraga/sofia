<?php 
session_start();

include ("funcoes/funcao_inserir.php"); 

@$cracha = $_REQUEST['cracha'];
@$aeronave = $_REQUEST['aeronave'];

?>
<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/retirar_ferramentas_formulario2.js"></script>
		<title>Segundo Formulário de Retirada de Ferramentas</title>
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
        <div class="form-inline">
    		<br>
            <form action="#" method="post">
       		  <label for="numeroferramenta">Código da Ferramenta:</label>
            	<input type="text" id="numeroferramenta" name="numeroferramenta" autocomplete="off" class="input-medium" required></input>
               <button type="submit" id="botaoinserir" formaction="#" class="btn">Inserir</button>
        	</form>
            </div>
         </section>
         
         <section>
         	<table width="584" border ="1" id="tabela" class="table table-bordered table-hover">
            	<tbody>
                	<tr>
                    	<td><b>Código da Ferramenta</b></td>
                        <td><b>Ferramenta</b></td>
                    </tr>
                </tbody>
            </table> 
         </section>
         
         <section>
         	<form>
				<input type="hidden" id="cracha" name="cracha" value="<?php echo $cracha; ?>">
                <input type="hidden" id="aeronave" name="aeronave" value="<?php echo $aeronave; ?>">
            	
                <button type="submit" class="btn" id="botaoretirar" formaction="retirar_ferramentas_cracha.php">Retirar Ferramentas</button>
            </form>
            
            <p id="alerta"></p>
            
         </section>
         <a class="btn btn-info span1" href="retirar_ferramentas_cracha.php?cracha=<?php echo $cracha; ?>">Voltar</a>
         
         
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
   