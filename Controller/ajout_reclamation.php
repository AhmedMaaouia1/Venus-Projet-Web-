<?php
    require_once '../Model/Reclamation.php';
    require_once '../Controller/ReclamationC.php';

    $error = "";

    // create reclamation
    $reclamation = null;

    // create an instance of the controller
    $reclamationC = new ReclamationC();
    if (
        isset($_POST["prenom_reclamation"]) &&	
		isset($_POST["nom_reclamation"]) &&	
        isset($_POST["mail_reclamation"]) &&	
        isset($_POST["sujet_reclamation"]) && 
        isset($_POST["message_reclamation"])
        
       
    ) {
        if (
            !empty($_POST["prenom_reclamation"]) &&
			!empty($_POST["nom_reclamation"]) && 
            !empty($_POST["mail_reclamation"]) &&
            !empty($_POST["sujet_reclamation"]) && 
            !empty($_POST["message_reclamation"])
        ) {
            $reclamation = new Reclamation(
                $_POST['prenom_reclamation'],
				$_POST['nom_reclamation'],
                $_POST['mail_reclamation'], 
                $_POST['sujet_reclamation'],
                $_POST['message_reclamation']
            );
            
            if($test == false )
            {
                $reclamationC->ajouterrec($reclamation);
                echo "testAjout";
                header('Location: ../View/Frontend/acceuil.php');
            }
            else
            header('Location: ../View/Frontend/acceuil.php');
            
            
        }
        else
            $error = "Missing information";
    }else{
        header('Location: ../View/Frontend/acceuil.php');
    }
?>
