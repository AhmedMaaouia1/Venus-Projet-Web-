<?php
    require 'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/topicC.php';

    $topicC = new topicC();
    $topicC->supprimertopic($_GET['id']);
    header('Location:liste_forum.php');
?>