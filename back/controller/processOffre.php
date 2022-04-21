<?php

session_start();
require_once '../../cnx.php';
$name = '';
$prix = '';
$update = false;
$id = 0;
//  Save
if (isset($_POST['submit'])){
    $name = $_POST['nameI'];
    $prix = $_POST['prixI'];
    $mysqli->query("INSERT INTO dataoffre (itemName, price) VALUES('$name',$prix)") or  die($mysqli->error) ;  
    $_SESSION['message']="Record has been saved!";
    $_SESSION['msg_type']='success';
    header("location: ../views/ajout.php");
}
 //Delete
 if (isset($_GET['delete'])){
     $id = $_GET['delete'];
     $mysqli->query("DELETE FROM dataoffre WHERE id = $id") or die($mysqli->error);
     $_SESSION['message']="Record has been deleted!";
     $_SESSION['msg_type']="danger";
     header("location: ../views/ajout.php");
 }
 //Edit
 if(isset($_GET['edit']))
 {
     $id = $_GET['edit'];
     $update = true;
     $result = $mysqli->query("SELECT * FROM dataoffre WHERE id = $id") or die($mysqli->error);
     if ($result->num_rows)
     {
        $row = $result->fetch_array();
        $name = $row['itemName'];
        $prix = $row['price'];
     }
 }
 //Updates
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['nameI'];
    $prix = $_POST['prixI'];
    $mysqli->query("UPDATE dataoffre SET itemName='$name', price='$prix' WHERE id = $id") or die($mysqli->error);
    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="warning";
    header('location: ../views/ajout.php');
}

?>