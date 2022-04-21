<?php

session_start();
require_once "../../cnx.php";
$itemName = '';
$price = '';
$update = false;
$id = 0;
//  Save
if (isset($_GET['commande1'])){
    $id = $_GET['commande1'];
    $result = $mysqli->query("SELECT id, itemName, price FROM dataoffre WHERE id = $id") or die($mysqli->error);
    if ($result->num_rows)
    {
        $row = $result->fetch_array();
        $itemName = $row['itemName'];
        $price = $row['price'];
    }
    $mysqli->query("INSERT INTO commande (itemName, price) VALUES('$itemName',$price)") or die($mysqli->error) ; 
    header("location: ../views/index.php"); 
}
// Delete
if (isset($_GET['delete'])){
    $idc = $_GET['delete'];
    $mysqli->query("DELETE FROM commande WHERE id = $idc") or die($mysqli->error);
    header("location: ../views/index.php");
}
?>  