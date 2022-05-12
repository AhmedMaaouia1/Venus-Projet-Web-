
<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
/*if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: login.php');
   }*/
?>

<?php 
  	include "../../Controller/commandeC.php";

    $affcommande=new commandeC();
    $aff=$affcommande->affichercommande();
    
?>
<?php require 'Header_Admin.php'; ?>

<body class="">
   
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']); 
                ?>
        </div>
        <?php endif ?>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand">Panier</a>
                
        </div>
    </nav>
    <!-- Gestion des offres -->
    <div class="container py-2 border border-dark border-3 rounded mt-3">
        <h1 class="text-center display-2 fw-bold text-dark">Liste des Commandes</h1>
        <div class="justify-content-center container border border-primary border-2 rounded mt-1">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                           
               
                  <thead>
                    <tr>
                      <th>id commande</th>
                      <th>id produit</th>
                      <th>id user</th>
                      <th>Nom Produit</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($aff as $commande) {
                    ?>

                    <tr>
                    <td><?PHP echo $commande['id_commande']; ?></td>
                    <td><?PHP echo $commande['id']; ?></td>
                    <td><?PHP echo $commande['id_user']; ?></td>
                    <?php
                    $aff1=$affcommande->affichernomproduit($commande['id']); ?>
                    <td><?PHP echo $aff1['Nom']; ?></td>
                    <td>
                    <a href="modifiercommande.php?id=<?PHP echo $commande['id']; ?>"> <img src="https://img.icons8.com/fluent/48/000000/edit-file.png"/> </a>
                  </td>
                  <td><a href="supprimercommande.php?id_commande=<?php echo $commande['id_commande']; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
                    </tr>

   <div id="detail<?php echo $commande['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Commande</h4> 
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
         <?php echo str_replace('+', '<br />', $commande['produits']); ?>
          <br>
          
          
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>

                    <?PHP

                        }
                    ?>
                    
                  </tbody>
                </table>
 

                </div>


</div>
</div>
</div>


</div>
<!-- End of container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" href="login.html">Logout</a>
</div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>

</html>


