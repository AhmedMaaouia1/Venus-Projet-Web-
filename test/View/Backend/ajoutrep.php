<?php require 'Header_Admin.php'; ?>
<?php
include 'C:/xampp/htdocs/code/test/test/Controller/ReponseC.php';
require_once 'C:/xampp/htdocs/code/test/test/Model/Reponse.php';
   
if (isset($_POST["reply"])) 

{
    $Reponse = new Reponse($_POST['reply']);
        $ReponseC = new ReponseC();
        $ReponseC->ajouterrep($Reponse);
        header('Location:liste_reponse.php');
}
?>
<HTML>
    <head>
    </head>

    <body>
    <h1>ajouter reponse</h1>
    <form action="" method="POST">
                                        <table border="1" align="center">
                                           
                                            <tr>
                                                <td>
                                                    <label for="reply">reply:
                                                    </label>
                                                </td>
                                                <td><input type="text" name="reply" id="reply" maxlength="50"></td>
                                            </tr>
                                            
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