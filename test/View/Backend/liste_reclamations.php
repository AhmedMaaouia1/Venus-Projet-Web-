<?php 
require 'Header_Admin.php';
include '../../Controller/ReclamationC.php';

$reclamation = new ReclamationC();
$listeReclamations = $reclamation->afficherrec(); 


?>

<body>

<div class="container mt-5">
 <h1 class="text-center text-capitalize">liste des reclamations</h1>
<div class="text-end">

<a href="ajoutrec.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter une reclamation</a>


</div>


 <input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>
 <div class='table-responsive'>
<table class='table'>
	<thead>
	<!-- <tr><th scope='col' > id </th> -->
	<th>id_reclamation</th>
	<th scope='col'> Nom </th>
	<th scope='col'> prenom </th>

	<th scope='col'>adresse</th>
	<th scope='col'>description sujet</th>
	<th scope='col'> reclamation </th>
	<th scope='col'> etat reclamation </th>

	<th> Action </th>
	</tr></thead>
	
	<tbody id='myUL'>



	
	<?php
		foreach($listeReclamations as $reclamation) {
	?>
			<tr>
				<td><?php echo $reclamation['id_reclamation']; ?></td>
				<td><?php echo $reclamation['prenom_reclamation']; ?></td>
				<td><?php echo $reclamation['nom_reclamation']; ?></td>
				<td><?php echo $reclamation['mail_reclamation']; ?></td>
				<td><?php echo $reclamation['sujet_reclamation']; ?></td>
				<td><?php echo $reclamation['message_reclamation']; ?></td>
				<td><?php echo $reclamation['etat_reclamation']; ?></td>  
				
			
	<td><a href='#'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
	<a href="supprimerrep.php?id=<?php echo $reclamation['id_reclamation']; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
	</tr>

	
	<?php
		}
	?>

</tbody>


</table></div>






</div>



</body>