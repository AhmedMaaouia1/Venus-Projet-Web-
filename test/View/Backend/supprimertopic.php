<?php
    require '../../Controller/topicC.php';

    $topicC = new topicC();
    $topicC->supprimertopic($_GET['id']);
    header('Location:liste_forum.php');
?>