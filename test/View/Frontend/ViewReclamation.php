
<?php require 'Header.php' ?>

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
<link href="inscription.css" rel="stylesheet" /> 
</head>
<body>
<div class="form_wrapper" >
   <div class="form_container"> 
    <div class="title_container">
      <h2>Réclamation</h2>
    </div>
    <div class="row">
    <div class="">
    
    <p>Nous sommes toujours à votre disposition.</p>

</div>

</div>
    
<div class="row clearfix">
  <div class="">
   <form method="POST"  id="form" action="../../Controller/ajout_reclamation.php">
     <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
       <input type="email" id="email"  name="mail_reclamation" placeholder="Email"  />
       <span id="mailer"></span>
     </div>
     <div class="row clearfix">
     <br><br>
     <p class="col_half" id="mailer"></p>
     <br><br>
     </div>
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="prenom_reclamation" id="prenom" placeholder="Prénom" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="nom_reclamation" id="nom" placeholder="Nom" />
              </div>
            </div>
          </div>	
          <div class="row clearfix">
          <span id="lnameer"></span>
          <span id="nameer"></span>
          </div>
          <div class="row clearfix">
            <div class="">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-pencil fa-fw"></i></span>
              <input type ="text" class="input-field" name="sujet_reclamation" id="desc" placeholder="Description Sujet">
              <span id="descr"></span>
              </div>
            </div>
            <div class="row clearfix">
            <div class="">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-plus"></i></span>
              <textarea type ="text" class="input-field " style="width: 350px; padding-left: 30px" id="txt" name="message_reclamation" placeholder="Votre Message"> </textarea>
              <span id="txtr"></span>
              </div>
            </div>
          </div>
          </div>  
          <input class="button" type="submit" value="Envoyer ma réclamation" />
        </form>
      </div>
    </div>
  </div>
</div>
<script>
						let myform =document.getElementById('form');
						myform.addEventListener('submit',function(e){
							let nameinput = document.getElementById('nom');
              let lnameinput = document.getElementById('prenom');
							let tel = document.getElementById('email');
							let adresse = document.getElementById('desc');
              let txt = document.getElementById('txt');

							const regex = /^[a-zA-Z-\s]+$/;
							if(nameinput.value === '' ){
								let nameer = document.getElementById('nameer');
								nameer.innerHTML="le champs nom est vide . ";
								nameer.style.color ='red';
								e.preventDefault();
							}else if (!(regex.test(nameinput.value))){
								let nameer = document.getElementById('nameer');
								nameer.innerHTML = "le nom doit comporter des lettres,et tirets seulements.";
								nameer.style.color='red';
								e.preventDefault();
							}
              if(lnameinput.value === '' ){
								let lnameer = document.getElementById('lnameer');
								lnameer.innerHTML="le champs prenom est vide . ";
								lnameer.style.color ='red';
								e.preventDefault();
							}else if (!(regex.test(lnameinput.value))){
								let lnameer = document.getElementById('lnameer');
								lnameer.innerHTML = "le prenom doit comporter des lettres,et tirets seulements.";
								lnameer.style.color='red';
								e.preventDefault();
							}
							if(tel.value === '' ){
								let teler = document.getElementById('mailer');
								teler.innerHTML="le champs mail est vide . ";
								teler.style.color ='red';
								e.preventDefault();
							}
							if(adresse.value === '' ){
								let suber = document.getElementById('descr');
								suber.innerHTML="le champs adresse est vide . ";
								suber.style.color ='red';
								e.preventDefault();
							}
              if(txt.value === '' ){
								let suber = document.getElementById('txtr');
								suber.innerHTML="le champs adresse est vide . ";
								suber.style.color ='red';
								e.preventDefault();
							}
						});
					</script>
</body>

<?php require "Footer.php" ?>