<?php 



require 'Header.php';  

include_once "manage_cart.php";
include_once '../../Controller/userC.php';
include_once '../../Controller/produitC.php';

include_once '../../Controller/commandeC.php';
include_once '../../Model/commande.php';
$_SESSION['id']=16;

	if (isset($_SESSION['id']) && ! empty($_SESSION['id']) )
	{
		$user = new userC();
		$u= $user->recupereruser($_SESSION['id_user']);
		$user=$u['id_user'];
	$prenom=$u['Prenom_user'];
	$nom=$u['Nom_user'];
	$email=$u['Email_user'];
	$numero=$u['Region_user'];
$message="Finir votre Commande";

	}
	else{
	$user="";
	$prenom="";
	$nom="";
	$email="";
	$numero="";
	$message="Erreur de Session<br />";
	
     }



?>
<head>
<title>New Fashions a Flat Ecommerce Bootstarp Responsive Website Template | Cart :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_p.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
		/>
<script src="js/jquery.min.js"></script>
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
</head>
<body>

<div class="cart">
	 <div class="container">
			
		 
			
		 <section class="ftco-section ftco-cart" style="background: #FFF;padding: 13px;border-radius: 10px;">
			<div class="container">
				<div class="row">
    			<div class="col-md-8 ftco-animate">
    				<div class="cart-list  table-responsive">
	    				<table class="table table-striped" style="width:100%!important;min-width: 100%!important;">
						    <thead class="thead-primary">
						      <tr class="text-center">
						       
								<th scope="col">N°</th>
						        <th  scope="col">Produit</th>
						        <th  scope="col">Prix</th>
						        <th  scope="col">Qté</th>
						        <th  scope="col">Montant</th>
								<th  scope="col">Action</th>
								<tr>
                   
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
						     
						        
						        
						        
						             
								<?php
                        $total=0;
						$produit="";
						$idP="";

                        if(isset($_SESSION['cart']))
                        {
                        foreach($_SESSION['cart']as $key => $value)
                        {
                            $sr=$key+1;
                            $prod = $value['Item_Name']. " * $value[Quantity] ";
							$produit=$produit."+ ".$prod;
							$idP=$idP.$value['Item_id'];
							

							$total=$total+($value['Price']*$value['Quantity']);
							$maxQuantite = new produitC();
							$max = $maxQuantite -> QuantityProdMax((int)$value['Item_id']);
                            echo"
                            <tr>
							
                            <td>".$sr."</td>
                            <td>".$value['Item_Name']."</td>
                            <td>".$value['Price']."<input type='hidden' class='iprice' value='".$value['Price']."' </td>
                            <td>
							 <form action='manage_cart.php' method='POST'>
							  <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='".$value['Quantity']."' min='1' max='".$max."'>
							  <input type='hidden' name='Item_Name' value='".$value['Item_Name']."'>
							  </form>
							  </td>
                            <td class='itotal'></td>
							<td>
                            <form action='manage_cart.php' method='POST'>
                            <button name='Remove_Item' class='btn btn-default add-to-cart'>
                            Supprimer</button>
                            <input type='hidden' name='Item_Name' value='".$value['Item_Name']."'>
                            </form>
                            </td>
							
                            ";   

                        }
						
                    }
                        ?>
						
						</tr>

						    </tbody>
							
						  </table>
					  </div>
					  
								 
    			</div>
    			<div class="col-md-4 ftco-animate">
    				
    				<?php
    				$paypal='';
					$disabled='';
  if (
	isset($_POST["prenom"]) &&
	isset($_POST["nom"]) && 
	isset($_POST["adresse"]) &&
	isset($_POST["tel"]) &&
		isset($_POST["email"]) 
   ) 
	
 {
	if (
		!empty($_POST["prenom"]) &&  
		!empty($_POST["nom"]) && 
		!empty($_POST["adresse"]) &&  
		!empty($_POST["tel"]) && 
			  !empty($_POST["email"])
		
	)  {
		$commande = new commande(
			$_POST['prenom'],
			$_POST['nom'],
			$_POST['tel'],
			$_POST['adresse'], 
			$_POST['email'],
			$_POST['produit'],
			$_POST['total'],
		   
			
			
		);
		$commandeC = new commandeC();
		$commandeC->ajoutercommande($commande);
		$paypal = '<form class="form-horizontal" target="_blank" method="POST" action="https://www.sandbox.PayPal.com/cgi-bin/webscr ">
<input type="hidden" name="business" value="sb-7j4hl606677@personal.example.com">
                       <input type="hidden" name="item_name" value="Commande">
                       <input type="hidden" name="amount" value="'.$_POST['total'].'">
                       <input type="hidden" name="no_shipping" value="1">
                       <input type="hidden" name="currency_code" value="EUR">
                       
                       <input type="hidden" name="cmd" value="_xclick">
                       <button id="submit" name="pay_now" class="btn btn-danger" style="width: 100%;background: #3e61e3;color: #FFF!important;font-weight: 900;">Pay With PayPal</button>
		</form>';
		$message = 'Merci pour la commande merci de faire le paiement avec PAYPAL<br />';
		$disabled ='style="display:none"';
	}
	else
		$paypal = '';
		$error = "Missing information";
}


?>

	<h3 class="mb-4 billing-heading">Commandes Sans Facture</h3>
	          	
					  <form action="test.php" method="POST" class="billing-form">
<div class="row align-items-end">
	          		<div class="col-md-10">
	                <div class="form-group">
	                	<label for="firstname">Nom</label>
	                  <input id="prenom" required style="text-align: left; width:100%;" name="prenom" type="text" class="form-control" value="<?php echo $nom;?>">
	                </div>
	              </div>
	              <div class="col-md-10">
	                <div class="form-group">
	                	<label for="lastname">Prenom</label>
	                  <input id="nom"  required name="nom" style="text-align: left;width:100%;" type="text" class="form-control" value="<?php echo $prenom;?>">
	                </div>
                </div>
                <div class="col-md-10">
	                <div class="form-group">
	                	<label for="Regionname">Region</label>
	                  <input id="nom"  required name="nom" style="text-align: left;width:100%;" type="text" class="form-control" value="<?php echo $numero;?>">
	                </div>
                </div>
	              <div class="col-md-10">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input  required  id="email" name="email" type="email" class="form-control"value="<?php echo $email;?>"  style="text-align: left;width:100%;">
	                </div>
                </div>
				<div class="col-md-6">
	                <div class="form-group">
	                  <input  required  id="produit" name="produit" type="hidden" class="form-control" value="<?php echo $produit; ?>">
	                </div>
                </div>
				<div class="col-md-6">
	                <div class="form-group">
	                  <input  required  id="total" name="total" type="hidden" class="form-control" value="<?php echo $total; ?>">
	                </div>
                </div>

	            </div>
	        <!-- END -->
	        
	
	          	<div class="col-md">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			
									<div class="form-group" style="width:100%;">
									<h3 class="billing-heading mb-4"  style="text-align:center;">Total en Dinar</h3>  <h5 id='gtotal' style="text-align:center;"></h5>
	          			
									<?php echo 	$message; ?>
								<button type="submit"  class="btn btn-primary" value="" id="valider" <?php echo $disabled; ?>>Valider</button>

								</div>
	          	</div>
	          </div>
	           </div> <!-- .col-md-8 -->
        </div>
	</form>
	<div class="row">
		<div class="col-md-8"></div>
		<div class="col-md-4 text-right" >

			<?php echo $paypal; ?>
		</div>
	</div>

    			</div>
    		</div>
    	
			</div>
		</section>




		<script>
			var gt=0;
			var iprice=document.getElementsByClassName('iprice');
			var iquantity=document.getElementsByClassName('iquantity');
			var itotal=document.getElementsByClassName('itotal');
			var gtotal=document.getElementById('gtotal');
			var gtot=document.getElementById('gtot');

			function subTotal(){
				gt=0;
				for(i=0;i<iprice.length;i++){
					itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
					gt=gt+(iprice[i].value)*(iquantity[i].value);
				}
					gtotal.innerText=gt;
					gtot.innerText=gt;				
					
			}
			subTotal();
			
			
			</script>
			
</div>


</body>


<?php require "Footer.php";

		
?>


