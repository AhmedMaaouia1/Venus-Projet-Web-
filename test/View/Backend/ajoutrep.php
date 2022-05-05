<?php require 'Header_Admin.php'; ?>

<?php
    include_once 'C:/xampp/htdocs/code/test/test/Model/Reponse.php';
    include_once 'C:/xampp/htdocs/code/test/test/Controller/ReponseC.php';

   

    // create reclamation
    $Reponse = null;

    // create an instance of the controller
    $ReponseC = new ReponseC();
    if (
        isset($_POST["reply"]) 
		
    ) {
        if (
            !empty($_POST["reply"]) 
			
        ) {
            $Reponse = new Reponse(
                $_POST['reply'],
                $_POST['id_reclamation']
				
            );
            
            if($test == false )
            {
                $ReponseC->ajoutrep($Reponse);
               
                header('Location:liste_reponse.php');
            }
           
    }}
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