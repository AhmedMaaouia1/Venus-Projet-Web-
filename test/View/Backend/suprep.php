<?php


require_once '../../Controller/ReponseC.php';
 
 require_once 'C:/xampp/htdocs/code/test/test/View/connexiondb.php';
  $db = connexiondb::getConnexion();
$sql="SELECT * FROM rep where  id_reponse=?";
$recipesStatement = $db->prepare($sql);
$recipesStatement->execute([$_GET['addr']]);
$title=$recipesStatement->fetchall();
foreach ($title as $res) {
  
}

$reponse = new ReponseC;
$reponse->supprimerrerep($_GET['addr']);


 $db = connexiondb::getConnexion();
$sql="UPDATE `recl` SET etat_reclamation=:etat WHERE id_reclamation=:id  ";
$recipesStatement = $db->prepare($sql);
 $recipesStatement->execute([  'id'=>$res['id_rec'],
            'etat'=>0,
  
               ]);




header('location:liste_reclamations.php');

?>