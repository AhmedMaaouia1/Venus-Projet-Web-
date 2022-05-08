<?php
    include_once '../../Model/user.php';
    include_once 'userC.php';

    
    $error = "";

    // create user
    $user = null;

    if(isset($_POST["news"]) == "1")
    {
      $news = "1";
    }
    else $news = "0";

    // create an instance of the controller
    $userC = new UserC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
        isset($_POST["email"]) && 
        isset($_POST["mdp"]) &&
        isset($_POST["sexe"]) &&
        isset($_POST["region"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["mdp"]) &&
            !empty($_POST["sexe"]) &&
            !empty($_POST["region"])
        ) {
           
            
            $longueurKey = 7;
                $key = "";
                for($i=1;$i<$longueurKey;$i++)
                {
                    $key .= mt_rand(0, 9);
                }
            $user = new User(
				$_POST['nom'],
                $_POST['prenom'], 
                $_POST['email'],
                $_POST['mdp'],
                $_POST['sexe'],
                $_POST['region'],
                $news,
                $key
            );
            $mail= $user->getEmail();
            $mdp=$user->getMdp();
            $test = $userC->verification($mail);
            $test1= $userC->check_mdp_format($mdp);
            
            $user->setMdp(str_replace("a","_", $user->getMdp()));
            $user->setMdp(str_replace("b","-", $user->getMdp()));
            $user->setMdp(str_replace("c","!", $user->getMdp()));
            $user->setMdp(str_replace("d","?", $user->getMdp()));
            $user->setMdp(str_replace("e",",", $user->getMdp()));
            $user->setMdp(str_replace("f",";", $user->getMdp()));
            $user->setMdp(str_replace("g",":", $user->getMdp()));
            $user->setMdp(str_replace("h","+", $user->getMdp()));
            $user->setMdp(str_replace("i","*", $user->getMdp()));
            $user->setMdp(str_replace("j","&", $user->getMdp()));
            $user->setMdp(str_replace("k","é", $user->getMdp()));
            $user->setMdp(str_replace("l","è", $user->getMdp()));
            $user->setMdp(str_replace("m","ç", $user->getMdp()));
            $user->setMdp(str_replace("n","à", $user->getMdp()));
            $user->setMdp(str_replace("o","#", $user->getMdp()));
            $user->setMdp(str_replace("p","~", $user->getMdp()));
            $user->setMdp(str_replace("q","{", $user->getMdp()));
            $user->setMdp(str_replace("r","[", $user->getMdp()));
            $user->setMdp(str_replace("s","|", $user->getMdp()));
            $user->setMdp(str_replace("t","`", $user->getMdp()));
            $user->setMdp(str_replace("u","^", $user->getMdp()));
            $user->setMdp(str_replace("v","@", $user->getMdp()));
            $user->setMdp(str_replace("w","]", $user->getMdp()));
            $user->setMdp(str_replace("x","}", $user->getMdp()));
            $user->setMdp(str_replace("y","=", $user->getMdp()));
            $user->setMdp(str_replace("z","$", $user->getMdp()));
            $user->setMdp(str_replace("1","ù", $user->getMdp()));
            $user->setMdp(str_replace("2","¤", $user->getMdp()));
            $user->setMdp(str_replace("3","%", $user->getMdp()));
            $user->setMdp(str_replace("4","£", $user->getMdp()));
            $user->setMdp(str_replace("5","¨", $user->getMdp()));
            $user->setMdp(str_replace("6","§", $user->getMdp()));
            $user->setMdp(str_replace("7",".", $user->getMdp()));
            $user->setMdp(str_replace("8","<", $user->getMdp()));
            $user->setMdp(str_replace("9",">", $user->getMdp()));
            
            if($test == false &&  $test1 == true)
            {
                $userC->ajouteruser($user);
                $header="MIME-VERSION: 1.0\r\n";
                $header.='From:"Venus.com"<venus@esprit.tn>'."\n";
                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';

                $message='
                <html>
                   <body>
                       <div align="center">
                            <p>Votre Code est : '.$key.'</p>
                           <a href="http://localhost:8000/test/View/Frontend/verif.php?email='.urlencode($mail).'&key='.$key.'">Confirmez votre compte !</a>
                           
                       </div>
                   </body>
                </html>
                ';

                mail($mail, "Confirmation de compte..", $message, $header);

                header('Location:../View/Frontend/connexion.php');
            }
            else if ($test1 == false)
            {
                $error1= "Format non correct, mot de passe doit contenir un chiffre, un caractére majuscule et un minuscule";
                header('Location:../View/Frontend/inscription.php?error1=error1');
            }
            else
            header('Location:../View/Frontend/inscription.php?error=error');
            
            
        }
        else
            $error = "Manque d'informations, Veuillez remplir tout les champs.";
            echo $error;
    }

    
?>