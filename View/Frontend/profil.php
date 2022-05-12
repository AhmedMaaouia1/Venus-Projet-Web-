<?php session_start(); ?>
<?php require 'Header.php' ?>

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
<div class="form_wrapper" >
   <div class="form_container"> 
    <div class="title_container">
      <h2>Votre Profil..</h2>
      
    </div>
    <div class="row clearfix">
    <div class="row">
    <div class="">

</div>

</div>
      <div class="">
          <?php 
          if (isset($_SESSION['Email_user']) && (isset($_SESSION['Mdp_user']) ))
          {
            ?>
            <p class="text-center text-capitalize"> id : <?php echo $_SESSION['id_user']?> </p>
            <p>Nom : <?php echo $_SESSION['Nom_user']?></p>
            <p>Prenom : <?php echo $_SESSION['Prenom_user']?></p>
            <p>Adresse mail : <?php echo $_SESSION['Email_user']?></p>
            <p>Sexe : <?php echo $_SESSION['Sexe_user']?></p>
            <p>Region : <?php echo $_SESSION['Region_user']?></p>
            <?php
          }
          else
          {
              ?>
              <p>session introuvable</p>
              <?php
          }
          ?>
        
      </div>
    </div>
  </div>
</div>

</body>



<?php require "Footer.php" ?>