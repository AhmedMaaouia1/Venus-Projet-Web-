<?php
	require_once 'C:/xampp/htdocs/test/View/connexiondb.php';
	require_once 'C:/xampp/htdocs/test/Model/Reponse.php';

	class ReponseC {
        public function afficherrep($id_rec){
            $con=connexionDB::getConnexion();
            $sql="SELECT * FROM rep where id_rec = $id_rec";
            try{  
                $query=$con->prepare($sql);
                $query->execute();
            }catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
            // Get the meeting
            $m = $query->fetch();
            return $m;
        } 
        function afficherep()
        {
            $requete = "select * from rep";
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
		function supprimer(){
            if(isset($_GET['delc'])){
            $id=$_GET['delc'];
			$sql="DELETE FROM rep WHERE id_reponse=:id";
			$db = connexiondb::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }
		}

	function Ajouterrep($Reponse){
$sql= "INSERT INTO `rep` VALUES (:id_rep, :repp, :id_rec)";
    $db = connexiondb::getConnexion();
try{ $recipesStatement = $db->prepare($sql);
    $recipesStatement->execute([ 'id_rep'=>$Reponse->getid(),
                    'repp' =>$Reponse->getreply(),
                    'id_rec'=>$Reponse->getidrec(),
                   




    ]);
 }
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());

}


}
		function getrepbyID($id)
        {
            $requete = "select * from rep where id_reponse=:id";
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
		
      function Modifierpro($prod)
{
$sqlc= "UPDATE `rep` SET reply=:repp,id_rec=:rec WHERE id_reponse=:id  ";
    $db = connexiondb::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
    $recipesStatement->execute([ 'repp'=>$prod->getreply(),
                    'rec'=>$prod->getidrec(),
                  
                    'id'=>$prod->getid(),
                 ]);
}
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());
}

}
    function supprimerrerep($id){
        $sql=" DELETE FROM rep WHERE id_reponse=:id";
         $db = connexiondb::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id' , $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    }	
?>