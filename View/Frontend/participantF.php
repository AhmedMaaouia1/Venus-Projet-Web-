<?php require 'Header.php' ?>

<?php

	include '../../Controller/ParticipantC.php';
	$ParticipantC=new ParticipantC();
	
?>
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
    <!--<link rel="stylesheet"  href="event.css">-->
<link href="inscription.css" rel="stylesheet" /> 
</head>
<body>


 <div class="text-center">
 <div class="form_wrapper" >
   <div class="form_container"> 
    <div class="title_container">
      <h2>Ajouter Participant</h2>
    </div>
  
    
    <div class="row">
    

 </div>

 </div>
    <div class="row clearfix">
        <form method="POST"  action="../../Controller/ajouterParticipant.php">
          <div class="input_field"> <span><i aria-hidden="true"></i></span>
            <input type="email" name="email" placeholder="email" required />
          </div>

          <?php      
        if(isset($_GET['error']))
                     { 
                         ?>

 <h6 class="text-danger mt-1" style="font-weight: 80; font-size: 1.1em">Il ne faut pas mettre un mail existant</h6>

 <?php 
    }
 ?>
 <div class="input_field"> <span><i aria-hidden="true"></i></span>
            <input type="text" name="nomParticipant" placeholder="nomParticipant" required />
          </div> 

              <div class="input_field"> <span><i aria-hidden="true" ></i></span>
              <input type ="text" name="prenomParticipant"   placeholder="prenomParticipant" required> 
              </div>
            </div>
            
          <input class="bouton" type="submit" style="background-color:#fd6c9e;color:white" value="ajOuter un participant" />
          <div class="col_half">
          <div class="input_field"> <span><i aria-hidden="true" ></i></span>
                <input type="hidden" name="id_user"  placeholder="nom événement" required value="<?php echo $participant['id_user']; ?>" />
              </div>
              <div class="input_field"> <span><i aria-hidden="true" ></i></span>
                <input type="hidden" name="id_event"  placeholder="nom événement" required value="<?php echo $participant['id_event']; ?>" />
              </div>
            </div>
		  
        </form>
  
  </div>
 </div>

</div>


</body>
<?php require "Footer.php" ?>