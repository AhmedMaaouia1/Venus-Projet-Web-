<?php 
require 'Header_Admin.php';
include '../../Controller/ReponseC.php';

$reponse = new ReponseC();
$listeReponses = $reponse->afficherrep(); 

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
	<th scope='col'> Reponse </th>
	

	<th> Action </th>
	</tr></thead>
	
	<tbody id='myUL'>



	
	<?php
		foreach($listeReponses as $reponse) {
	?>
			<tr>
				<td><?php echo $reponse['id_reponse']; ?></td>
				<td><?php echo $reponse['reply']; ?></td>
				
				
			
	<td><a href='#'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
	<a href="supprimerrep.php?id=<?php echo $reponse['id_reponse']; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
	</tr>

	
	<?php
		}
	?>

</tbody>


</table></div>






</div>



</body>
<!--

<body>

<div class="container mt-5">
 <h1 class="text-center text-capitalize">liste des reponses</h1>
<div class="text-end">

<a href="#" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter une reponse</a>


</div>


 <input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;
							  ' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>
 <div class='table-responsive'>
<table class='table'><thead>
<tr><th scope='col' > id_reclamation </th>


<th scope='col'>reclamation</th>

<th scope='col'> reponse </th>

<th> Action </th>
</tr></thead>  <tbody id='myUL'>


<tr><th scope='row' >77</th>

<td >livraison lente</td>
<td >consulter la company de livraison</td>


<td><a href='#'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
<a  href='#'><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
</tr>

<tr><th scope='row' >88</th>

<td >fausse livraison</td>
<td >consulter la company de livraison</td>


<td><a href='#'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
<a  href='#'><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
</tr>


<tr><th scope='row' >99</th>

<td >client non satisfait</td>
<td >envoyer mail pour le client</td>


<td><a href='#'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
<a  href='#'><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
</tr>

</tbody>


</table></div>






</div>



</body> -->