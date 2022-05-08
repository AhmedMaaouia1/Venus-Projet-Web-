<?php
session_start();
    include_once 'ParticipantC.php';
    $error = "";

    // create Participant
    $participant = null;

    // create an instance of the controller
    $ParticipantC = new ParticipantC();
    echo $_SESSION['id_user'];
    echo "--id_event:-";
    echo $_SESSION['id_event'];
    
        $participant = new Participant(
            $_SESSION['id_event'],
            $_SESSION['id_user']
            
        );
        $test = $ParticipantC->recupererParticipant($participant->getIduser()); 
        if($test == false)
        {
            $ParticipantC->ajouterParticipant($participant);
            header("location:../View/Frontend/participer.php");
        }  
        else
        header("location:../View/Frontend/participer.php?error1=error1");
        
        
            
?>