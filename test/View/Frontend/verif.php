<?php 
include_once '../../View/connexiondb.php';
$db = connexiondb::getConnexion();
if(isset($_GET['email'], $_GET['key']) AND !empty($_GET['email']) AND !empty($_GET['key']))
{
    $email =  htmlspecialchars(urldecode($_GET['email']));
    $key = intval($_GET['key']);
    $requser = $db->prepare("SELECT * FROM user WHERE Email_user = ? AND confirmkey = ? ");
    $requser->execute(array($email, $key));
    $userexist = $requser->rowCount();
    if($userexist == 1)
    {
        $user = $requser->fetch();
        if($user['confirm'] == 0){
            $updateuser = $db->prepare("UPDATE user SET confirm = 1 WHERE Email_user = ? AND confirmkey = ?");
            $updateuser->execute(array($email,$key));
            echo "Votre compte a été bien confirmé";

        } else {
            echo "Votre compte a déja été confirmé";
        }
    } else {
        echo "L'utilisateur n'existe pas !";
    }
}

?>