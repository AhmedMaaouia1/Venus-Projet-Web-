<?php 
include '../../controller/userC.php';
$userC= new UserC(); 
$userC->debloqueruser($_GET["id_user"]); 
header('Location:listclient.php'); 
?>