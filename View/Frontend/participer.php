<?php require 'Header.php' ?>
<?php
	include '../../Controller/EvenementC.php';
	
	$EvenementC=new EvenementC();
	
	$listeevent=$EvenementC->afficherEvenements(); 
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

  </head>
  <body>
<section id="services" class="services section-padding">
      <div class="container">
    
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">NOS ÉVÉNEMENT</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">Grand événement mondial sur mode et beauté</p>
            </div>
          </div>
        </div>
        <div class="row services-wrapper">
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
              
              <div class="services-content">
                 <?php
                 foreach($listeevent as $evenement){
			          ?>
              <div class="row">
                 
                    <div class="about-item">
                       <img class="img-fluid" src="assets/img/about/img1.jpg" alt="">
                       <div class="about-text">
                         <h3><?php echo $evenement['nom_event']; ?></h3>
                         <p><?php echo $evenement['dis_event']; ?></p> 
                        </div>
                     </div>

                         <?php
                $date1 =$evenement['date_event'];
                $date2 = "2022-05-05";
                $dateTimestamp1 = strtotime($date1);
                 $dateTimestamp2 = strtotime($date2);
if ($dateTimestamp1 > $dateTimestamp2)
{
  ?>
  <div class="about-text">
  <a class="btn btn-common btn-rm" href="../../Controller/ajouterParticipant.php?event=<?php echo $evenement['id_event'] ;?>">Paticiper</a>
  </div>

  <?php
  } 
   else{
  ?>
  

</div>
<?php
}
?>
                      
                
        </div>
      </div>
      <?php
				}
			?>
	            </div>
            </div>
          </div>
        
          
        </div>
      </div>
    </section>

</body>
</html>
<?php require "Footer.php" ?>


