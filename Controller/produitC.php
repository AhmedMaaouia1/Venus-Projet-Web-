<?php
	include 'C:/xampp/htdocs/test/View/connexiondb.php';
	include_once '../Model/produit.php';
	class ProduitC {
		function afficherproduit(){
			$sql="SELECT * FROM produit";
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerproduit($id){
			$sql="DELETE FROM produit WHERE id_produit=:id";
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

       
		function ajouterproduit($produit){
			$sql="INSERT INTO produit ( Nom_produit, image_produit, prix_produit, desp_produit) 
			VALUES ( :Nom_produit, :image_produit, :prix_produit, :desp_produit)";
			$db = connexiondb::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
					'Nom_produit' => $produit->getNom(),
					'image_produit' => $produit->getimage(),
					'prix_produit' => $produit->getprix(),
					'desp_produit' => $produit->getdesp(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		
		function modifierproduit($produit, $id){
			try {
				$db = connexiondb::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
						Nom_produit= :Nom, 
						image_produit= :image, 
						prix_produit= :prix, 
						desp_produit= :desp, 
						
					WHERE id_produit= :id'
				);
				$query->execute([
					'Nom_produit' => $user->getNom(),
					'image_produit' => $user->getimage(),
					'prix_produit' => $user->getprix(),
                    'desp_produit' => $user->getdesp(),

					'id_user' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>