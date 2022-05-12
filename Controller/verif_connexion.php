<?php
session_start();

    include_once '../Model/user.php';
    include_once 'userC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new UserC();
    if (
		
        isset($_POST["email"]) && 
        isset($_POST["mdp"]) 
    ) {
        if (
            !empty($_POST["email"]) && 
            !empty($_POST["mdp"]) 
        ) {
            
            
            $mail= $_POST["email"];
            $mdp= $_POST["mdp"];
            $test = $userC->connexion($mail, $mdp);
            
            
            if($test == true)
            {
                header('Location:../View/Frontend/profil.php');
            }
            else
            header('Location:../View/Frontend/connexion.php?error=error');
            
            
        }
        else
            $error = "Manque d'informations, Veuillez remplir tout les champs.";
            echo $error;
    }

    
?>