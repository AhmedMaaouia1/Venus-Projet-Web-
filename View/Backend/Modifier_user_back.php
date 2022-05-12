<?php
include_once '../../Model/user.php';
include '../../Controller/userC.php';

$error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new UserC();
    if (
		isset($_POST["nomm"]) &&		
        isset($_POST["prenomm"]) &&
        isset($_POST["emailm"]) && 
        isset($_POST["mdpm"]) &&
        isset($_POST["sexem"]) &&
        isset($_POST["regionm"])
    ) {
        if (
			!empty($_POST['nomm']) &&
            !empty($_POST["prenomm"]) && 
            !empty($_POST["emailm"]) && 
            !empty($_POST["mdpm"]) &&
            !empty($_POST["sexem"]) &&
            !empty($_POST["regionm"])
        ) {
            
            $user = new User(
				$_POST['nomm'],
                $_POST['prenomm'], 
                $_POST['emailm'],
                $_POST['mdpm'],
                $_POST['sexem'],
                $_POST['regionm'],
                $_POST['newsm']
            );
            /*$mail= $user->getEmail();
            $mdp=$user->getMdp();
            $test = $userC->verification($mail);
            $test1= $userC->check_mdp_format($mdp);
            
            if($test == false &&  $test1 == true)
            {*/
                $userC->modifieruser($user, $_POST["id_user"]);
                header('Location:listclient.php');
            /*}
            else if ($test1 == false)
            {
                $error1= "Format non correct, mot de passe doit contenir un chiffre, un caractére majuscule et un minuscule";
                header('Location:listclient.php?error1=error1');
            }
            else
            header('Location:listclient.php?error=error');
            */
            
        }
        else
            $error = "Manque d'informations, Veuillez remplir tout les champs.";
            echo $error;
    }
?>

