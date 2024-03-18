// JavaScript Document

window.onload = function () {

	var tabela = document.getElementById("tabela");
	var digitado = document.getElementById("numeroferramenta");
	var inserir = document.getElementById("botaoinserir");
	var retirar = document.getElementById("botaoretirar");
	var banco = [];
	
	document.getElementById("numeroferramenta").focus();	
	
	function myTrim(x){
		return x.replace(/^\s+|\s+$/gm,'');
	}
	
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
		
	
	
	inserir.onclick = function inserir () {
				
		if (banco.indexOf(digitado.value) == -1) {	
			if (digitado.value == ""){
				alert("Insira um número de ferramenta!");
			} else {
				var ajax = iniciaAjax();
				ajax.onreadystatechange=function(){
					if (ajax.readyState == 4 && ajax.status == 200){
						if (myTrim(ajax.responseText) == "erroFerramentaEmUso"){
							alert("Esta ferramenta já está em uso!");
							digitado.value = "";
							digitado.focus();
						}
						else if (myTrim(ajax.responseText) == "erroFerramentaInexistente"){
							alert("Esta ferramenta não consta no Banco de Dados!");
							digitado.value = "";
							digitado.focus();
						} else {
						var row = tabela.insertRow(-1);
						var cel0 = row.insertCell(0);
						var cel1 = row.insertCell(1);
						cel0.appendChild(document.createTextNode(digitado.value));
						cel1.appendChild(document.createTextNode(ajax.responseText));﻿﻿﻿
						digitado.value = "";
						digitado.focus();
						}
					}
			}
		}
			ajax.open("GET", "../Operacoes/retirar_ferramentas_formulario2_tabela.php?numeroferramenta="+digitado.value, true);
			ajax.send();
			banco[banco.length] = digitado.value;
			return false;
		
		}else{
			alert("Esta ferramenta já encontra-se na lista de retiradas");
			digitado.value = "";
			digitado.focus();
			return false;
		}
	}
	
	retirar.onclick = function retirar () {
		var celulas = document.getElementsByTagName("td");
		var aeronave = document.getElementById("aeronave").value;
		var cracha = document.getElementById("cracha").value;
		for(var i=1; i<(celulas.length/2); i++) {
			var numeroferramenta = (celulas[2*i].firstChild.nodeValue);
			var ajax = iniciaAjax();
			ajax.onreadystatechange=function(){
				if (ajax.readyState == 4 && ajax.status == 200){
				}
			}
			ajax.open("GET", "../Operacoes/retirar_ferramentas_operacao.php?cracha="+cracha+"&aeronave="+aeronave+"&numeroferramenta="+numeroferramenta,false);
			ajax.send();
		}
	}
	
	
	window.onkeydown = function() {
		
		if (window.event.keyCode == 112){
			event.preventDefault();
			document.getElementById("botaonav1").click();		
		}
		else if (window.event.keyCode == 113){
			event.preventDefault();
			document.getElementById("botaonav2").click();		
		}
		else if (window.event.keyCode == 114){
			event.preventDefault();
			document.getElementById("botaonav3").click();		
		}
		else if (window.event.keyCode == 115){
			event.preventDefault();
			document.getElementById("botaonav4").click();		
		}
		else if (window.event.keyCode == 116){
			event.preventDefault();
			document.getElementById("botaonav5").click();		
		}
		else if (window.event.keyCode == 117){
			event.preventDefault();
			document.getElementById("botaonav6").click();		
		}
		else if (window.event.keyCode == 118){
			event.preventDefault();
			document.getElementById("botaonav7").click();		
		}
		else if (window.event.keyCode == 119){
			event.preventDefault();
			document.getElementById("botaonav8").click();		
		}
		else if (window.event.keyCode == 120){
			event.preventDefault();
			document.getElementById("botaonav9").click();		
		}
		else if (window.event.keyCode == 121){
			event.preventDefault();
			document.getElementById("botaonav10").click();		
		}
		else if (window.event.keyCode == 122){
			event.preventDefault();
			document.getElementById("botaonav11").click();		
		}
	}
}