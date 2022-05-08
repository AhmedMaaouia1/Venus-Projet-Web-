document.getElementById("myform").addEventListener("submit", function(e) {
 
	var erreur;
 
	
	
	var contenu = document.getElementById("contenu")
    if (!contenu.value) {
		erreur = "Veuillez renseigner un contenu";
	}
	var description = document.getElementById("description")
    if (!description.value) {
		erreur = "Veuillez renseigner un description";
	}
	var titre = document.getElementById("titre")
    if (!titre.value) {
		erreur = "Veuillez renseigner un titre";
	}
	if (erreur) {
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;}
	 else {
		alert('Succés!');
	}
	
 
 

 

	
});
