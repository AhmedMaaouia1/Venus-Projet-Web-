<?php

    //require_once '../../Controller/produitC.php';
    //require_once '../../Model/produit.php';
    //require_once '../../Controller/categorieC.php';

    include 'C:/xampp/htdocs/test/Controller/produitC.php';
require_once 'C:/xampp/htdocs/test/Model/produit.php';
include 'C:/xampp/htdocs/test/Controller/categorieC.php';

    $produitC =  new produitC();
    $categorieC = new categorieC();
    $categories=$categorieC->affichercategorie();

    if (isset($_POST['Nom']) && isset($_POST['image']) && isset($_POST['qty']) && isset($_POST['prix'])) {
        $produit = new produit($_POST['Nom'], $_POST['image'],$_POST['qty'], (float)$_POST['prix'],$_POST['categorie']);

        $produitC->addproduit($produit);

        header('Location:ajouterproduit.php');}
      
    
    $produitC=new produitC();
	$produits=$produitC->afficherproduit();
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
    <body>
    <a href="liste_produit.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Retour</a>

    
    <div class="col-lg-3 col-md-5 col-5 text-end">



          
</div>

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
      <th scope="col">Prix</th>
      <th scope="col">Qantité</th>    
      <th scope="col">Catégorie</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
  <?php
					foreach ($produits as $produit) {
				?>
      <tr>
				<td><?=$produit["id"]?></td>
				<td><?=$produit["Nom"]?></td>
				<td><?=$produit["prix"]?></td>
				<td><?=$produit["qty"]?></td>
                <td><?=$produit["idcat"]?></td>
                <td><img src="../Frontend/images/<?php echo $produit["image"];?>" width="50" height="50" alt="" /></td>
                <td>
                <form method="POST" action="deleteproduit.php">
               <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger my-1" style="background-color:#fd6c9e;color:white">
                <input type="hidden" value="<?=$produit['id']?>" name="id">
                </form>
            </td>
             <td><button type="submit" class="btn btn-warning my-1" style="background-color:#fd6c9e;color:white"><a href="modifproduit.php?id=<?php echo $produit["id"];?>"> Modifier </a></button></td>
			</tr>
            <?php }?>
  </tbody>
</table>
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter produit</h4>
                  <p class="card-description">
                    Formulaire pour ajouter un produit
                  </p>
                 
                  <form class="forms-sample" action="" method="POST" >
                  
                      
                      <div class="form-group">
                      <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Nom de produit" required>
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control" name="prix" id="prix"  min="1" step="any" max="99" placeholder="Prix" required>
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control" name="qty" id="qty"  min="1" step="any" max="99" placeholder="Quantité" required>
                    </div>
                    <div class="form-group">
                    <label>Liste des categories :</label>
                      <select name="categorie"  class="form-control">                         
                        <?php
                        foreach($categories as $item ){
                        ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['Nom']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
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
                
    </body>

</html>




