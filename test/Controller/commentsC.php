<?php

    require_once '../../View/connexiondb.php';
    require_once '../../Model/comments.php';


    Class commentsC {

   
        public function afficherTcomments($idtopic){
            try{
                $connexionDB = connexionDB::getConnexion();
                $querry = $connexionDB->prepare(
                    'SELECT * FROM comments where id_topic =:id'
                );
                $querry->execute([
                    'id'=>$idtopic
                ]);
                return $querry->fetchAll();
            }catch (PDOException $e){
                $e -> getMessage();
            }
        } 
        function affichercomments()
        {
            $requete = "select * from comments";
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function getcommentsbyID($id)
        {
            $requete = "select * from comments where idcom=:id";
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajoutercomments($Comments)
        {
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                INSERT INTO comments 
                (idcom,id_topic,contenu)
                VALUES
                (:idcom,:id_topic,:contenu)
                ');
                $querry->execute([
                    'idcom'=>$Comments->getidcom(),
                    'id_topic'=>$Comments->getid_topic(),
                    'contenu'=>$Comments->getcontenu(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiercomments($Comments,$idcom)
        {
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                UPDATE Comments SET
                contenu=:contenu
                where idcom=:idcom
                ');
                $querry->execute([
                    'idcom'=>$idcom,
                    'contenu'=>$Comments->getcontenu(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimercomments($id)
        {
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                DELETE FROM Comments WHERE idcom =:id
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