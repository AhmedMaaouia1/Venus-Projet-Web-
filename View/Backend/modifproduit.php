<?php

    require_once '../../Controller/produitC.php';
    require_once '../../Model/produit.php';
    require_once '../../Controller/categorieC.php';
      
    
    $produitC=new produitC();
	$produits=$produitC->afficherproduit();
  
  $categorieC = new categorieC();
  $categories=$categorieC->affichercategorie();
  $produitC =  new produitC();
  $error = "";

	if (
    isset($_POST['Nom']) && isset($_POST['image']) && isset($_POST['qty']) && isset($_POST['prix'])
      
        
    ){
		if (
            !empty($_POST["Nom"]) && 
            !empty($_POST["image"]) &&
            !empty($_POST["qty"]) &&
            !empty($_POST["prix"]) 
            

        ) {
            $produit = new produit(
              $_POST['Nom'], $_POST['image'],$_POST['qty'], (float)$_POST['prix'],$_POST['categorie']
            );
            
            $produitC->modifierproduit($produit, $_GET['id']);
           header('Location:ajouterproduit.php');
        }
        else
            $error = "Missing information";
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<a href="liste_produit.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Retour</a>

<h4 class="card-title">Modifier produit</h4>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
    <body>

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
      <th scope="col">Qantité</th> 
      <th scope="col">Catégorie</th>
      <th scope="col">Prix</th>
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
                
            </td>
             <td><button type="submit" class="btn btn-warning my-1" style="background-color:#fd6c9e;color:white"><a href="modifproduit.php?id=<?php echo $produit["id"];?>"> Modifier </a></button></td>
			</tr>
            <?php }?>
  </tbody>
</table>
		
		<?php
			if (isset($_GET['id'])){
				$produit = $produitC->recupererproduit($_GET['id']);
				
		?>
		<form action="" method="POST">
            <table align="center" class="table">
                <tr>
                    <td rowspan='6' colspan='1'>Tableau de modification </td>
                    <td>
                        <label for="Nom">Nom:
                        </label>
                    </td>
                    <td><input type="test" name="Nom" id="Nom" value = "<?php echo $produit['Nom']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="number" name="prix" id="prix" max="99"  min="1" step="any"  value = "<?php echo $produit['prix']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="qty">qty:
                        </label>
                    </td>
                    <td><input type="number" name="qty" id="qty" max="99"  min="1" step="any"  value = "<?php echo $produit['qty']; ?>"></td>
                </tr>
 
                <tr>
                    <td><label>List des categories</label></td>
                    <td>
                      <select name="categorie">
                        <?php
                        foreach($categories as $item ){
                        ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['Nom']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image">image:
                        </label>
                    </td>
                    <td>
                        <input type="file" name="image" id="image" value = "<?php echo $produit['image']; ?>" >
                    </td>
                </tr> 
                
                <tr>
                
                    <td>
                    <button type="submit" name="modifier" class="btn btn-primary mr-2" style="background-color:#fd6c9e;color:white" >Comfirmer</button> 
                        
                    
                    </td>
                    <td>
                    <button type="reset" class="btn btn-light">Annuler</button>
                    </td>
                </tr>
            </table>

        </form>
        </div>
                  </div>
                    </div>
                      </div>
                       </div>
        </div>

		<?php
		}
		?>
    </body>

</html>




