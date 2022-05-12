<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
.btnn {
background-color: #fd6c9e;
border-color: #fd6c9e;
color:#fff;
border-radius:7px;

}
.btnn:hover {
background-color: #ea90af;
border-color: #ea90af;
color:#fff;
border-radius:10px;

}


</style>
<body>
<div class="container">
<div class="row">
<div class="col text-left mt-3">
  <a class="navbar-brand" ><img src="logo.png" width="75px"/></a>

</div>
</div>
<div class="row">
<div class="col-3">
</div>


<div class="col-6">

<div class="form-title text-center mt-5">
<h1 class="text-uppercase font-weight-light "> Connexion </h1> 
        </div>
        <div class="d-flex flex-column text-center mt-5">
          <form method="POST" action="#">
		  <div class="form-row">
            <div class="form-group col">
              <input type="email" class="form-control"  id="email1"placeholder="Admin@admin.com">
            </div>
			</div>
			<div class="form-row">
            <div class="form-group col">
              <input type="password" class="form-control"  id="password1" placeholder="Votre mot de passe...">
  <div class="icon" style="display:flex; align-items:center; position:absolute; top:10%;transform:translateY(50%);right:20px;">


</div>           

		   </div>
		   </div>
		   
		    <button type="submit"  class="btn btn-block mt-4 btnn" href="listclient.php">Connexion</button>
		   </form>
           
  
          
          <div class="text-center text-muted delimiter mt-4"style="font-family:modern sans">ou utiliser un réseau social</div>
          <div class="d-flex justify-content-center social-buttons mt-4">
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
              <i class="fab fa-twitter"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-round mx-2" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="fab fa-facebook"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
              <i class="fab fa-linkedin"></i>
            </button>
          </div>
		  
		          <div class="signup-section mt-4" style="font-family:modern sans">Mot de passe Oublié? <a href="#a" class="text-info"> Cliquez Ici</a>.</div>

		  
        </div>
    
</div>
</div>
</div>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>






</html>