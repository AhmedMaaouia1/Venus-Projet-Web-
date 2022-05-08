<?php

    require_once '../../View/connexiondb.php';
    require_once '../../Model/topic.php';


    Class topicC {

    

        function affichertopic()
        {
            $requete = "select * from topic";
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
        
        
        function gettopicbyID($id)
        {
            $requete = "select * from Topic where idtopic=:id";
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

        function ajoutertopic($Topic)
        {
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                INSERT INTO Topic 
                (titre,descrip,contenu)
                VALUES
                (:titre,:descrip,:contenu)
                ');
                $querry->execute([
                    'titre'=>$Topic->gettitre(),
                    'descrip'=>$Topic->getdescrip(),
                    'contenu'=>$Topic->getcontenu(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiertopic($Topic,$idtopic)
        {
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                UPDATE Topic SET
                titre=:titre,descrip=:descrip,contenu=:contenu

                where idtopic=:idtopic
                ');
                $querry->execute([
                    'idtopic'=>$idtopic,
                    'titre'=>$Topic->gettitre(),
                    'descrip'=>$Topic->getdescrip(),
                    'contenu'=>$Topic->getcontenu(),


                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimertopic($id)
        {
            $connexionDB = connexionDB::getConnexion();
            try {
                $querry = $connexionDB->prepare('
                DELETE FROM Topic WHERE idtopic =:id
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