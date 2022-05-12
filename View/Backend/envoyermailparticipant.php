<?php 
include_once '../../Controller/userC.php';
include_once '../../Model/user.php';
include_once 'C:/xampp/htdocs/test/View/connexiondb.php';
$db = connexiondb::getConnexion();


	$userC=new UserC();
	
	$listeusers=$userC->newsusers(); 

    foreach($listeusers as $user){

$header="MIME-VERSION: 1.0\r\n";
$header.='From:"Venus.com"<venusshop432@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
<html>
   <body>
       <div align="center">
            <p>Votre Participation est validee </p>
           <a href="https://www.elle.fr/Newsletters?email='.urlencode($user['Email_user']).'">Pour lire notre article cliquer ici!</a>
           
       </div>
   </body>
</html>
';

mail($user['Email_user'], "Newsletter..", $message, $header);
    }
    header('Liste_Participants.php');
?>