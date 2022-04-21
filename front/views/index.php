<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier offre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="p-5 m-2">
    <?php require_once '../controller/process.php'; ?> 
    <?php require_once '../controller/process3.php'; ?> 
    <?php
        $result = $mysqli->query("SELECT id, itemName, price FROM dataoffre") or die($mysqli->error);
        $total=0;
    ?>
        <!-- cards -->
        <section class="p-2">
            <div class="container">
                <div class="row text-center d-flex justify-content-between">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col">
                            <div class="card bg-dark text-light">
                                <div class="h1 m-3">
                                    <i class="bi bi-hexagon"></i>
                                </div>
                                <h3 class="card-title mb-3"><?php echo $row['itemName']; ?></h3>
                                <p class="card-text mx-5 mb-3">Price: <?php echo $row['price']; ?></p>
                                <a href="../controller/process.php?commande1=<?php echo $row['id']; ?>" name="submit" class="btn btn-primary mx-5 mb-3">Réserver</a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php
        $commande = $mysqli->query("SELECT * FROM commande") or die($mysqli->error);
    ?>
    <div class="container border border-danger border-2 rounded mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom de l'offre</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rowc = $commande->fetch_assoc()): ?>
                    <tr>
                        <td></td>
                        <td><?php echo $rowc['itemName']; ?></td>
                        <td><?php echo $rowc['price']; ?></td>
                        <td>
                            <a class="btn btn-danger" href="../controller/process.php?delete=<?php echo $rowc['id']; ?>">Delete</a>
                        </td>
                        <?php $total = $total + $rowc['price']; ?>
                    </tr>
                    <?php endwhile; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p class="fw-bold">Total: <?php echo $total; ?></p></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
    </div>
    <div class="container mt-3 ">
        <div class="d-flex justify-content-end">  
            <div class="row align-items-center  px-3">
                <div class="col-auto">
                    <label class="form-label" for="">Coupon:</label>
                </div>
                <div class="col-auto">
                        <form action="../controller/process3.php" method="post">
                            <input name="couponInput" class="form-control" placeholder="Enter votre coupon" ></input>
                            
                        </div>
                    </div>
                    <button name="pass" class="btn btn-primary" >Passer au formulaire de paiement</button>
                </form>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>