<?php
session_start();

    include_once '../Model/user.php';
    include_once 'userC.php';
    include_once 'C:/xampp/htdocs/1/test/View/connexiondb.php';
$db = connexiondb::getConnexion();

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new UserC();
    if (
		
        isset($_POST["email"]) 
    ) {
        if (
            !empty($_POST["email"]) 
        ) {
            
            
            $mail= $_POST["email"];
            
            
            $test = $userC->verification($mail);
            if(!$test){
                $error = "Manque d'informations, Veuillez remplir tout les champs.";
                echo $error;
            }
            else
            {
                $user = $userC->recuperer_mdp($mail);
                        if($user['Bloquer_user'] == "1"){
                            header('Location:../View/Frontend/recuperation_mdp.php?error2=error2');
                        }
                        else if(($mail == "admin.admin@esprit.tn"))
                        {
                            header('Location:../View/Backend/listclient.php');
                        }
                        else if($test)
                        { 
                            $mdp = $user['Mdp_user']; 
                            $mdp=str_replace("_","a", $mdp);
                            $mdp=str_replace("-","b", $mdp);
                            $mdp=str_replace("!","c", $mdp);
                            $mdp=str_replace("?","d", $mdp);
                            $mdp=str_replace(",","e", $mdp);
                            $mdp=str_replace(";","f", $mdp);
                            $mdp=str_replace(":","g", $mdp);
                            $mdp=str_replace("+","h", $mdp);
                            $mdp=str_replace("*","i", $mdp);
                            $mdp=str_replace("&","j", $mdp);
                            $mdp=str_replace("é","k", $mdp);
                            $mdp=str_replace("è","l", $mdp);
                            $mdp=str_replace("ç","m", $mdp);
                            $mdp=str_replace("à","n", $mdp);
                            $mdp=str_replace("#","o", $mdp);
                            $mdp=str_replace("~","p", $mdp);
                            $mdp=str_replace("{","q", $mdp);
                            $mdp=str_replace("[","r", $mdp);
                            $mdp=str_replace("|","s", $mdp);
                            $mdp=str_replace("`","t", $mdp);
                            $mdp=str_replace("^","u", $mdp);
                            $mdp=str_replace("@","v", $mdp);
                            $mdp=str_replace("]","w", $mdp);
                            $mdp=str_replace("}","x", $mdp);
                            $mdp=str_replace("=","y", $mdp);
                            $mdp=str_replace("$","z", $mdp);
                            $mdp=str_replace("ù","1", $mdp);
                            $mdp=str_replace("¤","2", $mdp);
                            $mdp=str_replace("%","3", $mdp);
                            $mdp=str_replace("£","4", $mdp);
                            $mdp=str_replace("¨","5", $mdp);
                            $mdp=str_replace("§","6", $mdp);
                            $mdp=str_replace(".","7", $mdp);
                            $mdp=str_replace("<","8", $mdp);
                            $mdp=str_replace(">","9", $mdp);         
                            $header="MIME-VERSION: 1.0\r\n";
                            $header.='From:"Venus.com"<venus@esprit.tn>'."\n";
                            $header.='Content-Type:text/html; charset="uft-8"'."\n";
                            $header.='Content-Transfer-Encoding: 8bit';

                            $message='
                            <html>
                            <body>
                                <div align="center">
                                <p>Votre Mot de passe est : '.$mdp.'</p>
                                <a href="http://localhost:8000/test/View/Frontend/connexion.php?email='.urlencode($mail).'&mdp='.$mdp.'">Pour connecter cliquer ici!</a>
                                    
                                </div>
                            </body>
                            </html>
                            ';

                            mail($mail, "Récuperation du mot de passe..", $message, $header);
                            header('Location:../View/Frontend/connexion.php?error4=error4');
                        }
                        else
                        header('Location:../View/Frontend/connexion.php?error=error');
                        
                        
         }
            
    }

}
?>