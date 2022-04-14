<?php

include 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/View/connexiondb.php';
    include "C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Model/topic.php";
    


    Class topicC {

    

        function affichertopic()
        {
            $requete = "select * from topic";
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        
        function recuperertopic($idtopic){
			$sql="SELECT * from Topic where idtopic=$idtopic";
			$connexiondb = connexiondb::getConnexion();
			try{
				$query=$connexiondb->prepare($sql);
				$query->execute();

				$Topic=$query->fetch();
				return $Topic;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

        function ajoutertopic($Topic)
        {
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare('
                INSERT INTO Topic 
                (titre,descrip,contenu)
                VALUES
                (:titre,:descrip,:contenu)
                ');
                $querry->execute([
                    'titre'=>$Topic->gettitre(),
                    'descrip'=>$Topic->getdescrip(),
                    'contenu'=>$Topic->getcontenu(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiertopic($Topic, $idtopic){
			try {
				$connexiondb = connexiondb::getConnexion();
				$query = $connexiondb->prepare(
					'UPDATE Topic SET 
						titre= :titre, 
						descrip= :descrip, 
						contenu= :contenu, 
						
					WHERE idtopic= :idtopic'
				);
				$query->execute([
					'titre'=>$Topic->gettitre(),
                    'descrip'=>$Topic->getdescrip(),
                    'contenu'=>$Topic->getcontenu(),
					'idtopic' => $idtopic
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

        function supprimertopic($id)
        {
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare('
                DELETE FROM Topic WHERE idtopic =:id
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }

?>