<?php 
require 'Header_Admin.php';
require_once '../../Controller/ReclamationC.php';
require_once '../../Controller/ReponseC.php';
$reclamation = new ReclamationC();
$reponse = new ReponseC;
$reponse->supprimer();
if(isset($_GET['sort'])){
    $listeReclamations = $reclamation->sortby(); ;}else if(isset($_GET['s'])){
    $listeReclamations = $reclamation->search(); }else{$listeReclamations = $reclamation->afficherrectri(); }
if(isset($_POST["prenom_reclamation"]))
    {  
        $listeReclamations=$reclamation->rechercherrec($_POST["prenom_reclamation"]);
        
      }

?>



<body>
<div class="container mt-5">
<h1 class="text-center text-capitalize">liste des reclamations</h1>
  <a href="liste_reclamations.php" class="btn btn" style="background-color:#fd6c9e;color:white" >Retoure</a> 
<br><br><br><br>
<div class='table-responsive'>
<table class='table'>
	<thead>
	<!-- <tr><th scope='col' > id </th> -->
	<th><a href="?sort=id_reclamation">id_reclamation</a></th>
	<th scope='col'><a href="?sort=nom_reclamation">Nom</a> </th>
	<th scope='col'> prenom </th>
    <th scope='col'>adresse</th>
	<th scope='col'>description sujet</th>
	<th scope='col'> reclamation </th>
	<th scope='col'><a href="?sort=date_reclamation">date reclamation</a></th>
    <th>reponse</th>
    <th> Rep Action </th>
	<th> Action </th>
    <th>Statut</th>
	</thead>
	<?php
		foreach($listeReclamations as $reclamation) :
	?>
			<tr>
				<td><?php echo $reclamation['id_reclamation']; ?></td>
				<td><?php echo $reclamation['prenom_reclamation']; ?></td>
				<td><?php echo $reclamation['nom_reclamation']; ?></td>
				<td><?php echo $reclamation['mail_reclamation']; ?></td>
				<td><?php echo $reclamation['sujet_reclamation']; ?></td>
				<td><?php echo $reclamation['message_reclamation']; ?></td>
				<td><?php echo $reclamation['date_reclamation']; ?></td>		
                <?php 
                $r=$reponse->afficherrep($reclamation['id_reclamation']);
                if($r){
                    echo '<td>';
                    echo $r['reply'];
                    echo'</td> <td> <a href="Modif.php?addr=';echo$r['id_reponse'];echo'" class="btn btn" style="background-color:#fd6c9e;color:white" >Modifier reponse</a>/<a href="suprep.php?addr=';echo$r['id_reponse'];echo'" class="btn btn" style="background-color:#fd6c9e;color:white" >Supprimer reponse</a></td>';
                }else{
                    echo '<td> <a href="Ajouterrepo.php?addr=';echo$reclamation['id_reclamation'];echo'" class="btn btn" style="background-color:#fd6c9e;color:white" >ajouter reponse</a>  </td> <td>  </td>';
                }
                ?>
                <td>
                <a href="modifierrec.php?id=<?php echo $reclamation['id_reclamation']; ?>"><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
                <a href="supprimerrep.php?id=<?php echo $reclamation['id_reclamation']; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a>
                </td>
                <td>
                    <?php if($r){
                        echo '<button class="btn-primary">Traité</button>';
                    }else{
                        echo '<button class="btn-warning">Non traité</button>';
                    } ?>
                </td>
            </tr>
    <?php endforeach; ?>
</tbody>
</table></div>
<button class="btn-primary" onclick="window.print()">print</button>

</div>
</body>