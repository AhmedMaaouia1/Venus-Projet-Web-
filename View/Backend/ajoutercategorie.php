<?php   
    //require_once '../../Controller/categorieC.php';
    //require_once '../../Model/categorie.php';

    include 'C:/xampp/htdocs/test/Controller/categorieC.php';
require_once 'C:/xampp/htdocs/test/Model/categorie.php';


    $categorieC = new categorieC();
    $categories=$categorieC->affichercategorie();

    if (isset($_POST['Nom']) && isset($_POST['image'])) {
        $categorie = new categorie($_POST['Nom'], $_POST['image']);

        $categorieC->addcategorie($categorie);

        header('Location:ajoutercategorie.php');}
      
    
    $categorieC=new categorieC();
	$categories=$categorieC->affichercategorie();
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
    <body>

    <a href="liste_categorie.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Retour</a>

    
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
  <?php
					foreach ($categories as $categorie) {
				?>
      <tr>
				<td><?=$categorie["id"]?></td>
				<td><?=$categorie["Nom"]?></td>
                <td><img src="../Frontend/images/<?php echo $categorie["image"];?>" width="50" height="50" alt="" /></td>
                <td>
                <form method="POST" action="deletecategorie.php">
               <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger my-1"  style="background-color:#fd6c9e;color:white">
                <input type="hidden" value="<?=$categorie['id']?>" name="id">
                </form>
            </td>
             <td><button type="submit" class="btn btn-warning my-1"  style="background-color:#fd6c9e;color:white"><a href="modifcategorie.php?id=<?php echo $categorie["id"];?>"> Modifier </a></button></td>
			</tr>
            <?php }?>
  </tbody>
</table>
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter categorie</h4>
                  <p class="card-description">
                    Formulaire pour ajouter un categorie
                  </p>
                 
                  <form class="forms-sample" action="" method="POST" >
                  
                      
                      <div class="form-group">
                      <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Nom de categorie" required>
                    </div>               
                    <div class="form-group">
                    <label for="image">Attachez un image : </label>
                      <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2" style="background-color:#fd6c9e;color:white">Ajouter</button>
                    <button type="reset" class="btn btn-light">Annuler</button>
                    
                  </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  
                
    </body>

</html>




