
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
<link href="inscription.css" rel="stylesheet" /> 
</head>
<body>
<div class="form_wrapper" >
   <div class="form_container"> 
    <div class="title_container">
      <h2>Réclamation</h2>
    </div>
    <div class="row">
    <div class="">
    
    <p>Nous sommes toujours à votre disposition.</p>

</div>

</div>
    
<div class="row clearfix">
  <div class="">
   <form method="POST"  action="../../Controller/ajout_reclamation.php">
     <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
       <input type="email" name="mail_reclamation" placeholder="Email" required />
     </div>
          
         
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="prenom_reclamation" placeholder="Prénom" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="nom_reclamation" placeholder="Nom" required />
              </div>
            </div>
          </div>
            	
          <div class="row clearfix">
            <div class="">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-pencil fa-fw"></i></span>
              <input type ="text" class="input-field" name="sujet_reclamation" placeholder="Description Sujet">
              </div>
            </div>

            <div class="row clearfix">
            <div class="">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-plus"></i></span>
              <textarea type ="text" class="input-field " style="width: 350px; padding-left: 30px" name="message_reclamation" placeholder="Votre Message"> 
</textarea>
              </div>
            </div>
</div>
</div>

           
            
          <input class="button" type="submit" value="Envoyer ma réclamation" />
        </form>
      </div>
    </div>
  </div>
</div>

</body>

<?php require "Footer.php" ?>