<?php 
require '../../Controller/ReclamationC.php';

$ReclamationC= new ReclamationC();
$ReclamationC->supprimerrec($_GET['id']);
header('Location:liste_reclamations.php'); ?>