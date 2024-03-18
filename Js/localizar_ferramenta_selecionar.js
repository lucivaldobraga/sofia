// JavaScript Document

window.onload = function() {
	var campo = document.getElementById("ferramenta");
	document.getElementById("numeroferramenta").focus();
	
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
	
	campo.onkeyup = function mostrarDica() {		
		var texto = campo.value;
		var ajax = iniciaAjax();
		if (texto.length==0){
			document.getElementById("sugestao").innerHTML="";
			return;
		} else {
			ajax.onreadystatechange=function() {
				if (ajax.readyState == 4 && ajax.status == 200){
					document.getElementById("sugestao").innerHTML=ajax.responseText;
				}
			}
			ajax.open("GET", "../Operacoes/localizar_ferramenta_autocompletar.php?letra="+texto, true);
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
			
	