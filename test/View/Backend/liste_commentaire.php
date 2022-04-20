<?php require 'Header_Admin.php'; ?>
<body>

<div class="container mt-5">
 <h1 class="text-center text-capitalize">Commentaires</h1>
<div class="text-end">


<a href="ajoutercommentaire.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter un commentaire</a>


</div>
</body>

<!---searchbar--->
 <input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;
							  ' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>
<!---End searchbar--->
<?php
                            require 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/commentsC.php';
                        
                            $CommentsC = new commentsC();
                            $Comments = $CommentsC->affichercomments();
                        ?>
                        
                        <html>
                            <head>
                        </head>
                        
 <div class='table-responsive'>
<table class='table'><thead>
<th scope='col'> idcom </th>
<th scope='col'>id_topic</th>
<th scope='col'> Contenu </th>
<th> Action </th>
</tr></thead>  <tbody id='myUL'>
<?php 
                                        foreach ($Comments as $Comments) {
                                ?>
                        
                        
                        <tr>
                        <td><?php echo $Comments['idcom'] ; ?></td>
                        <td><?php echo $Comments['id_topic'] ; ?></td>
                        <td><?php echo $Comments['contenu'] ; ?></td>
			<td><a href="modifiercomments.php?idcom=<?php echo $Comments['idcom'] ; ?>"><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
			<a href="supprimercomments.php?id=<?php echo $Comments['idcom'] ; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
                        </tr>
                        
                        
                                <?php
                                        }
                                ?>
                        </table>
                        </html>
    
             </div>
        </div>
    </div>
  







