<?php
   include_once '../Model/Evenement.php'; 
include_once 'EvenementC.php';

    $error = "";

    // create Evenement
    $evenement = null;

    // create an intance of the controller
    $EvenementC = new EvenementC();
    if (
        isset($_POST["nom_event"]) &&	
        isset($_POST["localisation_event"]) &&
		isset($_POST["date_event"]) && 
        isset($_POST["dis_event"]) 
    ) {
        if (
            !empty($_POST["nom_event"]) && 
            !empty($_POST["localisation_event"]) && 
			!empty($_POST["date_event"]) && 
            !empty($_POST["dis_event"]) 
        ) {
            $evenement = new Evenement(
                $_POST['nom_event'],
                $_POST['localisation_event'], 
				$_POST['date_event'],
                $_POST['dis_event']
            );
            $EvenementC->ajouterEvenement($evenement);
            header('Location:../View/Backend/liste_evenements.php');
        }
        else
            $error = "Missing information";
    }

    
?>


