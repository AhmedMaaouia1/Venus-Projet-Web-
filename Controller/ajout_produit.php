<?php
    include_once '../Model/user.php';
    include_once 'userC.php';

    $error = "";

    // create user
    $produit = null;

    // create an instance of the controller
    $produitC = new ProduitC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["image"]) &&
        isset($_POST["prix"]) && 
        isset($_POST["desp"]) &&
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["image"]) && 
            !empty($_POST["prix"]) && 
            !empty($_POST["desp"]) &&
        ) {
            
            $produit = new Produit(
				$_POST['nom'],
                $_POST['image'], 
                $_POST['prix'],
                $_POST['desp'],
            );
            $mail= $user->getEmail();
            $test = $produitC->verification($mail);
            if($test == false)
            {
                $userC->ajouteruser($user);
                header('Location:../View/Frontend/connexion.php');
            }
            else
            header('Location:../View/Frontend/inscription.php?error=error');
            
            
        }
        else
            $error = "Manque d'informations, Veuillez remplir tout les champs.";
    }

    
?>