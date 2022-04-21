<?php
    require 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/commentsC.php';

    $commentsC = new commentsC();
    $commentsC->supprimercomments($_GET['id']);
    header('Location:liste_commentaire.php');
?>