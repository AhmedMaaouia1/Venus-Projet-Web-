<?php 

session_start();
include_once "manage_cart.php";
include_once '../../Controller/userC.php';

include_once '../../Controller/produitC.php';
include_once '../../Model/commande.php';
include_once '../../controller/commandeC.php';
include_once '../../Controller/commandeC.php';
    $error = "";

    // create Participant
    $commande = null;

    // create an instance of the controller
    $commandeC = new commandeC();
    echo "--id_user:-";
    echo $_SESSION['id_user'];
    

    
        
//var_dump($_SESSION['cart'][1]['Item_id']);

$count = count($_SESSION['cart']);
//var_dump($count);
for ($i=0; $i<$count;$i++){
$Quantite = new produitC ();
$test = $Quantite -> QuantityProd((int)$_SESSION['cart'][$i]['Item_id'],$_SESSION['cart'][$i]['Quantity']);
$commande = new commande(
    (int)$_SESSION['cart'][$i]['Item_id'],
    $_SESSION['id_user']
    
);

if (test){
    $commandeC->ajoutercommande($commande);
    header("location:acceuil.php");
}else {

    echo "erreur";
}



}





?>