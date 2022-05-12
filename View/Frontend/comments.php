
<?php
                            require '../../Controller/commentsC.php';
                            require_once '../../View/connexiondb.php';
                            require_once '../../Model/topic.php';

                         
                            $id=$_GET["id"];
                          $CommentsC = new commentsC();
                            $Comments = $CommentsC->afficherTcomments($id);
                             require 'Header.php'; 
                        
     
    
   
   $connexionDB = connexionDB::getConnexion();
   $requete = "UPDATE Topic SET view_count=view_count+1 where idtopic=:id";
   
       $querry = $connexionDB->prepare($requete);
       $querry->execute(
           [
               'id'=>$id
           ]
       );
      
       
   

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
    <link href="commentstyle.css" rel="stylesheet" /> 
</head>


    <body>
<br>
<br>
<a href="ajoutercomment.php?id=<?php echo $id; ?>" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter un commentaire</a>
<br>
<br>
<a href="Forum.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Retour au Forum</a>
<br>
<br>
        <div>
            <div class="headings d-flex justify-content-between align-items-center mb-3">
                                <h1>Tout les commentaire</h1>
            </div>
            
            <?php 
                                $j=0;        
                                        foreach ($Comments as $Comments) {
                                $j++;
                                ?>
            <div class="card p-3">
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="action d-flex justify-content-between mt-2 align-items-center"> <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">User:</small> <small class="font-weight-bold"><?php echo $Comments['contenu'] ; ?></small></span> </div> 
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
                                        }
                                ?>
                          </body>       
</html>
<?php require 'Footer.php'; ?>