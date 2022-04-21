<?php
//session_start();
require_once '../../cnx.php';
if (isset($_POST['valider']))
{
    $codeCoupon = $_POST['codeCoup'];
    $idOffre = $_POST['idOffre'];
    $mysqli->query("UPDATE dataoffre SET idCoupon='$codeCoupon' WHERE id = $idOffre") or die($mysqli->error);
    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";
    header('location: ../views/ajout.php');
}
?>