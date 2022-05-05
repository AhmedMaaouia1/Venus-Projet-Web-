 </*?php require 'Header_Admin.php'; */?>
</*?php

require_once 'C:/xampp/htdocs/code/test/test/Model/Reponse.php';
    require_once 'C:/xampp/htdocs/code/test/test/Controller/ReponseC.php';
require_once 'C:/xampp/htdocs/code/test/test/Controller/ReclamationC.php';
$reponseV=new ReponseC();
$b=$_GET['id_reponse'];
echo $_GET['id_reponse'];

if (isset($_POST['reply'])) 
{           
    echo $_GET['id_reponse'];
        
         $Reponse = new Reponse(NULL,$_POST['id_rec'], $_POST['reply']);
         $reponseV->modifierrep($Reponse,$b);
        header('Location:liste_reponse.php');
}
else {
    $x=$reponseV->getrepbyID($b);
    echo $_GET['id_reponse'];

}

?*/>
 <!--
<!doctype html>
<html lang="en">
 
<head>

</head>

<body>-->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
         <!--  <div class="dashboard-wrapper">
            <div class="container-fluid">
                                                <br><br><br>
                                    <form action="" method="POST">
                                            <table border="1" align="center">
                                               
                                                <tr>
                                                    <td>
                                                        <label for="reply">reply :
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="/*</*?php echo $x['reply']; ?>*/" name="reply" id="reply" ></td>
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
    </div>-->

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
 <!--</body> -->
 
</html>
<?php require 'Header_Admin.php'; ?>
<?php

require_once 'C:/xampp/htdocs/code/test/test/Controller/ReponseC.php';
require_once 'C:/xampp/htdocs/code/test/test/Model/Reponse.php' ;
$reponseV=new reponseC();
$b=$_GET['id_reponse'];

if (isset($_POST['reply']) ) 
{           
         $reponse = new reponse(NULL, $_POST['reply']);
         $reponseV->modifierrep($reponse,$b);
        header('Location:liste_reponse.php');
}
else {
    $x=$reponseV->getrepbyID($b);
}

?>

<!DOCTYPE html>
<html lang="en">


<body class="">
<div class="dashboard-wrapper">
            <div class="container-fluid">
                                                <br><br><br>
                                    <form action="" method="POST">
                                            <table border="1" align="center">
                                               
                                                <tr>
                                                    <td>
                                                        <label for="reply">reply :
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $x['reply']; ?>" name="reply" id="reply" ></td>
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


</html>
