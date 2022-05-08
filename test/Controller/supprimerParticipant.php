<?php
	include 'ParticipantC.php';
	$ParticipantC=new ParticipantC();
	$ParticipantC->supprimerparticipant($_GET["idparticipation"]);
	header('Location:../View/Backend/Liste_Participants.php');
?>