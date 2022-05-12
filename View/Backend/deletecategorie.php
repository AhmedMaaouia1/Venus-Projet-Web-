<?php
   
   require_once '../../Controller/categorieC.php';
   require_once '../../Model/categorie.php'; 
   /*$categorieC = new categorieC() ;
       if (isset($_POST["id"])){
       $categorieC->deletecategorie($_POST["id"]);
       header('Location:Ajoutercategorie.php');
   }*/


   $categorieC=new categorieC();
    
   $categorieC = new categorieC();
   $categorieC->deletecategorie($_GET['id']);
   header('Location:liste_categorie.php');
   
?>