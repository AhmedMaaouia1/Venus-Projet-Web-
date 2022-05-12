<?php 
include 'C:/xampp/htdocs/1/test/controller/userC.php';
$userC= new UserC(); 
$userC->debloqueruser($_GET["id_user"]); 
header('Location:listclient.php'); 
?>