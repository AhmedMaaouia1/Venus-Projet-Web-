<?php

    require_once '../../Controller/categorieC.php';
    require_once '../../Model/categorie.php';

      
    
    $categorieC=new categorieC();
	$categories=$categorieC->affichercategorie();
  
  $error = "";

	if (
    isset($_POST['Nom']) && isset($_POST['image'])
      
        
    ){
		if (
            !empty($_POST["Nom"]) && 
            !empty($_POST["image"]) 
            

        ) {
            $categorie = new categorie(
              $_POST['Nom'], $_POST['image']
            );
            
            $categorieC->modifiercategorie($categorie, $_GET['id']);
           header('Location:ajoutercategorie.php');
        }
        else
            $error = "Missing information";
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<h4 class="card-title">Modifier categorie</h4>

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
      <th scope="col">image</th>

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
                
            </td>
             <td><button type="submit" class="btn btn-warning my-1" style="background-color:#fd6c9e;color:white"><a href="modifcategorie.php?id=<?php echo $categorie["id"];?>"> Modifier </a></button></td>
			</tr>
            <?php }?>
  </tbody>
</table>

		<?php
			if (isset($_GET['id'])){
				$categorie = $categorieC->recuperercategorie($_GET['id']);
				
		?>
		<form action="" method="POST">
            <table align="center" class="table">
                <tr>
                    <td rowspan='3' colspan='1'>Tableau de modification </td>
                    <td>
                        <label for="Nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="Nom" id="Nom" value = "<?php echo $categorie['Nom']; ?>"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="image">image:
                        </label>
                    </td>
                    <td>
                        <input type="file" name="image" id="image" value = "<?php echo $categorie['image']; ?>">
                    </td>
                </tr> 
                
                <tr>
                
                    <td>
                    <button type="submit" name="modifier" class="btn btn-primary mr-2" style="background-color:#fd6c9e;color:white">Comfirmer</button> 
                        
                    
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




