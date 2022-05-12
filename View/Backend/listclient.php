<?php require 'Header_Admin.php'; ?>
<?php
	include '../../Controller/userC.php';
	//include '../../Model/user.php';
	$userC=new UserC();
	
	$listeusers=$userC->afficherusers(); 
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

<div class="container mt-5">

 <h1 class="text-center text-capitalize">Liste des Utilisateurs</h1>


 <!--<input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;
							  ' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>-->
 <div class='table-responsive'>
<table class='table'><thead>
<tr><th scope='col' > # </th>
<th scope='col'> Nom </th>
<th scope='col'> Prenom </th>

<th scope='col'>Email</th>

<th scope='col'> Mot de passe </th>

<th scope='col'> Sexe </th>

<th scope='col'> Region </th>

<th scope='col'> Newsletters </th>

<th scope='col'> Role </th>

<th scope='col'> Modifier </th>
<th scope='col'> Supprimer </th>
</tr></thead>  <tbody id='myUL'>


           <?php
				foreach($listeusers as $user){
			?>
			<tr>
			    <td><?php echo $user['id_user']; ?></td>
				<td><?php echo $user['Nom_user']; ?></td>
				<td><?php echo $user['Prenom_user']; ?></td>
				<td><?php echo $user['Email_user']; ?></td>
				<td><?php echo $user['Mdp_user']; ?></td>
				<td><?php echo $user['Sexe_user']; ?></td>
				<td><?php echo $user['Region_user']; ?></td>
				<td><?php echo $user['newsletters_user']; ?></td>
				<td><?php echo $user['role_user']; ?></td>
				<!--<td><a href='#modif'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a></td>-->
                <td>
					<form method="POST" action="">
						<input type="submit" href="#modif" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $user['id_user']; ?> name="id_user">
					</form>
				</td>
				<td><a href="supprimer_user.php?id_user=<?php echo $user['id_user']; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
			</tr>
			<?php
				}
			?>

</tbody>


</table></div>

</div>


<div class="text-center">
<div class="form_wrapper" >
   <div class="form_container"> 
    <div class="title_container">
      <h2>Ajouter un compte</h2>
    </div>
    <div class="row">
    <div class="">
    

</div>

</div>
    <div class="row clearfix">
      <div class="">
        <form method="POST"  action="../../Controller/ajout_user_back.php">
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Email" required />
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
            <input type="password" name="mdp" placeholder="mot de passe" required />
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
                <input type="text" name="prenom" placeholder="Prénom" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="nom" placeholder="Nom" required />
              </div>
            </div>
          </div>
            	<div class="input_field radio_option">
              <input type="radio" name="sexe" id="homme" value="Homme">
              <label for="homme">Homme</label>
              <input type="radio" name="sexe" id="femme" value="Femme">
              <label for="femme">Femme</label>
              </div>
              <div class="input_field select_option" >
                <select name="region">
                  <option value="default">Choisir votre région</option>
                  <option value="Tunis">Tunis</option>
                  <option value="Sousse">Sousse</option>
                  <option value="Sfax">Sfax</option>
                  <option value="Bizerte">Bizerte</option>
                </select>
                <div class="select_arrow"></div>
              </div>

            <div class="input_field checkbox_option">
            	<input type="checkbox" name="news" value="1" id="news">
    			<label for="news">Je veux reçevoir des newsletters</label>
            </div>
          <input class="bouton" type="submit" style="background-color:#fd6c9e;color:white" value="Créer un compte" />
		  
        </form>
      </div>
    </div>
  </div>
</div>

</div>

<!--  Modification User -->

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
        <form method="POST"  action="Modifier_user_back.php">
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="emailm" value="<?php echo $user['Email_user']; ?>" required />
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
            <input type="password" name="mdpm" value="<?php echo $user['Mdp_user']; ?>" required />
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
                <input type="text" name="prenomm" value="<?php echo $user['Prenom_user']; ?>" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="nomm" value="<?php echo $user['Nom_user']; ?>" required />
              </div>
            </div>
          </div>
            	<div class="input_field radio_option" value="Homme" >
              <input type="radio" name="sexem" id="hommem" value="Homme" <?php if($user['Sexe_user']=="Homme") { ?> checked <?php } ?>>
              <label for="hommem">Homme</label>
              <input type="radio" name="sexem" id="femmem" value="Femme" <?php if($user['Sexe_user']=="Femme") { ?> checked <?php } ?>>
              <label for="femmem">Femme</label>
              </div>

              <div class="input_field select_option" >
                <select name="regionm">
                  <option value="default"  >Choisir votre région</option>
                  <option value="Tunis"  <?php if($user['Region_user']=="Tunis") { ?> selected="true" <?php } ?>>Tunis</option>
                  <option value="Sousse" <?php if($user['Region_user']=="Sousse") { ?> selected="true" <?php } ?>>Sousse</option>
                  <option value="Sfax"  <?php if($user['Region_user']=="Sfax") { ?> selected="true" <?php } ?>>Sfax</option>
                  <option value="Bizerte" <?php if($user['Region_user']=="Bizerte") { ?> selected="true" <?php } ?>>Bizerte</option>
                </select>
                <div class="select_arrow"></div>
              </div>

            <div class="input_field checkbox_option">
            	<input type="checkbox" name="newsm" value="1" id="newsm" <?php if($user['newsletters_user']=="1") { ?> checked <?php } ?>>
    			<label for="newsm">Je veux reçevoir des newsletters</label>
            </div>
          <input class="bouton" type="submit" style="background-color:#fd6c9e;color:white" value="Modifier le compte" />
		  
        </form>
      </div>
    </div>
	<?php
		}
		?>
  </div>
</div>

</div>


</body>