<?php

include ("funcoes/funcao_conexao.php");

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
		<title>Sofia - Entrar</title>
	</head>
    
	<body>

	    <div class="container-fluid">
    	<div class="row-fluid">
		<figure class="span12 pagination-centered">
			<br><img src="titulo.jpg">
            <figure class="span13 pagination-left">
            <br><img src="imagens/PicsArt_09-17-12.37.15.jpg" style="width: 300px; height: 100px;"> 
        </div>
        
        <div class="row-fluid">
          <article id="articlelogin" class="span4 offset4">
        
           <div class="form-horizontal pagination-centered">
            <form action="Operacoes/login_operacao.php" method="post">
        	
             	<label class="control-label" id="campousuario" for="campousuario">Usuário</label> <br>
                 <input type="text" name="campousuario" id="campousuarioinput" class="input-xlarge" autofocus><br><br>
            
            
            
           <br> <label class="control-label" id="camposenha" for="camposeenha">Senha</label> <br>
            <input type="password" name="camposenha" id="camposenhainput" class="input-xlarge"> <br> <br>
         <input type="submit" formaction="Operacoes/login_operacao.php" id="botaoentrar" value="Entrar" class="btn">
<p>Desenvolvedor S2 Lucivaldo </p>
            
        </form>
        </div>
        
         

        <?php if ($erro == "negado"){ ?>
        <section>
			<br><p>Acesso restrito! Insira usuário e senha!</p><br>
        </section>
        <?php } ?>
        
        
        <?php if ($erro == "usuario"){ ?>
        <section>
			<br><p>O usuário informado não existe!</p><br>
        </section>
        <?php } ?>
        
        
        <?php if ($erro == "senha"){ ?>
        <section>
			<br><p>Senha incorreta!</p><br>
        </section>
        <?php } ?>
        
    	</article>
	    </div>
    	</div>
    </body>