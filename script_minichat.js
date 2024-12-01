window.onload = function AutoScrollDown(){		/*Fonction permettant au bloc affichant les messages d'avoir sa barre de scroll automatiquement en bas
												  et d'avoir le focus sur la zone de saisie*/
    chat = document.getElementById('Chat');
    chat.scrollTop = chat.scrollHeight;
    document.getElementById('Message').focus();
}

onkeypress = function(e){						/*Fonction permettant de pouvoir écrire dans la zone de saisie sans avoir à cliquer dessus*/
    if(e.charCode){
    	document.getElementById('Message').focus();
	}
}
