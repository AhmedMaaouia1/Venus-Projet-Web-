<?php
    include_once '../Model/participant.php';
    include_once 'ParticipantC.php';

    $error = "";

    // create Participant
    $participant = null;

    // create an instance of the controller
    $ParticipantC = new ParticipantC();
    if (
		isset($_POST["id_user"]) &&		
        isset($_POST["id_event"]) 
        
        
    ) {
        if (
			!empty($_POST['id_user']) &&
            !empty($_POST["id_event"]) 
            
            
        ) {
            
            $participant = new Participant(
				$_POST['id_user'],
                $_POST['id_event'] 
                
            );
             $ParticipantC-> ajouterParticipant($participant);
             header('Location:../View/Frontend/participer.php');
        }
        else
            $error = "error 404";
            echo $error;
    }

    
?>