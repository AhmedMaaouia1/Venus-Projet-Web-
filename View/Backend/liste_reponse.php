<?php 
require 'Header_Admin.php';
require_once '../../Controller/ReponseC.php';

$reponse = new ReponseC();
$listeReponses = $reponse->afficherep(); 

?>

<body>

<div class="container mt-5">
 <h1 class="text-center text-capitalize">liste des reponses</h1>
<div class="text-end">

<a href="ajoutrep.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter une reponse</a>


</div>


 <input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>
 <div class='table-responsive'>
<table class='table'>
	<thead>
	<!-- <tr><th scope='col' > id </th> -->
	<th>id_reponse</th>
	<th>id_reclamation</th>
	<th scope='col'> Reponse </th>
	

	<th> Action </th>
	</tr></thead>
	
	<tbody id='myUL'>



	
	<?php
		foreach($listeReponses as $reponse) {
	?>
			<tr>
				<td><?php echo $reponse['id_reponse']; ?></td>
				<td><?php echo $reponse['id_rec']; ?></td>
				<td><?php echo $reponse['reply']; ?></td>
				
				
			
	<td><a href="modifierrep.php?id_reponse=<?php echo $reponse['id_reponse']; ?>"><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
	<a href="supprimer.php?id=<?php echo $reponse['id_reponse']; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
	</tr>

	
	<?php
		}
	?>

</tbody>


</table></div>






</div>



</body>
