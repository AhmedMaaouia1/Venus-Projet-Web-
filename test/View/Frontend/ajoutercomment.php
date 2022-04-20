
<?php require 'Header.php'; ?>
<?php

require_once     'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/commentsC.php';
require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Model/comments.php' ;
require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/TopicC.php';
$a=$_GET['id'];

if (isset($_POST['contenu'] )) 
{   
        
         $Comments = new comments(NULL,$a, $_POST['contenu']);
        $CommentsC = new commentsC();
        $CommentsC->ajoutercomments($Comments);
        header('Location:Forum.php');
}


?>



<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
      <h2>commentaire</h2>
    </div>
    <div class="row">
    <div class="">
    
   

</div>

</div>
    
<div class="row clearfix">
  <div class="">
   <form id="form" action="" method="POST" onsubmit="return verif();">
    
         
   <div class="wrap-input3 validate-input" >
						<input class="input3" id="contenu" type="text" name="contenu" placeholder="contenu">
						<span class="focus-input3"></span>
					</div>
					<div class="container-contact3-form-btn">
                    <input   class="contact3-form-btn" type="submit" value="ajouter " >
					</div>
                    

        </form>
      </div>
    </div>
  </div>
</div>


</body>

</html>
