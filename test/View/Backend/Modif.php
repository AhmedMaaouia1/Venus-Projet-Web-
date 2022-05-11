<?php 
require 'Header_Admin.php';


require_once 'C:/xampp/htdocs/code/test/test/View/connexiondb.php';
  $db = connexiondb::getConnexion();
$sql="SELECT * FROM rep where  id_reponse=?";
$recipesStatement = $db->prepare($sql);
$recipesStatement->execute([$_GET['addr']]);
$title=$recipesStatement->fetchall();

?>



<body>
<div class="container mt-5">

<br><br><br><br>
<div class='table-responsive'>

  <form name="frm"  method="post" action="modfct.php" enctype="multipart/form-data" >
        <center><legend><h2>Modifier Reponse</h2></legend></center>
        <table id="example1" class="table table-striped">
          <tr>
            <?php
foreach ($title as $res) {
  
}
?>
            <th>Reponse</th>
            <th><input type="text" name="Reponse" value="<?php  echo $res['reply']  ?>"/>
            <input type="hidden" name="id_rep" value="<?php  echo $res['id_reponse']  ?>"/>
          <input type="hidden" name="id_rec" value="<?php  echo $res['id_rec']  ?>"/></th>

          </tr>
         
        </table>
        <br>
        <center>
        <td><button type="submit" name="Ajouter" value="Ajouter" class="btn btn-danger">Modifier</button></td>
      </center>
    
      </form>






</div>


</div>
</body>