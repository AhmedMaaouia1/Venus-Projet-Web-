<?php
    include_once '../../Controller/commandeC.php';
    include_once '../../Model/commande.php';


    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new commandeC();
    if (
        isset($_POST["prenom"]) &&
        isset($_POST["nom"]) && 
        isset($_POST["adresse"]) &&
        isset($_POST["tel"]) &&
		    isset($_POST["email"]) 
       ) 
        
     {
        if (
            !empty($_POST["prenom"]) &&  
            !empty($_POST["nom"]) && 
            !empty($_POST["adresse"]) &&  
            !empty($_POST["tel"]) && 
		      	!empty($_POST["email"])
            
        ) {
            $user = new commande(
                $_POST['prenom'],
                $_POST['nom'],
                $_POST['tel'], 
                $_POST['adresse'],
				$_POST['email'],
                $_POST['produit'],
                $_POST['total'],
                
                
            );
            $userC->modifiercommande($user, $_GET['id']);
            header('Location:liste_commandes.php');
        }
        else
            $error = "Missing information";
    }
    
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
        <h1 class="text-center display-2 fw-bold text-dark">Modifier la Commande</h1>
    <section class="content">
   
    <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            
           
            <div class="card-body">
            <?php
			if (isset($_GET['id'])){
				$user = $userC->recupereretat($_GET['id']);
				
		?>

            <form name="f1" action="" method="POST">

            <div class="form-group">
                <label for="prenom" >prenoms</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value = "<?php echo $user['prenom']; ?>"  required>
               
              </div>
              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" value = "<?php echo $user['nom']; ?>"  required>
              </div>
              <div class="form-group">
                <label for="adresse">adresse</label>
                <textarea id="adresse" name="adresse" class="form-control" rows="4"  required><?php echo $user['adresse']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="tel">tel</label>
                <input type="text" id="tel" name="tel" class="form-control" value = "<?php echo $user['tel']; ?>" required>
              </div>
              
              <div class="form-group">
                <label for="email">email</label>
                <input type="text" id="email" name="email" class="form-control" value = "<?php echo $user['email']; ?>"  required>
              </div>
              <div class="col-md-6">
	                <div class="form-group">
	                  <input  id="produit" name="produit" type="hidden" class="form-control" value="<?php echo $user['produits']; ?>">
	                </div>
                </div>
				<div class="col-md-6">
	                <div class="form-group">
	                  <input  id="total" name="total" type="hidden" class="form-control" value="<?php echo $user['total']; ?>">
	                </div>
                </div>
                <input type="reset" class='btn btn-secondary ' value="Reset">
							<input type="submit" class="btn btn-primary" value="Valider" >
                  </form>
                  <?php
                  }
                        
                ?>

              
               

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      
      </div>
    
  
  
    </section>
    <!-- /.content -->
  </div>
  

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

