<?php
  require_once '../../dbconfig.php';
  
  require_once '../../config.php';
    class categorieC {
        public function affichercategorie() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getcategorieById($idcategorie) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie WHERE id = :id'
                );
                $query->execute([
                    'id' => $idcategorie
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getidcategorieByNom($Nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie WHERE Nom = :Nom'
                );
                $query->execute([
                    'Nom' => $Nom
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function addcategorie($categorie) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO categorie (nom, image) 
                VALUES (:nom, :image)'
                );
                $query->execute([
                    'nom' => $categorie->getNom(),
                    'image' => $categorie->getImage()
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updatecategorie($categoriei, $idcategorie) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE categorie SET Nom = :Nom, prix = :prix, image = :image WHERE id = :id'
                );
                $query->execute([
                    'Nom' => $categorie->getNom(),
                    'prix' => $categorie->getPrix(),
                    'image' => $categorie->getImage(),
                    'id' => $idcategorie
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deletecategorie($idcategorie) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM categorie WHERE id = :id'
                );
                $query->execute([
                    'id' => $idcategorie
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function recherchercategorie($Nom) {            
            $sql = "SELECT * from categorie where nom=:nom"; 
            $db = getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nom' => $Nom->getNom(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        function modifiercategorie($categorie, $idcategorie){
            try {
                $db = getConnexion();
                $query = $db->prepare(
                    'UPDATE categorie SET 
                        nom = :nom, 
                        image = :image
                        
                    WHERE id = :id'
                );
                
                $query->bindValue(':nom',$categorie->getNom());
    
                $query->bindValue(':image',$categorie->getImage());
               
                $query->bindValue(':id',$idcategorie);
                $query->execute();
                echo "<script>alert(\"Modification appliqué\")</script>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    
    
        function recuperercategorie($idcategorie){
            $sql="SELECT * from categorie where id=$idcategorie";
            $db = getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
    
                $categorie=$query->fetch();
                return $categorie;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function tricategoriesNom(){
            $sql="SELECT * FROM categorie order by Nom";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }
        function tricategoriesprix(){
            $sql="SELECT * FROM categorie order by prix";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }
        function tricategoriesqty(){
            $sql="SELECT * FROM categorie order by qty";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function searchcategories($nom){
			
            $sql="SELECT * FROM categorie where nom like '$nom%' or id like '$nom%'";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }
    }
