<?php require 'Header_Admin.php'; ?>
<?php
	include_once '../../Controller/userC.php';
	include_once '../../Model/user.php';
	$error = "";

    // create user
    $user = null;
    $news = null;

    // create an instance of the controller
    $userC = new UserC();
    if(isset($_POST["news"]) == "1")
    {
      $news = "1";
    }
    else $news = "0";
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
        isset($_POST["email"]) && 
        isset($_POST["mdp"]) &&
        isset($_POST["sexe"]) &&
        isset($_POST["region"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["mdp"]) &&
            !empty($_POST["sexe"]) &&
            !empty($_POST["region"])
        ) {
            
            $user = new User(
				        $_POST['nom'],
                $_POST['prenom'], 
                $_POST['email'],
                $_POST['mdp'],
                $_POST['sexe'],
                $_POST['region'],
                $news
            );
            //$mail= $user->getEmail();
            $mdp=$user->getMdp();
            //$test = $userC->verification($mail);
            $test1= $userC->check_mdp_format($mdp);
            
            
            if($test1 == true)
            {
                $userC->modifieruser($user, $_POST["id_user"]);
                echo "success";
                header('Location:listclient.php');
            }
            else
            {
                $error1= "Format non correct, mot de passe doit contenir un chiffre, un caractére majuscule et un minuscule";
                header('Location:listclient.php?error1=error1');
            }
            
            
            
        }
        else
            {$error = "Manque d'informations, Veuillez remplir tout les champs.";
            echo $error;}
    }
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
<link href="inscription.css" rel="stylesheet" /> 
</head>
<body>
<button><a href="listclient.php">Retour à la liste des clients</a></button>
<div class="text-center">
<div class="form_wrapper" >
<div class="form_container"> 
    <div class="title_container">
      <h2 id="modif">Modifier un compte</h2>
    </div>
    
	<?php
			if (isset($_POST['id_user'])){
				$user = $userC->recupereruser($_POST['id_user']);				
		?>

<div class="row clearfix">
      <div class="">
        <form method="POST"  action="">
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" value="<?php echo $user['Email_user']; ?>" required />
          </div>
          <?php      
        if(isset($_GET['error']))
    {
    ?>

<h6 class="text-danger mt-1" style="font-weight: 80; font-size: 1.1em">Il ne faut pas mettre un mail existant</h6>

    <?php 

    }

?>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="mdp" value="<?php echo $user['Mdp_user']; ?>" required />
          </div>

		  <?php      
        if(isset($_GET['error1']))
    {
    ?>
       
      <h6 class="text-danger mt-1" style="font-weight: 80; font-size: 1.1em">Format non correct, mot de passe doit contenir un chiffre, un caractére majuscule et un minuscule</h6>

    <?php 

    }

?>

          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="prenom" value="<?php echo $user['Prenom_user']; ?>" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="nom" value="<?php echo $user['Nom_user']; ?>" required />
              </div>
            </div>
          </div>
            	<div class="input_field radio_option" value="Homme" >
              <input type="radio" name="sexe" id="homme" value="Homme" <?php if($user['Sexe_user']=="Homme") { ?> checked <?php } ?>>
              <label for="homme">Homme</label>
              <input type="radio" name="sexe" id="femme" value="Femme" <?php if($user['Sexe_user']=="Femme") { ?> checked <?php } ?>>
              <label for="femme">Femme</label>
              </div>

              <div class="input_field select_option" >
                <select name="region">
                  <option value="default"  >Choisir votre région</option>
                  <option value="Tunis"  <?php if($user['Region_user']=="Tunis") { ?> selected="true" <?php } ?>>Tunis</option>
                  <option value="Sousse" <?php if($user['Region_user']=="Sousse") { ?> selected="true" <?php } ?>>Sousse</option>
                  <option value="Sfax"  <?php if($user['Region_user']=="Sfax") { ?> selected="true" <?php } ?>>Sfax</option>
                  <option value="Bizerte" <?php if($user['Region_user']=="Bizerte") { ?> selected="true" <?php } ?>>Bizerte</option>
                </select>
                <div class="select_arrow"></div>
              </div>

            <div class="input_field checkbox_option">
              
            	<input type="checkbox" name="news"  id="news" <?php if($user['newsletters_user']=="1") { ?>  value="1" checked <?php } else { ?> value="0"<?php } ?>>
              
              
    			<label for="news">Je veux reçevoir des newsletters</label>
            </div>
          <input class="bouton" type="submit" style="background-color:#fd6c9e;color:white" value="Modifier" />
		      <input type="hidden" value=<?PHP echo $user['id_user']; ?> name="id_user"> 
        </form>
      </div>
    </div>
	<?php
		}
    else echo "infos introuvables";
		?>
  </div>
</div>

</div>

</body>

