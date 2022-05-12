<?php require 'Header.php' ?>


<?php
                            require '../../Controller/topicC.php';

                        
                            $TopicC = new topicC();
                            $Topics = $TopicC->affichertopic();
                        ?>

  
<html lang="en">
    
<head>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
   
    <!--forum style-->
    <link rel="stylesheet" type ="text/css" href="css/Stykeforum.css">
   
  </head>
<br>
<a href="Forum.php" class="btn btn" style="background-color:#fd6c9e;color:white" >retourner </a>
<br>
    <body>
    

  
  

<br>
        <div >
                    <div class="card-header">
                   <h3 style="color:#FF0000;">1- Conduite:  </h3>
                </div>
                
                <h4> Il est formellement interdit d'envoyer des messages, des informations ou des liens diffamatoires, obscènes, injurieux ou menaçants.</h4>
            <br><br>
               
            <div class="card-header">
            <h3 style="color:#FF0000;">2- Responsabilité::  </h3>
                </div>
                
                <h4> Les participants sont exclusivement et juridiquement responsables des informations qu'ils envoient à un forum. 
                    Ils peuvent uniquement envoyer des informations qu'ils ont été autorisés à distribuer par voie électronique. 
                    Les participants s'engagent à dégager les organisateurs des forums en ligne du forum VENUS de toute responsabilité quant aux informations qu'ils ont envoyées à un forum.</h4>
            <br><br>
            <div class="card-header">
            <h3 style="color:#FF0000;">3- Exactitude:  </h3>
                </div>
                
                <h4> En tant qu'organisateur d'un forum en ligne, VENUS ne peut garantir l'exactitude de toutes les déclarations faites par des 
                    participants non Membres du VENUS à ce forum.</h4>
            <br><br>
            <div class="card-header">
            <h3 style="color:#FF0000;">4- Citations:  </h3>
                </div>
                
                <h4> Les forums en ligne du VENUS permettent aux participants d'échanger librement leurs points de vue, chacun intervenant à titre personnel.
                     C'est pourquoi les participants à un forum ne devraient citer les propos d'autres participants qu'en précisant bien qu'il s'agit de leur opinion personnelle.</h4>
            <br><br>
            <div class="card-header">
            <h3 style="color:#FF0000;">5- Droit d'auteur et utilisation équitable:  </h3>
                </div>
                
                <h4>Tous les participants à un forum en ligne du VENUS détiennent un droit d'auteur sur les informations ou les liens vers des informations qu'ils envoient à ce forum.
                     Toutefois, ils autorisent les autres participants au forum à utiliser ces informations à des fins personnelles ou courantes, y compris pour les renvoyer vers d'autres sites Internet ou créer des liens;
                      toute autre forme de reproduction ou de diffusion de ces informations requiert une autorisation. Les informations du VENUS téléchargées à partir d'un forum ne peuvent être utilisées en dehors de ce forum que si VENUS a donné son autorisation et qu'il est indiqué qu'elle est la source de ces informations.</h4>
            <br><br><br><br>
            <div class="card-header">
                   <h4>VENUS se réserve le droit de refuser ou de supprimer tout message qui constitue, selon elle, une violation des règles ci-dessus. En outre, s'il est établi qu'un participant a enfreint ces règles, il peut se voir à l'avenir refuser l'accès aux forums.</h4>
                </div>
                <br>
                <div class="card-header">
                   <h4>VENUS se réserve le droit d'archiver toutes les observations faites durant un forum dans un dossier permanent sur le forum qui sera accessible en ligne pendant la période qu'elle jugera appropriée.  </h4>
                </div>
                <br>
                <div class="card-header">
                   <h4>VENUS ne divulguera aucun renseignement personnel communiqué par les participants à un forum en ligne à d'autres participants, hormis aux autres organisations qui co-organisent ledit forum. </h4>
                </div>
            

    </div>

   


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="../assets/vendors/@popperjs/popper.min.js"></script>
<script src="../assets/vendors/bootstrap/bootstrap.min.js"></script>
<script src="../assets/vendors/is/is.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="../assets/vendors/fontawesome/all.min.js"></script>
<script src="../assets/assets/js/theme.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
</body>
<?php require "Footer.php" ?>
</html>
