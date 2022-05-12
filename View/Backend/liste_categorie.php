<?php require 'Header_Admin.php'; ?>
<body>

<div class="container mt-5">
 <h1 class="text-center text-capitalize">categorie</h1>
<div class="text-end">

<a href="recherchecategorie.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Recherche categorie</a>
<a href="ajoutercategorie.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter un categorie</a>


</div>
</body>

<!---searchbar--->
 
<!---End searchbar--->
                            <?php
                            require 'C:/xampp/htdocs/test/Controller/categorieC.php';
                        
                            $CategorieC = new categorieC();
                            $Categorie = $CategorieC->affichercategorie();
                        ?>
                        
                        
                        <html>
                            <head>
                        </head>
                        
 <div class='table-responsive'>
<table class='table'><thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Nom</th>
<th scope="col">Image</th>



</tr>
</thead>  
<tbody id='myUL'>
                                <?php 
                                        foreach ($Categorie as $Categorie) {
                                ?>
                        
                        
                        <tr>
                          <td><?php echo $Categorie['id'] ; ?></td>   
			  <td><?php echo $Categorie['Nom'] ; ?></td>
                          <td><img src="../Frontend/images/<?php echo $Categorie["image"];?>" width="50" height="50" alt="" /></td>

			<td><a href="modifcategorie.php" class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
			<a  href="deletecategorie.php?id=<?php echo $Categorie['id'] ; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
                        </tr>
                        
                        
                                <?php
                                        }
                                ?>
                        </table>
                        </html>
    
             </div>
        </div>
    </div>
  







