<?php

//session_start();
require_once '../../cnx.php';
$code = '';
$prixC = '';
$updateC = false;
$idC = 0;
//  Save
if (isset($_POST['submitC'])){
    $code = $_POST['code'];
    $prixC = $_POST['prixC'];
    $mysqli->query("INSERT INTO datacoupon  (codeCoupon, priceDiscount) VALUES('$code',$prixC)") or  die($mysqli->error) ;  
    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']='success';
    header("location: ../views/ajout.php");
}
 //Delete
 if (isset($_GET['deleteC'])){
     $idC = $_GET['deleteC'];
     $mysqli->query("DELETE FROM datacoupon WHERE id = $idC") or die($mysqli->error);
     $_SESSION['message']="Record has been deleted!";
     $_SESSION['msg_type']="danger";
     header("location: ../views/ajout.php");
 }
 //Edit
 if(isset($_GET['editC']))
 {
     $idC = $_GET['editC'];
     $updateC = true;
     $resultC = $mysqli->query("SELECT * FROM datacoupon WHERE id = $idC") or die($mysqli->error);
     if ($resultC->num_rows)
     {
         $rowC = $resultC->fetch_array();
         $code = $rowC['codeCoupon'];
         $prixC = $rowC['priceDiscount'];
     }
 }
 //Updates
if (isset($_POST['updateC']))
{
    $idC = $_POST['idC'];
    $code = $_POST['code'];
    $prixC = $_POST['prixC'];
    $mysqli->query("UPDATE datacoupon SET codeCoupon='$code', priceDiscount='$prixC' WHERE id = $idC") or die($mysqli->error);
    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";
    header('location: ../views/ajout.php');
}
// etablissement coupon
if (isset($_POST['valider']))
?>