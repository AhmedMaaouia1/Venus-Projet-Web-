<?php
	require_once '../../dbconfig.php';
    require_once '../../config.php';
	require_once '../../Model/commande.php';


 class commandeC {
   
    function affichercommande()
    {
        $sql="SELECT * From commande ORDER BY id_commande ";
        $db = config::getConnexion();
        try
        {
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }   
    }

    function affichernomproduit($id)
    {
        $sql="SELECT Nom From produit where id= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try
        {
            
        $req->execute();
        $liste=$req->fetch();
        return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }   
    }

    function ajoutercommande($commande){
        $sql="INSERT INTO commande (id, id_user) 
        VALUES (:id, :id_user)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'id' => $commande->getid(),
                'id_user' => $commande->getid_user()    
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
    

    function supprimercommande($id_commande)
    {
        $sql="DELETE FROM commande where id_commande= :id ";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id_commande);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifiercommande($commande, $id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    prenom = :prenom, 
                    nom = :nom, 
                    tel = :tel,
                    adresse = :adresse,
                   
                   
                    email = :email
                   
                   
                WHERE id = :id'
            );
            $query->execute([
                'prenom' => $commande->getprenom(),
                'nom' => $commande->getnom(),
                'tel' => $commande->gettel(),
                'adresse' => $commande->getadresse(),
         
                
                'email' => $commande->getemail(),

               

                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recupereretat($id)
    {
        $sql="SELECT * from commande where id=$id";
        $db = config::getConnexion();
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

    function trierdesc(){
			
        $sql="SELECT * FROM commande ORDER BY total DESC";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function trierasc(){
			
        $sql="SELECT * FROM commande ORDER BY total ASC";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function recherchernom($nom){
		$sql="SELECT * From commande WHERE nom= '$nom' ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}	
	}

   

 }

?>