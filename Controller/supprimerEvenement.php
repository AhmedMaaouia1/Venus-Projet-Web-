<?php
	include 'EvenementC.php';
	$EvenementC=new EvenementC();
	$EvenementC->supprimerEvenement($_GET["id_event"]);
	header('Location:../View/Backend/liste_evenements.php');
?>