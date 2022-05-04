<?php 
include '../../controller/userC.php';
$userC= new UserC(); 
$userC->bloqueruser($_GET["id_user"]); 
header('Location:listclient.php'); 
?>