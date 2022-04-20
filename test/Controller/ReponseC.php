<?php
	include 'C:/xampp/htdocs/code/test/test/View/connexiondb.php';
	include_once 'C:/xampp/htdocs/code/test/test/Model/Reponse.php';

	class ReponseC {
		function afficherrep(){
			$sql="SELECT * FROM rep";
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerrep($id){
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

		function ajouterrep($Reponse){
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                INSERT INTO rep 
                (reply)
                VALUES
                (reply)
                ');
                $querry->execute([
                    'reply'=>$Reponse->getreply(),
                    
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
		function recupererrec($id){
			$sql="SELECT * from recl where id_reclamation=$id";
			$db = connexiondb::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Reclamation=$query->fetch();
				return $Reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierrep($Reponse, $id){
			try {
				$db = connexiondb::getConnexion();
				$query = $db->prepare(
					'UPDATE rep SET 
						reply=:reply, 
						
					WHERE id_reponse= :id'
				);
				$query->execute([
					'reply' => $Reponse->getreply(),
					
					'id_reponse' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
    }	
?>