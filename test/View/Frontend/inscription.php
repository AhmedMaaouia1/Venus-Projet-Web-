
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
<link href="addcomment.css" rel="stylesheet" /> 
</head>
<body>
<div class="form_wrapper" >
   <div class="form_container"> 
    <div class="title_container">
      <h2>Création du compte</h2>
    </div>
    <div class="row">
    <div class="">
    
    <p>Si vous avez un compte,<a href="connexion.php" > connectez-vous.</a></p>

</div>

</div>
    <div class="row clearfix">
      <div class="">
        <form method="POST"  action="../../Controller/ajout_user.php">
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <?php      
        if(isset($_GET['error']))
    {
    ?>

      <h6 class="text-danger mt-1" style="font-weight: 80; font-size: 1.1em">Mail existant</h6>

    <?php 

    }

?>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="mdp" placeholder="mot de passe" required />
          </div>

          <?php      
        if(isset($_GET['error1']))
    {
    ?>
       
      <h6 class="text-danger mt-1" style="font-weight: 80; font-size: 1.1em">Format non correct, mot de passe doit contenir un chiffre, un caractére majuscule et un minuscule</h6>

    <?php 

    }

?>

          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="prenom" placeholder="Prénom" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="nom" placeholder="Nom" required />
              </div>
            </div>
          </div>
            	<div class="input_field radio_option">
              <input type="radio" name="sexe" id="homme" value="Homme">
              <label for="homme">Homme</label>
              <input type="radio" name="sexe" id="femme" value="Femme">
              <label for="femme">Femme</label>
              </div>
              <div class="input_field select_option" >
                <select name="region">
                  <option value="default">Choisir votre région</option>
                  <option value="Tunis">Tunis</option>
                  <option value="Sousse">Sousse</option>
                  <option value="Sfax">Sfax</option>
                  <option value="Bizerte">Bizerte</option>
                </select>
                <div class="select_arrow"></div>
              </div>
            <div class="input_field checkbox_option">
            	<input type="checkbox" name="news" value="1" id="news" >
    			<label for="news">Je veux reçevoir des newsletters</label>
            </div>
          <input class="button" type="submit" value="Créer mon compte" />
        </form>
      </div>
    </div>
  </div>
</div>

</body>

<?php require "Footer.php" ?>