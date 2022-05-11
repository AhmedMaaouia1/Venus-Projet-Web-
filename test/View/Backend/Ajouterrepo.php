<?php 
require 'Header_Admin.php';

 require_once 'C:/xampp/htdocs/code/test/test/View/connexiondb.php';
  $db = connexiondb::getConnexion();
$sql="SELECT * FROM recl where id_reclamation=?";
$recipesStatement = $db->prepare($sql);
$recipesStatement->execute([$_GET['addr']]);
$title=$recipesStatement->fetchall();
foreach ($title as $res) {
  
}


?>



<body>
<div class="container mt-5">

<br><br><br><br>
<div class='table-responsive'>

  <form name="frm"  method="post" action="ajouterpfct.php" enctype="multipart/form-data" >
        <center><legend><h2>Ajouter Reponse</h2></legend></center>
        <table id="example1" class="table table-striped">
          <tr>
            <th>Reponse</th>
            <th><textarea name="Reponse"></textarea>
            <input type="hidden" name="id_rep" value=""/>
 <input type="hidden" name="mail" value=" <?php echo $res['mail_reclamation'] ?>"/>
          <input type="hidden" name="id_rec" value="<?php echo $_GET['addr'] ?>"/></th>

          </tr>
    
         
        </table>
        <br>
        <center>
        <td><button type="submit" name="Ajouter" value="Ajouter" class="btn btn-danger">Ajouter</button></td>
      </center>
    
      </form>






</div>


</div>
</body>