<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout offre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="">
    <?php 
        require_once '../controller/processOffre.php'; 
        require_once '../controller/processCoupon.php'; 
    ?> 
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
                <a class="navbar-brand">Offre</a>
                
        </div>
    </nav>
    <!-- Gestion des offres -->
    <div class="container py-2 border border-dark border-3 rounded mt-3">
        <h1 class="text-center display-2 fw-bold text-dark">Gestion des offres</h1>
        <div class="justify-content-center container border border-primary border-2 rounded mt-1">
            <form class="mt-3" action="../controller/processOffre.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row align-items-center">
                    <div class="col-auto">
                            <label for="nameI" class="form-label">Nom de l'offre: </label>
                    </div>
                    <div class="col-auto">
                        <input required name="nameI" type="text" class="form-control" placeholder="Enter le nom de l'offre" 
                        value="<?php echo $name; ?>">
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="prixI" class="form-label">Prix: </label>
                    </div>
                    <div class="col-auto">
                        <input required name="prixI" name="submit" type="text" class="form-control" 
                        placeholder="Entrer le prix" 
                        value="<?php echo $prix; ?>">
                    </div>
                </div>
                <br>
                <?php if ($update == true): ?>
                <button name="update" class="btn btn-secondary fs-5 border-2">Update</button>
                <?php else : ?>
                <button name="submit" class="btn btn-primary fs-5 border-2">Save</button>
                <?php endif; ?>
            </form>
        </div>
        <div class="container border border-danger border-2 rounded mt-3">
            <div class="container">
                <form class="d-flex justify-content px-5 mt-3" action="" method="post">
                    <div class="input-group px-5">
                        <input name="searchInput" class="form-control" placeholder="Search">
                        <button name="searchbtn" class="btn btn-dark">Search</button>
                    </div>
                        <div class="input-group btn-group px-5">
                            <select class="form-select" name="Make"
                                <option selected>Trier par</option>
                                <option value="1">itemName</option>
                                <option value="2">price</option>
                            </select>
                            <button class="btn btn-danger" name="trier">Trier</button>
                        </div>
                    <button class="btn btn-info px-5" name="actualiser">Actualiser</button>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Offre</th>
                        <th scope="col">Nom de l'offre</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['searchbtn'])){  
                        $searchInput = $_POST['searchInput'];
                        $result = $mysqli->query("SELECT `id`, `itemName`,`price` FROM dataoffre WHERE concat (`itemName`,`price`) LIKE  '%$searchInput%';") or  die($mysqli->error) ;  
                    }else if (isset($_POST['actualiser'])){
                        $result = $mysqli->query("SELECT `id`, `itemName`,`price` FROM dataoffre") or die($mysqli->error);
                    }
                    else if (isset($_POST['trier'])){
                        $makerValue = $_POST['Make'];
                        switch ($makerValue) {
                            case 1:
                                $tri_par = "itemName"; 
                                break;
                            case 2:
                                $tri_par = "price"; 
                                break;
                            default:
                            echo "Erreur, veuillez choix itemName ou price";
                        }
                            $result = $mysqli->query("SELECT `id`, `itemName`,`price` FROM dataoffre order by $tri_par") or die($mysqli->error);
                    }else {
                        $result = $mysqli->query("SELECT `id`, `itemName`,`price` FROM dataoffre") or die($mysqli->error);
                    }
                    while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>   
                        <td><?php echo $row['itemName']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a class="btn btn-info" href="ajout.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="../controller/processOffre.php?delete=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Gestion des coupons -->
    <div class="container py-2 border border-dark border-3 rounded mt-3">
        <h1 class="text-center display-2 fw-bold text-dark">Gestion des coupons</h1>
        <div class="justify-content-center container border border-primary border-2 rounded mt-1">
            <form class="mt-3" action="../controller/processCoupon.php" method="post">
                <input type="hidden" name="idC" value="<?php echo $idC; ?>">
                <div class="row align-items-center">
                    <div class="col-auto">
                            <label for="code" class="form-label">Code Coupon: </label>
                    </div>
                    <div class="col-auto">
                        <input required name="code" type="text" class="form-control" placeholder="Enter le code du coupon" 
                        value="<?php echo $code; ?>">
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="prixC" class="form-label">Prix discount: </label>
                    </div>
                    <div class="col-auto">
                        <input required name="prixC" name="submitC" type="text" class="form-control" 
                        placeholder="Entrer le prix discount" 
                        value="<?php echo $prixC; ?>">
                    </div>
                </div>
                <br>
                <?php if ($updateC == true): ?>
                <button name="updateC" class="btn btn-secondary fs-5 border-2">Update</button>
                <?php else : ?>
                <button name="submitC" class="btn btn-primary fs-5 border-2">Save</button>
                <?php endif; ?>
            </form>
        </div>
        <div class="container border border-danger border-2 rounded mt-3">
            <div class="container">
                <form class="d-flex justify-content px-5 mt-3" action="" method="post">
                    <div class="input-group px-5">
                        <input name="searchInputC" class="form-control" placeholder="Search">
                        <button name="searchbtnC" class="btn btn-dark">Search</button>
                    </div>
                        <div class="input-group btn-group px-5">
                            <select class="form-select" name="MakeC"
                                <option selected>Trier par</option>
                                <option value="1">Code Coupon</option>
                                <option value="2">price</option>
                            </select>
                            <button class="btn btn-danger" name="trierC">Trier</button>
                        </div>
                    <button class="btn btn-info px-5" name="actualiserC">Actualiser</button>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Coupon</th>
                        <th scope="col">Code du coupon</th>
                        <th scope="col">prix discount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['searchbtnC'])){  
                        $searchInputC = $_POST['searchInputC'];
                        $resultC = $mysqli->query("SELECT * FROM datacoupon WHERE concat (`codeCoupon`,`priceDiscount`) LIKE  '%$searchInputC%';") or  die($mysqli->error) ;  
                    }else if (isset($_POST['actualiserC'])){
                        $resultC = $mysqli->query("SELECT * FROM datacoupon") or die($mysqli->error);
                    }
                    else if (isset($_POST['trierC'])){
                        $makerValueC = $_POST['MakeC'];
                        switch ($makerValueC) {
                            case 1:
                                $tri_parC = "codeCoupon"; 
                                break;
                            case 2:
                                $tri_parC = "priceDiscount"; 
                                break;
                            default:
                            echo "";
                        }
                            $resultC = $mysqli->query("SELECT * FROM datacoupon order by $tri_parC") or die($mysqli->error);
                    }else {
                        $resultC = $mysqli->query("SELECT * FROM datacoupon") or die($mysqli->error);
                    }
                    while ($rowCo = $resultC->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $rowCo['id']; ?></td>   
                        <td><?php echo $rowCo['codeCoupon']; ?></td>
                        <td><?php echo $rowCo['priceDiscount']; ?></td>
                        <td>
                            <a class="btn btn-info" href="ajout.php?editC=<?php echo $rowCo['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="../controller/processCoupon.php?deleteC=<?php echo $rowCo['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container py-2 border border-warning border-5 rounded mt-3">
        <form action="../controller/processEtablir.php" method="post">
            <h1 class="text-center display-2 fw-bold text-dark">Etablissement des coupons</h1>
            <div class=" container d-flex justify-content">
                <div class="input-group ">
                    <button class="btn btn-success" disabled>Coupon : </button>
                    <input name="codeCoup" type="text" class="form-control mx-1" placeholder="Entrez l'id du coupon" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                <div class="input-group mx-1 pe-5">   
                <button class="btn btn-success" disabled>corresspond au offre: </button>
                    <input name="idOffre" type="text" class="form-control mx-1" placeholder="Entrez l'id de l'offre" aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                <button name="valider" class="btn btn-lg btn-primary ms-5">Valider</button>
            </div>
        </form>
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Offre</th>
                        <th scope="col">Nom du l'offre</th>
                        <th scope="col">Prix</th>
                        <th scope="col">ID Coupon</th>
                        <th scope="col">Code Coupon</th>
                        <th scope="col">Prix remise</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $resultJ = $mysqli->query("select dataoffre.id, dataoffre.itemName, dataoffre.price, dataoffre.idCoupon, datacoupon.codeCoupon,  datacoupon.priceDiscount from dataoffre INNER join datacoupon where dataoffre.idCoupon = datacoupon.id;") or die($mysqli->error);
                    while ($rowJ = $resultJ->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $rowJ['id']; ?></td>   
                        <td><?php echo $rowJ['itemName']; ?></td>
                        <td><?php echo $rowJ['price']; ?></td>
                        <td><?php echo $rowJ['idCoupon']; ?></td>
                        <td><?php echo $rowJ['codeCoupon']; ?></td>
                        <td><?php echo $rowJ['priceDiscount']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>