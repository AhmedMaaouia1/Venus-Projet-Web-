<?php require 'Header_Admin.php'; ?>
<body>

<div class="container mt-5">
 <h1 class="text-center text-capitalize">Forum</h1>
<div class="text-end">


<a href="ajoutertopic.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter un Forum</a>
<a href="charts.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Stats</a>


</div>
</body>

<!---searchbar--->
 <input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;
							  ' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>
<!---End searchbar--->
                            <?php
                            require 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/topicC.php';
                        
                            $TopicC = new topicC();
                            $Topic = $TopicC->affichertopic();
                        ?>
                        
                        
                        <html>
                            <head>
                        </head>
                        
 <div class='table-responsive'>
<table class='table'><thead>
<th scope='col'> titre </th>
<th scope='col'>Description</th>
<th scope='col'> Contenu </th>
<th> Action </th>
</tr></thead>  <tbody id='myUL'>
                                <?php 
                                        foreach ($Topic as $Topic) {
                                ?>
                        
                        
                        <tr>
                            <td><?php echo $Topic['titre'] ; ?></td>
                            <td><?php echo $Topic['descrip'] ; ?></td>
                            <td><?php echo $Topic['contenu'] ; ?></td>
							<td><a href="modifierforum.php?id=<?php echo $Topic['idtopic'] ; ?>"><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
							<a  href="supprimertopic.php?id=<?php echo $Topic['idtopic'] ; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
                        </tr>
                        
                        
                                <?php
                                        }
                                ?>
                        </table>
                        </html>
    
             </div>
        </div>
    </div>
  







