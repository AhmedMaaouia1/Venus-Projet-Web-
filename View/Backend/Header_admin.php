
<html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="styleadmin.css">

</head>


<body>

<div id="mySidebar" class="sidebar">
 <img id="logo" src="logo.png" class="mt-3" width="140px" /> 
    <a style="margin-top:150px" href="dashboard.php">Dashboard</a>
    <a href="listclient.php">Clients</a>
    <a href="liste_produits.php">Produits</a>
    <a href="liste_categorie.php">Categorie</a>
    <a href="liste_commandes.php">Commandes</a>
    <a href="liste_evenements.php">Evénements</a>
    <a href="liste_forum.php">Forums</a>
    <a href="liste_reclamations.php">reclamation</a>
    <a href="listadmin.php">Administrateurs</a>
	


</div>

<div id="main">

<div class="row">
<div class="col-lg-8 col-md-5 col-5">
  <button style="display:block" id="show" class="openbtn" onclick="openNav()">☰</button>  
  <button style="display:none"id="close" class="openbtn" onclick="closeNav()">☰</button>  
</div>

<div class="col-lg-3 col-md-5 col-5 text-end">

<form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn" style="background-color:#fd6c9e ; color : white"type="submit">Search</button>
            </form>

          
</div>
<div class="col-lg-1 col-md-2 col-2 text-end mt-1">
  <li class="nav-item dropdown links list-unstyled">
                <a class="nav-link fa fa fa-user text-dark mx-4 dropdown" id="userr" href="#" data-bs-toggle="dropdown"
                   id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>

                <div class="dropdown-menu mt-2" aria-labelledby="navbarDropdown" style="right: 0;left: auto">

                    <a class="dropdown-item text-dark"   href="#">Compte</a>
                    <a class="dropdown-item text-dark"   href="connexion_admin.php">LogOut</a>
         

                </div>
            </li>

</div>

</div>

<script>
var open = document.getElementById("show");
var close = document.getElementById("close");
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  open.style.display = "none";
    close.style.display = "block";
  
  
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  open.style.display = "block";
    close.style.display = "none";
}
</script>
   
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>