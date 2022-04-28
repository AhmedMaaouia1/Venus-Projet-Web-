<?php require 'Header_Admin.php'; ?>
<?php
include 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/topicC.php';
require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Model/topic.php';
   
if (isset($_POST['titre'] ) && isset($_POST['description'] ) && isset($_POST['contenu'] )) 
{
        $Topic = new topic( $_POST['titre'] ,$_POST['description'] ,$_POST['contenu']);
        $TopicC = new topicC();
        $TopicC->ajoutertopic($Topic);
        header('Location:liste_forum.php');
}
?>
<HTML>
    <head>
    </head>

    <body>
    <h1>ajouter un Forum</h1>
    <form action="" method="POST" id ="myform">
                                        <table border="1" align="center">
                                           
                                            <tr>
                                                <td>
                                                    <label for="titre">titre:
                                                    </label>
                                                </td>
                                                <td><input type="text" name="titre" id="titre" maxlength="50"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="description">description:
                                                    </label>
                                                </td>
                                                <td><input type="text" name="description" id="description" ></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="contenu">contenu :
                                                    </label>
                                                </td>
                                                <td><input type="text" name="contenu" id="contenu" maxlength="1000"></td>
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
                                    <p style="color: red;" id="erreur"></p>  
                                    <script src="assets/js/Forum.js"></script>
    </body>
</HTML>

