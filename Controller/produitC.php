<?php
    require_once '../../dbconfig.php';
    
    require_once '../../config.php';
    class produitC {
        public function afficherproduit() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT produit.*,categorie.nom FROM produit inner join categorie on produit.idcat=categorie.id'

                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        

        public function QuantityProd($id,$quan){
try{
    $pdo = getConnexion();
$req = $pdo->prepare("Select qty from produit where id=".$id);

  
  $req -> execute();
  $qty = $req -> fetch();

  if ((int)$qty['qty'] < 1){
var_dump((int)$qty['qty']);
    return false ;
  }else {
$query = $pdo -> prepare("UPDATE produit Set qty = :q - :q2 where id=".$id);

$query ->execute([
    'q'=>(int)$qty['qty'],
    'q2'=>$quan
]);
return true;
  }
}catch(PDOException $ex){

    $ex -> getMessage();
}

        }
        public function QuantityProd2($id,$quan){
            try{
                $pdo = getConnexion();
            $req = $pdo->prepare("Select qty from produit where id=".$id);
            
              
              $req -> execute();
              $qty = $req -> fetch();
            
              if ((int)$qty['qty'] < 1){
            var_dump((int)$qty['qty']);
                return false ;
              }else {
            
            return true;
              }
            }catch(PDOException $ex){
            
                $ex -> getMessage();
            }
            
                    }


                    public function QuantityProdMax($id){
                        try{
                            $pdo = getConnexion();
                        $req = $pdo->prepare("Select qty from produit where id=".$id);
                        
                          
                          $req -> execute();
                          $qty = $req -> fetch();
                        return (int)$qty['qty'];
                         
                        }catch(PDOException $ex){
                        
                            $ex -> getMessage();
                        }
                        
                                }
        public function getproduitById($idproduit) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM produit WHERE id = :id'
                );
                $query->execute([
                    'id' => $idproduit
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getidproduitByNom($Nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM produit WHERE Nom = :Nom'
                );
                $query->execute([
                    'Nom' => $Nom
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function addproduit($produit) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO produit (Nom,image, qty,prix,idcat) 
                VALUES (:Nom, :image, :qty, :prix,:idcat)'
                );
                $query->execute([
                    'Nom' => $produit->getNom(),
                    'image' => $produit->getImage(),
                    'qty' => $produit->getqte(),
                    'prix' => $produit->getPrix(),
                    
                    'idcat' =>$produit->getcate()
                    
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateproduit($produiti, $idproduit) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE produit SET Nom = :Nom, prix = :prix, image = :image WHERE id = :id'
                );
                $query->execute([
                    'Nom' => $produit->getNom(),
                    'prix' => $produit->getPrix(),
                    'image' => $produit->getImage(),
                    'id' => $idproduit
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteproduit($idproduit) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM produit WHERE id = :id'
                );
                $query->execute([
                    'id' => $idproduit
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherproduit($Nom) {            
            $sql = "SELECT * from produit where Nom=:Nom"; 
            $db = getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'Nom' => $Nom->getNom(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        function modifierproduit($produit, $idproduit){
            try {
                $db = getConnexion();
                $query = $db->prepare(
                    'UPDATE produit SET 
                        Nom = :Nom, 
                        prix = :prix,
                        qty = :qty,
                        image = :image,
                        idcat =:idcat,
                        
                    WHERE id = :id'
                );
                
                $query->bindValue(':Nom',$produit->getNom());
                $query->bindValue(':prix',$produit->getPrix());
                $query->bindValue(':qty',$produit->getqte());
    
                $query->bindValue(':image',$produit->getImage());
                $query->bindValue(':idcat',$produit->getcate());
               
                $query->bindValue(':id',$idproduit);
                $query->execute();
                echo "<script>alert(\"Modification appliqué\")</script>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    
    
        function recupererproduit($idproduit){
            $sql="SELECT * from produit where id=$idproduit";
            $db = getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
    
                $produit=$query->fetch();
                return $produit;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function triproduitsNom(){
            $sql="SELECT * FROM produit order by Nom";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }
        function triproduitsprix(){
            $sql="SELECT * FROM produit order by prix";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }
        function triproduitsqty(){
            $sql="SELECT * FROM produit order by qty";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function searchproduits($nom){
			
            $sql="SELECT * FROM produit where nom like '$nom%' or id like '$nom%'";
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
