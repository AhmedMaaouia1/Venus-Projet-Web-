<?php
    include_once '../Model/categorie.php';
    include_once 'categorieC.php';

    $error = "";

    // create categorie
    $categorie = null;

    // create an instance of the controller
    $produitC = new CategorieC();
    if (
		isset($_POST["nom"]) &&		
    ) {
        if (
			!empty($_POST['nom']) &&
        
        ) {
            
            $produit = new Produit(
				$_POST['nom'],
        
            );
         
    }

    
?>