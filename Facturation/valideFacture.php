<?php
// connecting to db 
session_start();
$_SESSION['post'] = $_POST;   
require_once("./connection/connectMysqliClass.php");
if (isset($_POST['ok'])) {
    $idClient = $_POST['idClient'];
    $date = $_POST['date'];
    if (isset($_POST['paid']))
        $isPaid = 1;
    else
        $isPaid = 0;
    $articleData = $_POST['articleData']; //  array of article data articleData = IdArticle + "*" + quantity + "*" + PU + "*" + designation 
    $idFacture = time();

    // insert new facture 
    $query = "INSERT INTO factures VALUES ('$idFacture','$date', '$isPaid' ,'$idClient') ";
    $conn->query($query);

    // insert to details and update stock
    foreach ($articleData as $row) {
        $idArticle = explode('*', $row)[0];
        $quantity = explode('*', $row)[1];
        $price = explode('*', $row)[2];
        $query = "INSERT INTO details VALUES (NULL,'$price','$quantity','$idFacture','$idArticle')";
        $conn->query($query);

        // update stock 
        $query = "UPDATE stock SET quantiteStock = quantiteStock-'$quantity' WHERE  idArticle = '$idArticle'";
        $conn->query($query);
    }
}
header('Location: printFacture.php?idFacture='.$idFacture);
?>
