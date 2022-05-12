<?php 

require 'Header.php';
  require 'C:/xampp/htdocs/test/Controller/produitC.php';
  $produitC =  new produitC();

  $produits = $produitC->afficherproduit();
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

  </head>
  
  <section id="services" class="services section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Pourquoi nous choisissez-vous?</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">Grand événement mondial sur mode et beauté</p>
            </div>
          </div>
        </div>

        <div class="site-section bg-light">
    



        <div class="row services-wrapper">
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
              <div class="icon">
                <i class="lni-heart"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Être inspiré</a></h3>
               
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
              <div class="icon">
                <i class="lni-gallery"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Rencontrez de nouveaux visages</a></h3>
              
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
              <div class="icon">
                <i class="lni-envelope"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Fresh Tech Insights</a></h3>
                
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
              <div class="icon">
                <i class="lni-cup"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">session de Networking </a></h3>
                
              </div>
            </div>
          </div>
           <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="1s">
              <div class="icon">
                <i class="lni-user"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Événement international</a></h3>
                
              </div>
            </div>
          </div>
           <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
              <div class="icon">
                <i class="lni-bubble"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Cadeaux gratuits</a></h3>
                
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2> <strong class="text" style="background-color:#fd6c9e;color:white">Products</strong></h2>
        </div>
      </div>
      <div class="row">
       
         
            
          <?php
					foreach ($produits as $produit) {
           
				?> 
        <div class="col-md-4 block-3 products-wrap">
				<div class="text-center item mb-4 item-v2" style="background: #eaeaea;border-radius: 10px;">
             
               <img src="images/<?php echo $produit['image'];?>" alt="Image">
              <h3 class="text"><a href="cart.php" style="font-size:17px;"><?php echo $produit['Nom'];?></a></h3>
              <p class="price" ><?php echo $produit['prix'];?></p>
              <form action="manage_cart.php" method="POST">
              <input type="hidden" name="Item_Name" value='<?php echo $produit['Nom'] ?>'>
							<input type="hidden" name="Item_id" value='<?php echo $produit['id'] ?>'>
              <input type="hidden" name="price" value="<?php echo $produit['prix'] ?>">
              <button type ="submit"  style="background: #eed6f2; color: #1f1b1f;padding: 5px; border-radius:8px;display: block;border: 0px;width: 100%;"  name="addtocart" class="add-to-cart text-center py-2 mr-1"><span>Ajouter au panier<i class="fa fa-cart-plus" aria-hidden="true"></i></span></button>
          </form>
            </div>
          </div>				
				<?php 
					}
				?>  
            
      </div>
    </div>



    
    </div>
  
    </section>

        <script src="assets/js/jquery-min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/nivo-lightbox.js"></script>
    <script src="assets/js/main.js"></script>
        <?php require "Footer.php" ?>