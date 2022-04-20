<?php

require_once     'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/commentsC.php';
require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Model/comments.php' ;
require_once 'C:/xamp/htdocs/ESSAI 1 INTEGRATION/test/Controller/TopicC.php';

if (isset($_POST['idcom'] ) && isset($_POST['id_topic'] ) && isset($_POST['contenu'] )) 
{
        $Comments = new comments(NULL, $_POST['idcom'], $_POST['id_topic'], $_POST['contenu']);
        $CommentsC = new commentsC();
        $CommentsC->ajoutercomments($Comments);
        header('Location:C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/View/Backend/liste_commentaire.php');
}




?>

<!doctype html>
<html lang="en">
 
<head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
   
</head>

<body>
    
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid">
                                            
            <br><br><br><br>
                                <form action="" method="POST">
                                        <table border="1" align="center">
                                            <tr>
                                                <td>
                                                    <label for="contenu">contenu :
                                                    </label>
                                                </td>
                                                <td><input type="text" name="contenu" id="contenu" maxlength="20"></td>
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
    
             </div>
        </div>
    </div>

  
</body>
<?php require 'Footer.php'; ?>
</html>