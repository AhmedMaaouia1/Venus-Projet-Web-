document.getElementById("myform").addEventListener("submit", function(e) {
 
	var erreur;
 
	var contenu = document.getElementById("contenu")
    if (!contenu.value) {
		erreur = "Veuillez renseigner un commentaire";
	}
	
	if (erreur) {
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;
	} else {
		alert('Commentaire modifier!');
	}
 
 

 

	
});