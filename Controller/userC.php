<?php
 // session_start();
 
	include_once 'C:/xampp/htdocs/test/View/connexiondb.php';
	include_once 'C:/xampp/htdocs/test/Model/user.php';
	
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

		public function afficherClientId($id)
        {
    
            $sql = "SELECT * FROM user where id_user=".$id;
    
            $db = config::getConnexion();
          
            try {
                $liste = $db->query($sql);
                
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

		function newsusers(){
			$sql="SELECT * FROM user WHERE newsletters_user= '1'";
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function afficherusersR($s){
			$sql='SELECT * FROM user WHERE (Prenom_user LIKE "%'.$s.'%") OR (Nom_user LIKE "%'.$s.'%") OR (Region_user LIKE "%'.$s.'%")';
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function afficherusersFiltreRegion(){
			$sql='SELECT * FROM user ORDER BY Region_user';
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function afficherusersFiltreSexe(){
			$sql='SELECT * FROM user ORDER BY Sexe_user';
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
				die('Erreur:'. $e->getMessage());
			}
		}

		function bloqueruser($id){
			try {
				$db = connexiondb::getConnexion();
				$query = $db->prepare('UPDATE user SET Bloquer_user= :Bloquer_user WHERE id_user= :id');
				$query->execute([
					'Bloquer_user' => "1",
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function debloqueruser($id){
			try {
				$db = connexiondb::getConnexion();
				$query = $db->prepare('UPDATE user SET Bloquer_user= :Bloquer_user WHERE id_user= :id');
				$query->execute([
					'Bloquer_user' => "0",
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
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

		function recuperer_mdp($mail){
			$sql ="SELECT * from user where Email_user= :mail";
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
			$sql ="SELECT * from user where Email_user= :mail AND Mdp_user= :mdp";
			$db = connexiondb::getConnexion();
			$mdp=str_replace("a","_", $mdp);
            $mdp=str_replace("b","-", $mdp);
            $mdp=str_replace("c","!", $mdp);
            $mdp=str_replace("d","?", $mdp);
            $mdp=str_replace("e",",", $mdp);
            $mdp=str_replace("f",";", $mdp);
            $mdp=str_replace("g",":", $mdp);
            $mdp=str_replace("h","+", $mdp);
            $mdp=str_replace("i","*", $mdp);
            $mdp=str_replace("j","&", $mdp);
            $mdp=str_replace("k","é", $mdp);
            $mdp=str_replace("l","è", $mdp);
            $mdp=str_replace("m","ç", $mdp);
            $mdp=str_replace("n","à", $mdp);
            $mdp=str_replace("o","#", $mdp);
            $mdp=str_replace("p","~", $mdp);
            $mdp=str_replace("q","{", $mdp);
            $mdp=str_replace("r","[", $mdp);
            $mdp=str_replace("s","|", $mdp);
            $mdp=str_replace("t","`", $mdp);
            $mdp=str_replace("u","^", $mdp);
            $mdp=str_replace("v","@", $mdp);
            $mdp=str_replace("w","]", $mdp);
            $mdp=str_replace("x","}", $mdp);
            $mdp=str_replace("y","=", $mdp);
            $mdp=str_replace("z","$", $mdp);
            $mdp=str_replace("1","ù", $mdp);
            $mdp=str_replace("2","¤", $mdp);
            $mdp=str_replace("3","%", $mdp);
            $mdp=str_replace("4","£", $mdp);
            $mdp=str_replace("5","¨", $mdp);
            $mdp=str_replace("6","§", $mdp);
            $mdp=str_replace("7",".", $mdp);
            $mdp=str_replace("8","<", $mdp);
            $mdp=str_replace("9",">", $mdp);
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
				$_SESSION['Bloquer_user'] = $user['Bloquer_user'];
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
			$sql="INSERT INTO user ( Nom_user, Prenom_user, Email_user, Mdp_user, Sexe_user, Region_user, newsletters_user, role_user, confirmkey) 
			VALUES ( :Nom_user, :Prenom_user, :Email_user, :Mdp_user, :Sexe_user, :Region_user, :newsletters_user, :role_user, :confirmkey)";
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
					'role_user' => $user->getrole(),
					'confirmkey' => $user->getkey()
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

		function headerr(){
			header('Location:../View/Frontend/profil.php');
		}

	}
?>