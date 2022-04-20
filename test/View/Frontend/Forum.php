<?php require 'Header.php'; ?>
<?php
                            require 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/topicC.php';

                        
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
    <!--<link rel="stylesheet"  href="event.css">-->
    <!-- CSS here -->
        <link rel="stylesheet" href="assets1/css/style.css">
</head>

    





  


</head>



    <body>
    
      <!--? Hero Area Start-->
      <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Forum</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
<?php
    require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/View/connexiondb.php';
$connexiondb=connexiondb::getConnexion();

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $connexiondb->prepare("SELECT * FROM `topic` WHERE titre = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($Topic = $sth->fetch())
	{
		?>
		
        <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="assets1/img/blog/single_blog_2.png" alt="">
                                    
                                    <a href="#" class="blog_item_date">
                                        <h3>15</h3>
                                        <p>Jan</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="regle.php">
                                        <h2><?php echo $Topic->titre; ?></h2>
                                        <h4><?php echo $Topic->descrip; ?></h4>
                                    </a>
                                    <p><?php echo $Topic->contenu; ?></p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="comments.php?id=<?= $Topic['idtopic']; ?>"><i class="fa fa-comments"></i>  Comments</a></li>
                                    </ul>
                                </div>
                            </article>
        
       
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
        }
    }
    ?>
    
   
    <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="assets1/img/blog/single_blog_2.png" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>15</h3>
                                        <p>Jan</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="regle.php">
                                        <h2>Forum Règles:</h2>
                                    </a>
                                    <p>CI, vous trouvez les Règles du forum que vous devez lire avant de mettre un commentaire.</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
                                    </ul>
                                </div>
                            </article>
    
          
            
 <?php                 
                
                    $i=0;
                        foreach ($Topics as $Topic) {
                         $i++;  
            
                ?>
              
              <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="assets1/img/blog/single_blog_2.png" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>15</h3>
                                        <p>Jan</p>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="regle.php">
                                        <h2><a <?= $Topic['idtopic']; ?>>Topic <?php echo $i; ?>: <?= $Topic['titre']; ?></a></h2>
                                        <h4><?= $Topic['descrip']; ?></h4>
                                    </a>
                                    <p><?= $Topic['contenu']; ?></p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="comments.php?id=<?= $Topic['idtopic']; ?>"><i class="fa fa-comments"></i>  Comments</a></li>
                                    </ul>
                                </div>
                            </article>
             

           
            
                <?php
                        }
                    
                ?>
       
    
               
            </div>


      

   

 




</body>

</html>
<?php require 'Footer.php'; ?>