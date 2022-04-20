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
                                    <form action="" method="POST">
                                            <table border="1" align="center">
                                                <tr>
                                                    <td>
                                                        <label for="titre">titre:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['titre'];?>" name="titre" id="titre" maxlength="20"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="descrip">description:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['descrip'];?>" name="descrip" id="descrip" maxlength="40"></td>
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
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script>
    $(document).ready(function() {

        // binding the check all box to onClick event
        $(".chk_all").click(function() {

            var checkAll = $(".chk_all").prop('checked');
            if (checkAll) {
                $(".checkboxes").prop("checked", true);
            } else {
                $(".checkboxes").prop("checked", false);
            }

        });

        // if all checkboxes are selected, then checked the main checkbox class and vise versa
        $(".checkboxes").click(function() {

            if ($(".checkboxes").length == $(".subscheked:checked").length) {
                $(".chk_all").attr("checked", "checked");
            } else {
                $(".chk_all").removeAttr("checked");
            }

        });

    });
    </script>
</body>
 
</html>