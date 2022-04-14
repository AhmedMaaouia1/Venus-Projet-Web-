<?php require 'Header_Admin.php'; ?>
<?php
include 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/topicC.php';
require_once 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Model/topic.php';
   
$error = "";

    // create adherent
    $topic = null;

    // create an instance of the controller
    $topicC = new topicC();
    if (
        isset($_POST["titre"]) &&
		isset($_POST["descrip"]) &&		
        isset($_POST["contenu"]) 
	
    ) {
        if (
            !empty($_POST["titre"]) && 
			!empty($_POST['descrip']) &&
            !empty($_POST["contenu"]) 
        ) {
            $topic = new Topic(
                $_POST['titre'],
				$_POST['descrip'],
                $_POST['contenu'], 
				
            );
            $topicC->modifiertopic($Topic, $_POST["idtopic"]);
            header('Location:liste_forum.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
    <a href="liste_forum.php" class="btn btn" style="background-color:#fd6c9e;color:white" >retourner </a>
      
        
        
		<?php
			if (isset($_POST['idtopic'])){
				$Topic = $topicC->recuperertopic($_POST['idtopic']);
				
		?>
        
        <form action="" method="POST">
                                            <table border="1" align="center">
                                                
                                                <tr>
                                                    <td>
                                                        <label for="titre">titre:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $Topic['titre'];?>" name="titre" id="titre" maxlength="20"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="descrip">description:
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $Topic['descrip'];?>" name="descrip" id="descrip" maxlength="40"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="contenu">contenu :
                                                        </label>
                                                    </td>
                                                    <td><input type="text" value="<?php echo $Topic['contenu'];?>" name="contenu" id="contenu" ></td>
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
		<?php
		}
		?>
    </body>
</html>