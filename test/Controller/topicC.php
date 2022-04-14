<?php

include 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/View/connexiondb.php';
    include "C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Model/topic.php";
    


    Class topicC {

    

        function affichertopic()
        {
            $requete = "select * from topic";
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare($requete);
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
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare($requete);
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
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare('
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
        function modifiertopic($Topic)
        {
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare('
                UPDATE Topic SET
                titre=:titre,descrip=:descrip,contenu=:contenu

                where idtopic=:idtopic
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

        function supprimertopic($id)
        {
            $connexiondb = connexiondb::getConnexion();
            try {
                $querry = $connexiondb->prepare('
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