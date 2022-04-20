<?php require 'Header.php'; ?>
<?php
                            require 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/commentsC.php';
                           

                           
                            $id=$_GET["id"];
                          $CommentsC = new commentsC();
                            $Comments = $CommentsC->afficherTcomments($id);
                        ?>

<html lang="en">
    
    
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>



    <body>

<br><br><br><br><br><br><br><br><br>
<h1 class="heading"> <a href="ajoutercomment.php?id=<?php echo $id; ?>">Ajouter comment </a></h1>

<div class="posts-table">
            <div class="table-head">
                <div class="status">Status</div>
                <div class="subjects">Subjects</div>

            </div> <?php 
                                $j=0;        
                                        foreach ($Comments as $Comments) {
                                $j++;
                                ?>
            <div class="table-row">
                <div class="status"><i class="fas fa-comment-alt"></i></div>
                <div class="subjects">
               
                            <?php echo $Comments['contenu'] ; ?>
                          
                </div>

            </div>
            <?php
                                        }
                                ?>
            
        </div>





  
        <br><br><br><br><br><br><br><br>       
</body>
<?php require 'Footer.php'; ?>
</html>