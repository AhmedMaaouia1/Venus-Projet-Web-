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
        isset($_POST["mdp_user"]) 
    ) {
        if (
            !empty($_POST["email"]) && 
            !empty($_POST["mdp_user"]) 
        ) {
            
            
            $mail= $_POST["email"];
            $mdp= $_POST["mdp_user"];
            
            $test = $userC->connexion($mail, $mdp);
            $user = $test;

            if($user['Bloquer_user'] == "1"){
                header('Location:../View/Frontend/connexion.php?error2=error2');
            }
            else if(($mail == "admin.admin@esprit.tn") && ($mdp == "Venus2022"))
            {
                header('Location:../View/Backend/listclient.php');
            }
            else if($test)
            {
                $_SESSION['email']=$mail;
                $_SESSION['mdp']=$mdp;
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