<?php
    include_once '../Model/user.php';
    include_once 'userC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new UserC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
        isset($_POST["email"]) && 
        isset($_POST["mdp"]) &&
        isset($_POST["sexe"]) &&
        isset($_POST["region"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["mdp"]) &&
            !empty($_POST["sexe"]) &&
            !empty($_POST["region"])
        ) {
            
            $user = new User(
				$_POST['nom'],
                $_POST['prenom'], 
                $_POST['email'],
                $_POST['mdp'],
                $_POST['sexe'],
                $_POST['region'],
                $_POST['news']
            );
            $mail= $user->getEmail();
            $mdp=$user->getMdp();
            $test = $userC->verification($mail);
            $test1= $userC->check_mdp_format($mdp);
            
            if($test == false &&  $test1 == true)
            {
                $userC->ajouteruser($user);
                header('Location:../View/Frontend/connexion.php');
            }
            else if ($test1 == false)
            {
                $error1= "Format non correct, mot de passe doit contenir un chiffre, un caractére majuscule et un minuscule";
                header('Location:../View/Frontend/inscription.php?error1=error1');
            }
            else
            header('Location:../View/Frontend/inscription.php?error=error');
            
            
        }
        else
            $error = "Manque d'informations, Veuillez remplir tout les champs.";
            echo $error;
    }

    
?>