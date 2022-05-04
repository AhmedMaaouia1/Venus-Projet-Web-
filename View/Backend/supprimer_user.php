<?php 
include '../../controller/userC.php';
$userC= new UserC(); 
$userC->supprimeruser($_GET["id_user"]); 
header('Location:listclient.php'); 
?>