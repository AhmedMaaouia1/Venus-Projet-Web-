<?php require 'Header_Admin.php'; ?>
<?php

include_once 'C:/xampp/htdocs/test/Model/Reclamation.php';
require_once 'C:/xampp/htdocs/test/Controller/ReclamationC.php';

$ReclamationV = new ReclamationC();


$Reclamation_liste = $ReclamationV->afficherrec();


if (isset($_GET['id'] ) 
&& isset($_POST['prenom_reclamation'] ) 
&& isset($_POST['nom_reclamation'] ) 
&& isset($_POST['mail_reclamation'] )
&& isset($_POST['sujet_reclamation']) 
&& isset($_POST['message_reclamation'] )
) 
{
        
        $Reclamation=new Reclamation($_POST['prenom_reclamation'] ,$_POST['nom_reclamation'],$_POST['mail_reclamation'],
        $_POST['sujet_reclamation'],$_POST['message_reclamation']);
        $ReclamationV->modifierrec($Reclamation, $_GET['id']);
        echo $_GET['id'];
        header('Location:liste_reclamations.php');
}else
{
    $a = $ReclamationV->recupererrec($_GET['id']) ;
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
                                                        <label for="prenom_reclamation">Prenom:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['prenom_reclamation'];?>" name="prenom_reclamation" id="prenom_reclamation" maxlength="20"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="nom_reclamation">Nom:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['nom_reclamation'];?>" name="nom_reclamation" id="nom_reclamation" maxlength="40"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="mail_reclamation">Mail:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['mail_reclamation'];?>" name="mail_reclamation" id="mail_reclamation" ></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="sujet_reclamation">Sujet:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['sujet_reclamation'];?>" name="sujet_reclamation" id="sujet_reclamation" ></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="message_reclamation">Message:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $a['message_reclamation'];?>" name="message_reclamation" id="message_reclamation" ></td>
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