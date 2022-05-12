<?php

	include '../View/connexiondb.php';
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

		function connexion($mail, $mdp){
			$sql ="SELECT * from user where Email_user= :mail and Mdp_user= :mdp";
			$db = connexiondb::getConnexion();
			
			try{
				$query=$db->prepare($sql);
			    $query->bindValue(':mail', $mail);
			    $query->bindValue(':mdp', $mdp);
			    $query->execute();

				$user=$query->fetch();
				$_SESSION['id_user'] = $user['id_user'];
				$_SESSION['Nom_user'] = $user['Nom_user'];
				$_SESSION['Prenom_user'] = $user['Prenom_user'];
				$_SESSION['Email_user'] = $user['Email_user'];
				$_SESSION['Sexe_user'] = $user['Sexe_user'];
				$_SESSION['Region_user'] = $user['Region_user'];
				return $user;

			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


function check_mdp_format($mdp)
{
	$majuscule = preg_match('@[A-Z]@', $mdp);
	$minuscule = preg_match('@[a-z]@', $mdp);
	$chiffre = preg_match('@[0-9]@', $mdp);
	
	if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8)
	{
		return false;
	}
	else 
		return true;
}




		function ajouteruser($user){
			$sql="INSERT INTO user ( Nom_user, Prenom_user, Email_user, Mdp_user, Sexe_user, Region_user, newsletters_user, role_user) 
			VALUES ( :Nom_user, :Prenom_user, :Email_user, :Mdp_user, :Sexe_user, :Region_user, :newsletters_user, :role_user)";
			$db = connexiondb::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
					'Nom_user' => $user->getNom(),
					'Prenom_user' => $user->getPrenom(),
					'Email_user' => $user->getEmail(),
					'Mdp_user' => $user->getMdp(),
                    'Sexe_user' => $user->getsexe(),
                    'Region_user' => $user->getregion(),
					'newsletters_user' => $user->getnews(),
					'role_user' => $user->getrole()
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
						Nom_user= :Nom_user, 
						Prenom_user= :Prenom_user, 
						Email_user= :Email_user, 
						Mdp_user= :Mdp_user,
                    Sexe_user= :Sexe_user ,
                    Region_user= :Region_user ,
					newsletters_user= :newsletters_user ,
					role_user= :role_user
					WHERE id_user= :id_user'
				);
				$query->execute([
					'Nom_user' => $user->getNom(),
					'Prenom_user' => $user->getPrenom(),
					'Email_user' => $user->getEmail(),
					'Mdp_user' => $user->getMdp(),
					'Sexe_user' => $user->getsexe(),
                    'Region_user' => $user->getregion(),
					'newsletters_user' => $user->getnews(),
					'role_user' => $user->getrole(),
					'id_user' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>