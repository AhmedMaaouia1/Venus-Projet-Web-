<?php require 'Header_Admin.php'; ?>
<?php
	include_once '../../Controller/EvenementC.php';
	
	$EvenementC=new EvenementC();
	
	$listeevent=$EvenementC->afficherEvenements(); 
 
  if(isset($_POST["nom_event"]))
  {  
      $listeevent=$EvenementC->Findevent($_POST["nom_event"],$_POST["localisation_event"]);
      
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

<div class="container mt-5">

 <h1 class="text-center text-capitalize">Liste des événements</h1>

 <form class="d-flex" action=""  method="POST">
            <input class="form-control me-2" type="text" name="nom_event"  placeholder="nom_event" aria-label="Search">
		   <input class="form-control me-2" type="text" name="localisation_event"  placeholder="localisation_event" aria-label="Search">
                      <input class="btn btn" style="background-color:#fd6c9e ; color : white" type="submit" name="recherche" value="Recherche"/>
                 </form> 
 <!--<input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;
							  ' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>-->
<div class='table-responsive'>
 <table class='table'><thead>
 <tr><th scope='col' > id </th>
 <th scope='col'> Nom event </th>
 <th scope='col'> localisation_event </th>

 <th scope='col'> date_event </th>

 <th scope='col'> dis_event </th>


 <th scope='col'> Modifier </th>
 <th scope='col'> Supprimer </th>
 </tr></thead>  <tbody id='myUL'>
 
    <a  type="text" id="myInput" href="tri.php"  class="btn btn-primary" title="trier">trier par nom</a>
           <?php
				foreach($listeevent as $evenement){
			?>
			<tr>
			    <td><?php echo $evenement['id_event']; ?></td>
				<td><?php echo $evenement['nom_event']; ?></td>
				<td><?php echo $evenement['localisation_event']; ?></td>
				<td><?php echo $evenement['date_event']; ?></td>
				<td><?php echo $evenement['dis_event']; ?></td>
				<!--<td><a href='#modif'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a></td>-->
                <td>
					<form method="POST" action="modifer.php">
						<input type="submit"  name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $evenement['id_event']; ?> name="id_event">
					</form>
				</td>
				<td><a href="../../Controller/supprimerEvenement.php?id_event=<?php echo $evenement['id_event']; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
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
      <h2>Ajouter evenement</h2>
    </div>
    <div class="row">
    <div class="">
    

 </div>

 </div>
    <div class="row clearfix">
      <div class="">
        <form method="POST"  action="../../Controller/ajouterEvenement.php">
          <div class="input_field"> <span><i aria-hidden="true"></i></span>
            <input type="text" name="nom_event" placeholder="nom événement" required />
          </div>
          <?php      
        if(isset($_GET['error']))
    {
    ?>

 <h6 class="text-danger mt-1" style="font-weight: 80; font-size: 1.1em">Il ne faut pas mettre un nom existant</h6>

    <?php 

    }

 ?>
 <div class="input_field"> <span><i aria-hidden="true"></i></span>
            <input type="text" name="localisation_event" placeholder="localisation événement" required />
          </div> 
		  <div class="input_field"> <span><i aria-hidden="true"></i></span>
            <input type="DATE" name="date_event" placeholder="jj/mm/aa" required />
          </div>
		  
              <div class="input_field"> <span><i aria-hidden="true" ></i></span>
              <textarea type ="text" name="dis_event"  style="width: 350px; padding-left: 30px" placeholder="discription"> 
 </textarea>
              </div>
            </div>
          <input class="bouton" type="submit" style="background-color:#fd6c9e;color:white" value="ajOuter un event" />
		  
        </form>
      </div>
    </div>
  </div>
 </div>

</div>


</body>