<?php require 'Header_Admin.php'; ?>
<?php

require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/topicC.php';
require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Model/topic.php' ;

$TopicC = new topicC();

$topic_list = $TopicC->affichertopic();;


if (isset($_GET['id'] ) && isset($_POST['titre'] ) && isset($_POST['descrip'] ) && isset($_POST['contenu'] )) 
{
        
        $Topic = new topic($_POST['titre'] ,$_POST['descrip'],$_POST['contenu']);
        $TopicC->modifiertopic($Topic, $_GET['id']);
        echo $_GET['id'];
        header('Location:liste_forum.php');
}else
{
    $a = $TopicC->gettopicbyID($_GET['id']) ;
}


?>


<!doctype html>
<html lang="en">
 
<head>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid">
                                                <br><br><br>
                                    <form action="" method="POST" id="myform">
                                            <table border="1" align="center">
                                                <tr>
                                                    <td>
                                                        <label for="titre">titre:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['titre'];?>" name="titre" id="titre"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="descrip">description:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['descrip'];?>" name="descrip" id="description"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="contenu">contenu :
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['contenu'];?>" name="contenu" id="contenu" ></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="submit" value="Modifier"> 
                                                    </td>
                                                    <td>
                                                        <input type="reset" value="Annuler" >
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                        <p style="color: red;" id="erreur"></p>  
                                    <script src="assets/js/Forum.js"></script>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
 
</body>
 
</html>