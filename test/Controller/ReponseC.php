<?php
	require_once 'C:/xampp/htdocs/code/test/test/View/connexiondb.php';
	include_once 'C:/xampp/htdocs/code/test/test/Model/Reponse.php';

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

		function ajouterrep($Reponse){
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare("
                INSERT INTO rep 
                (reply)
                VALUES
                (:reply)
                ");
                $querry->execute([
                    'reply'=>$Reponse->getreply(),
                    
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
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
		
        function modifierrep($Reponse,$id_reponse)
        {
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                UPDATE rep SET
                reply=:reply
                where id_reponse=:id_reponse
                ');
                $querry->execute([
                    'id_reponse'=>$id_reponse,
                    'reply'=>$Reponse->getreply(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }	
?>