<?php
session_start();
    include_once 'commandeC.php';
    $error = "";

    // create Participant
    $commande = null;

    // create an instance of the controller
    $commandeC = new commandeC();
    echo $_SESSION['id_user'];
    echo "--id_event:-";
    echo $_SESSION['id_produit'];
    
        $commande = new commande(
            $_SESSION['id_produit'],
            $_SESSION['id_user']
            
        );
        $test = false;
        if($test == false)
        {
            $commandeC->ajoutercommande($commande);
            header("location:../View/Frontend/acceuil.php");
        }  
        else
        header("location:../View/Frontend/participer.php?error1=error1");
        
        
            
?>