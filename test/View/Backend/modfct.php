<?php


require_once '../../Controller/ReponseC.php';
 if(!isset($_POST['Reponse'])||!isset($_POST['id_rep'])||!isset($_POST['id_rec']))
{
	echo "erreur de ";
}
  $db = connexiondb::getConnexion();
$sql="SELECT * FROM recl where id_reclamation=?";
$recipesStatement = $db->prepare($sql);
$recipesStatement->execute([$_POST['id_rec']]);
$title=$recipesStatement->fetchall();
foreach ($title as $res) {
  
}

$cate=new Reponse($_POST['id_rep'],$_POST['Reponse'],$_POST['id_rec']);

$reponse = new ReponseC;
$reponse->Modifierpro($cate);



$destinataire =$res['mail_reclamation']; 
$sujet = "Modifier reponse"; // sujet du mail
$message =$_POST['Reponse']; 
mail ($destinataire, $sujet, $message);

header('location:liste_reclamations.php');

?>