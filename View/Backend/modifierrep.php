
</html>
<?php require 'Header_Admin.php'; ?>
<?php

require_once 'C:/xampp/htdocs/test/Controller/ReponseC.php';
require_once 'C:/xampp/htdocs/test/Model/Reponse.php' ;
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
