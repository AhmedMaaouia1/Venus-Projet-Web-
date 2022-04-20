<?php require 'Header_Admin.php'; ?>
<?php
include 'C:/xampp/htdocs/code/test/test/Controller/ReclamationC.php';
require_once 'C:/xampp/htdocs/code/test/test/Model/Reclamation.php';
   
if (isset($_POST["prenom_reclamation"]) &&	
isset($_POST["nom_reclamation"]) &&	
isset($_POST["mail_reclamation"]) &&	
isset($_POST["sujet_reclamation"]) && 
isset($_POST["message_reclamation"])) 
{
    $reclamation = new Reclamation(
        $_POST['prenom_reclamation'],
        $_POST['nom_reclamation'],
        $_POST['mail_reclamation'], 
        $_POST['sujet_reclamation'],
        $_POST['message_reclamation']);
        $ReclamationC = new ReclamationC();
        $ReclamationC->ajouterrec($Reclamation);
        header('Location:liste_reclamation.php');
}
?>
<HTML>
    <head>
    </head>

    <body>
    <h1>ajouter un rec</h1>
    <form action="" method="POST">
                                        <table border="1" align="center">
                                           
                                            <tr>
                                                <td>
                                                    <label for="prenom_reclamation">prenom_reclamation:
                                                    </label>
                                                </td>
                                                <td><input type="text" name="prenom_reclamation" id="prenom_reclamation" maxlength="50"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="nom_reclamation">nom_reclamation:
                                                    </label>
                                                </td>
                                                <td><input type="text" name="nom_reclamation" id="nom_reclamation" ></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="mail_reclamation">mail_reclamation :
                                                    </label>
                                                </td>
                                                <td><input type="text" name="mail_reclamation" id="mail_reclamation" maxlength="1000"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="sujet_reclamation">sujet_reclamation :
                                                    </label>
                                                </td>
                                                <td><input type="text" name="sujet_reclamation" id="sujet_reclamation" maxlength="1000"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="message_reclamation">message_reclamation :
                                                    </label>
                                                </td>
                                                <td><input type="text" name="message_reclamation" id="message_reclamation" maxlength="1000"></td>
                                            </tr>   
                                            <tr>
                                                <td>
                                                    <input type="submit" value="Envoyer"> 
                                                </td>
                                                <td>
                                                    <input type="reset" value="Annuler" >
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
    </body>
</HTML>