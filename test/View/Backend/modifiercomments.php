<?php require 'Header_Admin.php'; ?>
<?php

require_once     'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/commentsC.php';
require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Model/comments.php' ;
require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/TopicC.php';
$commentsV=new commentsC();
$b=$_GET['idcom'];
echo $_GET['idcom'];

if (isset($_POST['contenu'])) 
{           
    echo $_GET['idcom'];
        
         $Comments = new comments(NULL,$_POST['id_topic'], $_POST['contenu']);
         $commentsV->modifiercomments($Comments,$b);
        header('Location:liste_commentaire.php');
}
else {
    $x=$commentsV->getcommentsbyID($b);
    echo $_GET['idcom'];

}

?>

<!doctype html>
<html lang="en">
 
<head>

</head>

<body>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid">
                                                <br><br><br>
                                    <form action="" method="POST">
                                            <table border="1" align="center">
                                               
                                                <tr>
                                                    <td>
                                                        <label for="contenu">contenu :
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $x['contenu']; ?>" name="contenu" id="contenu" ></td>
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
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
</body>
 
</html>