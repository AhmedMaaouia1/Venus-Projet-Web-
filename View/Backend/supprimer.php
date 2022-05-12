<?php 
require 'C:/xampp/htdocs/test/Controller/ReponseC.php';

$ReponseC= new ReponseC();
$ReponseC->supprimer($_GET['id']);
header('Location:liste_reponse.php'); ?>