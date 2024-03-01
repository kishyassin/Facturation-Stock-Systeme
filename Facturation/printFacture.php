<?php

session_start();

    $date = $_SESSION['post']['date'];
    if (isset($_SESSION['post']['paid']))
        $isPaid = 1;
    else
        $isPaid = 0;
    $articleData = $_SESSION['post']['articleData']; //  array of article data articleData = IdArticle + "*" + quantity + "*" + PU + "*" + designation 
    $idFacture = $_GET['idFacture'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
    <script src="./js/jquery/jQuerySource.js"></script>
</head>

<body class="bg-info">    
    <div class="container-fluid d-flex flex-column">
    <?php include('./header.php')?>

    <div class="row p-3 ">
            <div class="col-md-8 bg-light rounded-3 offset-2  p-4">
                <form action="" method="post">
                    <div class="row p-2">
                        <div class="col">
                            <h1>New Invoice Added Successfully</h1>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-4">
                            <p class="fw-bold">invoice N°: <b><?= $idFacture ?></b></p>
                        </div>

                        <div class="col-4">
                            <p class="fw-bold">Date: <b><?= $date ?></b></p>
                        </div>
                        <div class="col-4">
                            <p class="fw-bold">Paid <b><?= $isPaid ? "Yes" : "No" ?></b></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col">
                            <h4>Client Informations</h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <p>First Name: <b><?= $_SESSION['post']['fname'] ?></b> </p>
                        </div>
                        <div class="col-4">
                            <p>Last Name: <b><?= $_SESSION['post']['lname'] ?></b> </p>
                        </div>
                        <div class="col-4">
                            <p>Phone Number: <b><?= $_SESSION['post']['tele'] ?> </b></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Article</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">P.U</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    $total = 0;

                                    foreach ($articleData as $row) {
                                        $count++;
                                        $pu = explode('*', $row)[2];
                                        $quantity = explode('*', $row)[1];
                                        $total += ($pu * $quantity);
                                        $designation = explode('*', $row)[3];
                                    ?>
                                        <tr>
                                            <td> <?= $count ?> </td>
                                            <td> <?= $designation ?> </td>
                                            <td> <?= $quantity ?> </td>
                                            <td> <?= $pu ?> </td>
                                            <td> <?= $pu * $quantity ?> </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-success">Total</th>
                                    <th id="totalAmount"> <?= $total ?> </th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col justify-content-center d-flex ">
                            <a href="print.php?idFacture=<?=$idFacture?>" class="btn btn-success">
                                Print Invoice
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>