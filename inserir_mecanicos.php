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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/sofia.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
        <script src="Js/inserir_mecanicos.js"></script>
		<title>Inserir Mecânicos</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    <header class="span8 offset4">
    <h1>Inserir Mecânicos</h1><br>
    </header>
    
    <article class="span8 offset4">
    
    	<section>
    		<br><form action="operacoes/inserir_mecanicos_operacao.php" method="post">
        		<div class="form-inline">
        		<label for="posto">Posto:</label>
                <input list="posto" name="posto" autocomplete="off" required autofocus>
                <datalist id="posto">
 	                <option value="CV"></option>
                	<option value="S2"></option>
                    <option value="S1"></option>
                    <option value="CB"></option>
                    <option value="3S"></option>
                    <option value="2S"></option>
                    <option value="1S"></option>
                    <option value="SO"></option>
                    <option value="2T"></option>
                    <option value="1T"></option>
                    <option value="CP"></option>
                    <option value="MJ"></option>
                    <option value="CL"></option>
                </datalist><br><br>
                </div>
                
                <div class="form-inline">
				<label for="nomeguerra">Nome de Guerra:</label>
            	<input type="text" id="nomeguerra" name="nomeguerra" autocomplete="off" required> <br><br>
                </div>
            
   				<div class="form-inline">         
            	<label for="cracha">N° do SARAM:</label>
            	<input type="number" id="cracha" name="cracha" autocomplete="off" required> <br><br>
                </div>
            
            	<div class="form-inline">
            	<label for="setor">Setor:</label>
                <input list="setor" name="setor" autocomplete="off" required>
                <datalist id="setor">
                	
                    <option value="MANUTENÇÃO C-105"></option>
                    <option value="Coordenação de Hangar C-105"></option>
                    <option value="Aviônica C-105 "></option>
                    <option value="Célula C-105 "></option>
                    <option value="Hidráulica C-105 "></option>
                    <option value="Motopropulsor C-105 "></option>
                    <option value="Ferramentaria C-105"></option>
                    <option value="MANUTENÇÃO C-97/98"></option>
                    <option value="Célula C-97/98 "></option>
                    <option value="Coordenação de Hangar C-97/98 "></option>
                    <option value="Hidráulica C-97/98 "></option>
                    <option value="Motopropulsor C-97/98 "></option>
                    <option value=""></option>
                    <option value="MANUTENÇÃO H-60L"></option>
                    <option value="Aviônica H-60L "></option>
                    <option value="Componentes Dinâmicos H-60L "></option>
                    <option value="Célula H-60L "></option>
                    <option value="Hidráulica H-60L "></option>
                    <option value="Motopropulsor H-60L "></option>
                    <option value="Provedoria H-60L "></option>
                    <option value="MANUTENÇÃO DO F-5EM"></option>
                    <option value="Aviônica F-5EM "></option>
                    <option value="Célula F-5EM "></option>
                    <option value="Hidráulica F-5EM "></option>
                    <option value="Motopropulsor F-5EM "></option>
                    <option value="Casa de Pista F-5EM "></option>
                    <option value="EQV"></option>
                    <option value="SIMULADOR"></option>
                    <option value="PINTURA"></option>
                    <option value="ESTRUTURAS"></option>
                    <option value="LAVAGEM"></option>
                    <option value="END"></option>
                    <option value="Metalurgia"></option>
                    <option value="Barreira"></option>
                    <option value="Bateria"></option>
                    <option value="EAS"></option>
                    <option value="Ferramentaria"></option>
                    <option value="LSC-MN"></option>
                    <option value="Patrimônio"></option>
                    <option value="EMB"></option>
                    <option value="EMA"></option>
                     <option value="PLACON"></option>
                     <option value="ESUP"></option>
                     <option value="PCAN"></option>
                    <option value="Outras seções"></option>
				</datalist> <br><br>
                </div>
                 
                 <input type="hidden" value="<?php echo $x ?>" name="x" id="x">
                <button type="submit" formaction="operacoes/inserir_mecanicos_operacao.php" class="btn">Inserir</button>
        	</form>
         </section>
         
         <a class="btn btn-info span1" href="gerenciar_mecanicos.php?x=<?php echo $x ?>">Voltar</a>
         
       	 <?php if ($novo == "ok"){ ?>
         
         	<section>
           		<p>Mecânico inserido com sucesso!</p>
         	</section>
    
		<?php }elseif ($novo == "chaveprimaria"){ ?>
 
          	<section>
           		<p>Este SARAM já está registrado! Verifique se está correto.</p>
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
   