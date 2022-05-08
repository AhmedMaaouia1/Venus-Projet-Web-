<?php require 'Header_Admin.php'; ?>
<?php
	include_once '../../Controller/EvenementC.php';
	
	$EvenementC=new EvenementC();
	
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

<!--  Modification Evenement -->
<div class="text-center">
<div class="form_wrapper" >
<div class="form_container"> 
    <div class="title_container">
      <h2 id="modif">Modifier un compte</h2>
    </div>
    
	<?php
			if (isset($_POST['id_event'])){
				$evenement = $EvenementC->recupererEvenement($_POST['id_event']);				
		?>

<div class="row clearfix">
      <div class="">
        <form method="POST"  action="../../Controller/modifierEvenement.php">
          

          <div class="row clearfix">

            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" ></i></span>
                <input type="text" name="nom_event"  placeholder="nom événement" required value="<?php echo $evenement['nom_event']; ?>" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" ></i></span>
                <input type="text" name="localisation_event"  placeholder="localisation" required value="<?php echo $evenement['localisation_event']; ?>" required />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" ></i></span>
                <input type="date" name="date_event"  placeholder="date événement" required value="<?php echo $evenement['date_event']; ?>" />
              </div>
          </div>
          <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" ></i></span>
                <input type="text" name="dis_event"  placeholder="description événement" required value="<?php echo $evenement['dis_event']; ?>" />
              </div>

             
            </div>
          <input class="bouton" type="submit" style="background-color:#fd6c9e;color:white" value="Modifier l'event" />

          <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" ></i></span>
                <input type="hidden" name="id_event"  placeholder="nom événement" required value="<?php echo $evenement['id_event']; ?>" />
              </div>
            </div>
		  
        </form>
      </div>
    </div>
	<?php
		}
		?>
  </div>
</div>

</div>