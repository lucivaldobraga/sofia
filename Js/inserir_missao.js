// JavaScript Document
window.onchange = function() {

	function iniciaAjax () {
		var ajax = null;
		if(window.XMLHttpRequest){
			ajax = new XMLHttpRequest();
		} else if (window.ActiveXObject){
			try{
				ajax = new ActiveXObject ("Msxm12.XMLHTTP");
			}catch(e){
				ajax = new ActiveXObject ("Microsoft.XMLHTTP");
			}
		}
		return ajax;
	}
	
	var missao = document.getElementById("missao").options[document.getElementById("missao").selectedIndex].value;
	var numeroanv = document.getElementById("numeroanv").options[document.getElementById("numeroanv").selectedIndex].value;
	
	enviar.onclick = function () {
		
		
		function myTrim(x){
			return x.replace(/^\s+|\s+$/gm,'');
		}
		
		if (missao == "" && numeroanv == ""){
			alert("Escolha uma missão ou defina o número de aeronaves que deseja empregar!");
		}
	
		if (missao == "" && numeroanv != "") {
			var ajax = iniciaAjax();
			ajax.onreadystatechange = function() {
				if (ajax.readyState == 4 && ajax.status == 200){
					var presetmissao = document.getElementById("missao");
					var option = document.createElement("option");
					var selecao = JSON.parse(myTrim(ajax.responseText));
					for (var a=0; a<presetmissao.length; a++){
						presetmissao.remove(presetmissao.length -1);
					}
					for (var b=0; b<selecao.length; b++){
					presetmissao.add(option);
					option.text = selecao[0].missoes;
					option.value = selecao[0].missoes;
					}
							
				}
			}
			ajax.open("GET", "../operacoes/inserir_missao_selecionar_numeroanv.php?numeroanv="+numeroanv, true);
			ajax.send();
			return false;
		}
	
	
		if (missao != "" && numeroanv == ""){
			var ajax = iniciaAjax();
			ajax.onreadystatechange = function(){
				if (ajax.readyState == 4 && ajax.status == 200){
					var presetnumeroanv = document.getElementById("numeroanv");
					presetnumeroanv.selectedIndex = ajax.responseText;
					for (var c=0; c<(ajax.responseText); c++){
						var tdianteira = document.getElementById("tabeladianteira");
						var fdianteira = tdianteira.insertRow(-1);
						var cdianteira = fdianteira.insertCell(0);
						var iddianteira = cdianteira[c].appendChild(document.createElement("select"));
						iddianteira.id = "dianteira"+c;
						document.getElementById("dianteira1").appendChild(document.createElement("option"));
						
					
					}
				}
			}
			ajax.open("GET", "../operacoes/inserir_missao_selecionar_missao.php?missao="+missao, true);
			ajax.send();
			return false;
		}
	
		
		if (missao != "" && numeroanv != ""){
			document.getElementById("missao").selectedIndex = 0;
			document.getElementById("numeroanv").selectedIndex = 0;
			return false;
		}
	
	
	
	}
}

