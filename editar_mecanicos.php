<?php 
session_start();

include ("funcoes/funcao_selecionar.php");

@$cracha = $_REQUEST['cracha'];
$consulta = selecionar("tabela_mecanicos","*","WHERE cracha = '$cracha'", "ORDER BY nomeguerra ASC");	  
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
        <script src="Js/editar_mecanicos.js"></script>
		<title>Editar Mecânicos</title>
	</head>
    
	<body><br>

    <div class="container">
    <div class="row">
    
    <?php if (@$_SESSION['logado']){ ?>
	<?php include ("nav.php"); ?>    
    
    <header class="span8 offset4">
    <h1>Editar Mecânicos</h1><br>
    </header>
    
    <article class="span8 offset4">

		<?php
		if ($consulta == true){
		for ($i=0;$i<count($consulta);$i++){
        ?>
    
    	<section>
    		<br><form action="operacoes/editar_mecanicos_operacao.php" method="post">
  				<div class="form-inline">      
        		<label for="posto">Posto:</label>
                <input list="posto" name="posto" autocomplete="off" value="<?php echo $consulta[$i]['posto'] ?>" required autofocus>
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
                </datalist><br><br>
                </div>
            
            	<div class="form-inline">
            	<label for="nomeguerra">Nome de Guerra:</label>
            	<input type="text" id="nomeguerra" name="nomeguerra" value="<?php echo $consulta[$i]['nomeguerra'] ?>" required> <br><br>
                </div>
                      
                <div class="form-inline">       
            	<label for="setor">Setor:</label>
                <input list="setor" name="setor" autocomplete="off" value="<?php echo $consulta[$i]['setor'] ?>" required>
                <datalist id="setor">
	                <option value="Material Bélico"></option>
                    <option value="EMA"></option>
                    <option value="MANUTENÇÃO C-105"></option>
                    <option value="Coordenação de Hangar"></option>
                    <option value="Aviônica"></option>
                    <option value="Célula"></option>
                    <option value="Hidráulica"></option>
                    <option value="Motopropulsor"></option>
                    <option value="Ferramentaria C-105"></option>
                    <option value="MANUTENÇÃO C-97/98"></option>
                    <option value="Célula"></option>
                    <option value="Coordenação de Hangar"></option>
                    <option value="Hidráulica"></option>
                    <option value="Motopropulsor"></option>
                    <option value=""></option>
                    <option value="MANUTENÇÃO H-60L"></option>
                    <option value="Aviônica"></option>
                    <option value="Componentes Dinâmicos"></option>
                    <option value="Célula"></option>
                    <option value="Hidráulica"></option>
                    <option value="Motopropulsor"></option>
                    <option value="Provedoria"></option>
                    <option value="MANUTENÇÃO DO F-5EM"></option>
                    <option value="Aviônica"></option>
                    <option value="Célula"></option>
                    <option value="Hidráulica"></option>
                    <option value="Motopropulsor"></option>
                    <option value="Casa de Pista"></option>
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
                    <option value="SADM"></option>
				</datalist> <br><br>
                </div>
            
            	<input type="hidden" id="cracha" name="cracha" value="<?php echo $consulta[$i]['cracha'] ?>">
                               
                <input type="hidden" value="<?php echo $x ?>" name="x" id="x">          
                <button type="submit" formaction="operacoes/editar_mecanicos_operacao.php" class="btn">Atualizar</button>
        	</form>
         </section>
         
        	 	<?php }
				}else{ ?>
					<section> <?php
					echo "Nenhum mecânico encontrado";
					?>
            		</section>
            	<?php }?>
         
         <a class="btn btn-info span1" href="gerenciar_mecanicos.php?x=<?php echo $x ?>">Voltar</a>
         
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
   