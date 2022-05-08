<?php
include 'C:/xampp/htdocs/Venusi/View/connexiondb.php';
	include_once 'C:/xampp/htdocs/Venusi/Model/participant.php';

	class participantC {
		function afficherparticipants(){
			$sql="SELECT * FROM participant";
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerParticipant($idparticipation){
			$sql="DELETE FROM participant WHERE idparticipation=:idparticipation";
			$db = connexiondb::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idparticipation', $idparticipation);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterParticipant($participant){
			$pdo = connexiondb::getConnexion();
        try
        {

            $query = $pdo->prepare('insert into participant (id_event, id_user) values (:id_event, :id_user)');
            $query->execute([
				'id_event'=>$participant->getIdevent(),
                'id_user'=>$participant->getIduser()
            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }		
					
		}

		
		function recupererParticipant($id){
			$sql="SELECT * from participant where id_user= :id";
			$db = connexiondb::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':id', $id);
				$query->execute();

				$Participant=$query->fetch();
				return $Participant;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		

	}
?>