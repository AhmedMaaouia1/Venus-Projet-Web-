<?php require 'Header.php';
  require_once '../../Controller/categorieC.php';

  $categorieC =  new categorieC();

  $categories = $categorieC->affichercategorie();
  if (isset($_GET['id'])){
	$id = $_GET['id'];}
	else {$id = 'id';}
  echo $id;



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

  
<title>New Fashions a Flat Ecommerce Bootstarp Responsive Website Template </title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/style_p.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
		/>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
</head>
<body>

<div class="owl-carousel owl-single px-0">
   

   

   </div>
   <nav class="navbar navbar-light bg-light">
   <?php
					 foreach ($categories as $categorie) {
				 ?>
		 
		  <a class="navbar-brand" href="AccessoiresView.php?id=<?php echo $categorie['id'];?>">
	 <?php echo $categorie['Nom'];?>
   </a>
 
 
		 
					 
				 <?php 
					 }
				 ?> 
   </nav>
   <div class="site-section py-5">
	 <div class="container">
	   <div class="row">
	  
		 <?php
						 $servername = "localhost";
						 $username = "root";
						 $password = "";
						 $dbname = "venus";
				   
						 // Create connection
						 $conn = new mysqli($servername, $username, $password, $dbname);
						 // Check connection
						 if ($conn->connect_error) {
						 die("Connection failed: " . $conn->connect_error);
						 }
 
						 $sql = "SELECT * FROM produit where idcat='{$id}'";
								
						 $result = $conn->query($sql);
						 if ($result->num_rows > 0) {
						 // output data of each row
						  while($row = $result->fetch_assoc()) {
							$nom= $row["Nom"];
							$prix= $row["prix"];
							$image=$row["image"];
						 echo '<div class="card" style="width: 18rem;">
						 <img class="card-img-top"  src="images/'.$image.'" alt="Card image cap">                       
						 <ul class="list-group list-group-flush">
						 <li class="list-group-item">'.$nom.'</li>
						 <li class="list-group-item">'.$prix.' dt</li>
						 <button type ="submit"  style="background: #eed6f2; color: #1f1b1f;padding: 5px; border-radius:8px;display: block;border: 0px;width: 100%;"  name="addtocart" class="add-to-cart text-center py-2 mr-1"><span>Ajouter au panier<i class="fa fa-cart-plus" aria-hidden="true"></i></span></button>

					   </ul>
						 </div> ';
						 
						
							
						 }
						 } else {
						 echo "Aucun produit dispo ";
						 }
						 $conn->close();
						 ?> 
			 
		  
		 
		 <div class="col-lg-4">
		   <div class="feature">
			
		   </div>
		 </div>
	   </div>
	 </div>
   </div>
 
 
   </div>
   
 
 
   
  


</body>




<?php require "Footer.php" ?>