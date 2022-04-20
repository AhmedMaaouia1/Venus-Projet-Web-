<?php
	include 'C:/xampp/htdocs/test/View/connexiondb.php';
	include_once '../Model/user.php';
	class UserC {
		function afficherusers(){
			$sql="SELECT * FROM user";
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimeruser($id){
			$sql="DELETE FROM user WHERE id_user=:id";
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
			$sql ="SELECT Email_user from user where Email_user= :mail";
			$db = connexiondb::getConnexion();
			
			try{
				$query=$db->prepare($sql);
			    $query->bindValue(':mail', $mail);
			    $query->execute();

				$user=$query->fetch();
				return $user;

			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function ajouteruser($user){
			$sql="INSERT INTO user ( Nom_user, Prenom_user, Email_user, Mdp_user, Sexe_user, Region_user) 
			VALUES ( :Nom_user, :Prenom_user, :Email_user, :Mdp_user, :Sexe_user, :Region_user)";
			$db = connexiondb::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
					'Nom_user' => $user->getNom(),
					'Prenom_user' => $user->getPrenom(),
					'Email_user' => $user->getEmail(),
					'Mdp_user' => $user->getMdp(),
                    'Sexe_user' => $user->getsexe(),
                    'Region_user' => $user->getregion()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereruser($id){
			$sql="SELECT * from user where id_user=$id";
			$db = connexiondb::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieruser($user, $id){
			try {
				$db = connexiondb::getConnexion();
				$query = $db->prepare(
					'UPDATE user SET 
						Nom_user= :Nom, 
						Prenom_user= :Prenom, 
						Adresse_user= :Adresse, 
						Email_user= :Email, 
						Mdp_user= :Mdp
					WHERE id_user= :id'
				);
				$query->execute([
					'Nom_user' => $user->getNom(),
					'Prenom_user' => $user->getPrenom(),
					'Email_user' => $user->getEmail(),
					'Mdp_user' => $user->getMdp(),
					'id_user' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>