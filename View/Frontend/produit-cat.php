

<?php require_once 'header_main.php'; 
  require_once '../../Controller/categorieC.php';

  $categorieC =  new categorieC();

$categories = $categorieC->affichercategorie();


if (isset($_GET['id'])){
    $id = $_GET['id'];}
    else {$id = 'id';}
  echo $id;

?>

<!-- header -->
<?php require_once 'header.php'; ?>


<!-- //header -->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Virupedia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link rel="shortcut icon" type="image/x-icon" href="images/logo.png"> logo change error-->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>




  <div class="owl-carousel owl-single px-0">
   

   

  </div>



  <div class="site-section py-5">
    <div class="container">
      <div class="row">
      <?php
					foreach ($categories as $categorie) {
				?>
				<div class="col-lg-4">
          <div class="feature">
             
              <a href="shop-single.html"> <img src="images/<?php echo $categorie['image'];?>" width="200" height="200" alt="Image"></a>
              <h3 class="text-dark"><a href="produit-cat.php?id=<?php echo $categorie['id'];?>"><?php echo $categorie['nom'];?></a></h3>          
              </div>
        </div>				
				<?php 
					}
				?>  
        
            
        <?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "projet2a7";
                     
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
						}

						$sql = "SELECT produit.* FROM produit inner join categorie_items on produit.id=categorie_items.id_prod where categorie_items.id_cat='{$id}'";
						       
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						 while($row = $result->fetch_assoc()) {
						   $nom= $row["Nom"];
						   $prix= $row["prix"];
						   $image=$row["image"];
						
                        echo '<div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="images/'.$image.'" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">'.$nom.'</p>
                            <p class="card-text">'.$prix.' dt</p>
                        </div>
                        </div> ';
                       
						   
						}
						} else {
						echo "Aucun produit dispo ";
						}
						$conn->close();
						?> 
          </div>
        </div>
      </div>
    </div>
  </div>


  </div>
  
  <div class="site-section bg-image overlay" >
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-7">
          <h3 class="text-white">Sign up for discount up to 25% OFF</h3>
          <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam.</p>
          <p class="mb-0"><a href="#" class="btn btn-outline-white">Sign up</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

      <div class="row justify-content-between">
        <div class="col-lg-6">
          <div class="title-section">
            <h2>Happy <strong class="text-primary">Customers</strong></h2>
          </div>
          <div class="block-3 products-wrap">
            <div class="owl-single no-direction owl-carousel">

              <div class="testimony">
                <blockquote>
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
                </blockquote>

                <p class="author">&mdash; Kelly Holmes</p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>

                <p class="author">&mdash; Rebecca Morando</p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>

                <p class="author">&mdash; Lucas Gallone</p>
              </div>

              <div class="testimony">
                <blockquote>
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>

                <p class="author">&mdash; Andrew Neel</p>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="title-section">
            <h2 class="mb-5">Why <strong class="text-primary">Us</strong></h2>
            <div class="step-number d-flex mb-4">
              <span>1</span>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore</p>
            </div>

            <div class="step-number d-flex mb-4">
              <span>2</span>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore</p>
            </div>

            <div class="step-number d-flex mb-4">
              <span>3</span>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'footer.php';
  ?>
 



  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

</html>