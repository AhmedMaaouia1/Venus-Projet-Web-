<?php

    require_once '../assets/Utils/config.php';
    require_once '../model/comments.php';


    Class commentsC {

   
        public function afficherTcomments($idtopic){
            try{
                $config = config::getConnexion();
                $querry = $config->prepare(
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
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
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
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
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
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
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
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
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
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
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