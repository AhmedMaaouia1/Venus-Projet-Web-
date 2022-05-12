<?php require 'Header_Admin.php';



?>
<body>

<div class="container mt-5">
 <h1 class="text-center text-capitalize">produit</h1>
<div class="text-end">

<a href="charts1.php" class="btn btn" style="background-color:#fd6c9e;color:white" >statistique</a>
<a href="rechercheproduit.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Recherche produit</a>
<a href="filtreproduit.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Filtrer produit</a>
<a href="tricroi.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Tri croissant</a>
<a href="tridec.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Tri decroissant</a>
<a href="ajouterproduit.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter un produit</a>


</div>
</body>

<!---searchbar--->
 
<!---End searchbar--->
                            <?php
                            require '../../Controller/produitC.php';
                            require '../../Controller/categorieC.php';

                        
                            $ProduitC = new produitC();
                            $CategorieC = new categorieC();

                            $Produits = $ProduitC->afficherproduit();
                            $Categories = $CategorieC->affichercategorie();

                        ?>
                        
                        
                        <html>
                            <head>
                        </head>
                        
 <div class='table-responsive'>
<table class='table'><thead>
<th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Image</th>
      <th scope="col">Qantité</th>    
      <th scope="col">Prix</th>
      <th scope="col">Catégorie</th>

</tr></thead>  <tbody id='myUL'>
                                <?php 
                                        foreach ($Produits as $Produit){
                                        foreach ($Categories as $Categorie){
                                        }

                                ?>
                        
                        
                        <tr>
                            <td><?php echo $Produit['id'] ; ?></td>
                            <td><?php echo $Produit['Nom'] ; ?></td>
                            <td><img src="../Frontend/images/<?php echo $Produit['image'];?>" width="50" height="50" alt="" /></td>
                            <td><?php echo $Produit['qty'] ; ?></td>
                            <td><?php echo $Produit['prix'] ; ?></td>
                            <td><?php echo $Categorie['Nom'] ; ?></td>



							<td><a href="modifproduit.php" class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
							<a  href="deleteproduit.php?id=<?php echo $Produit['id'] ; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
                        </tr>
                        
                        
                                <?php
                                        
                                        }
                                ?>
                                
                        </table>
                        </html>
    
             </div>
        </div>
    </div>
