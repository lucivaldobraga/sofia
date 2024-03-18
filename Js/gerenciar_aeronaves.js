// JavaScript Document

window.onload = function() {
	
	var excluir = document.getElementsByClassName("excluir")
	for (var i=0; i<excluir.length; i++){
		excluir[i].onclick = function() {
		var aceitar = confirm("Você quer mesmo excluir esta aeronave?");
		if (aceitar){
			return true;
		}else{
			return false;
		}
	}
	}
	
	var botao = document.getElementById("botao");
	window.onkeydown = function() {
		if (window.event.keyCode == 13){
			botao.click();
		}
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

