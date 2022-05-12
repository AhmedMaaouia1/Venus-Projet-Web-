<?php 
include '../../controller/commandeC.php';
$commandeC=new commandeC();
$commandeC->supprimercommande($_GET["id_commande"]); 
header('Location:liste_commandes.php'); 
?>