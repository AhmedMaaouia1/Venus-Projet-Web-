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
      <h2>Connexion..</h2>
    </div>
    <div class="row clearfix">
    <div class="row">
    <div class="">
    <p > Accéder à votre compte personnel et vérifiez vos dernières commandes, votre messagerie et conservez vos données personnelles.</p>
    <p>Si vous n'avez pas de compte,<a href="inscription.php" > créez-en un.</a></p>

</div>

</div>
      <div class="">
        <form method="POST"  action="test/Controller/ajouter_client.php">
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="mdp" placeholder="mot de passe" required />
          </div>
          
          </div>
            	
          <input class="button" type="submit" value="Créer mon compte" />
        </form>
      </div>
    </div>
  </div>
</div>

</body>



<?php require "Footer.php" ?>