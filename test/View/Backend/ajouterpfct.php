<?php
	
require_once '../../Controller/ReponseC.php';
 if(!isset($_POST['Reponse'])||!isset($_POST['id_rep'])||!isset($_POST['id_rec']))
{
	echo "erreur de ";
}







$cate=new Reponse($_POST['id_rep'],$_POST['Reponse'],$_POST['id_rec']);

$reponse = new ReponseC;
$reponse->Ajouterrep($cate);


   $db = connexiondb::getConnexion();
$sql="UPDATE `recl` SET etat_reclamation=:etat WHERE id_reclamation=:id  ";
$recipesStatement = $db->prepare($sql);
 $recipesStatement->execute([  'id'=>$_POST['id_rec'],
            'etat'=>1,
  
                 
                 ]);



$destinataire =$_POST['mail']; 
$sujet = "Sujet"; // sujet du mail
$message =$_POST['Reponse']; 
mail ($destinataire, $sujet, $message);




header('location:liste_reclamations.php');

?>