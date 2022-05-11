<?php
	require_once 'C:/xampp/htdocs/code/test/test/View/connexiondb.php';
	include_once 'C:/xampp/htdocs/code/test/test/Model/Reclamation.php';

	class ReclamationC {
		function afficherrec(){
			$sql="SELECT * FROM recl";
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
				function afficherrectri(){
			$sql="SELECT * FROM recl where etat_reclamation like 0";
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerrec($id){
			$sql="DELETE FROM recl WHERE id_reclamation=:id";
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

        function verification($mail){
			$sql ="SELECT mail_reclamation from recl where mail_reclamation= :mail";
			$db = connexiondb::getConnexion();
			
			try{
				$query=$db->prepare($sql);
			    $query->bindValue(':mail', $mail);
			    $query->execute();

				$Reclamation=$query->fetch();
				return $Reclamation;

			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
          
		//function date(){$date_reclamation = date('Y-m-d');}

		function ajouterrec($Reclamation){
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                INSERT INTO recl 
                (prenom_reclamation,nom_reclamation,mail_reclamation,sujet_reclamation,message_reclamation)
                VALUES
                (:prenom_reclamation,:nom_reclamation,:mail_reclamation,:sujet_reclamation,:message_reclamation)
                ');
                $querry->execute([
                    'prenom_reclamation'=>$Reclamation->getprenom(),
                    'nom_reclamation'=>$Reclamation->getnom(),
                    'mail_reclamation'=>$Reclamation->getmail(),
					'sujet_reclamation'=>$Reclamation->getsjt(),
					'message_reclamation'=>$Reclamation->getmsg(),
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

	

		function rechercherrec($prenom_reclamation){
			$sql="SELECT * FROM recl where prenom_reclamation like '" .$prenom_reclamation."' ";
			$db = config::getConnexion();
			
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		function modifierrec($Reclamation, $id){
			try {
				$db = connexiondb::getConnexion();
				$query = $db->prepare(
					'UPDATE recl SET 
						prenom_reclamation= :prenom_reclamation, 
						nom_reclamation= :nom_reclamation, 
						mail_reclamation= :mail_reclamation, 
						sujet_reclamation= :sujet_reclamation, 
						message_reclamation= :message_reclamation
					WHERE id_reclamation= :id_reclamation'
				);
				$query->execute([
					'prenom_reclamation'=>$Reclamation->getprenom(),
                    'nom_reclamation'=>$Reclamation->getnom(),
                    'mail_reclamation'=>$Reclamation->getmail(),
					'sujet_reclamation'=>$Reclamation->getsjt(),
					'message_reclamation'=>$Reclamation->getmsg(),
					'id_reclamation'=> $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		public function search()
        {
            if(isset($_GET['s'])){
                $c=$_GET['s'];
                try {
                    $con=connexiondb::getConnexion();
                    // Create sql statment
                    $sql = "SELECT * FROM `recl` WHERE `nom_reclamation` LIKE '$c%'";
                    $resultp = $con->query($sql);
                    return $resultp; 
                } catch (Exception $e) {
                    echo "Error " . $e->getMessage();
                    exit();
                }

            }
        }
		public function sortby()
        {
            if(isset($_GET['sort'])){
                $c=$_GET['sort'];
                try {
                    $con=connexiondb::getConnexion();
                    // Create sql statment
                    $sql = " select * from recl order by $c";
                    $resultp = $con->query($sql);
                    return $resultp;
                } catch (Exception $e) {
                    echo "Error " . $e->getMessage();
                    exit();
                }

            }
        }
        


	}
?>