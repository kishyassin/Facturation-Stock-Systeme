<?php
session_start();

$date = $_SESSION['post']['date'];
if (isset($_SESSION['post']['paid']))
    $isPaid = 1;
else
    $isPaid = 0;
$articleData = $_SESSION['post']['articleData']; //  array of article data articleData = IdArticle + "*" + quantity + "*" + PU + "*" + designation 
$idFacture = $_GET['idFacture'];

require("fpdf.php");

$count=0;
$total=0;

$pdf = new FPDF('P','mm','A4');
$pdf -> AddPage();
$pdf->Image('img.jpg', 5, 5, 30);
$pdf -> SetFont('Arial','b',40);
$pdf -> Cell(0,10,"COIN-INFO",0,1,'C');
$pdf ->Ln();
$pdf ->Ln();
$pdf -> SetFontSize(15);
$pdf -> Cell(0,10,"Client: ".$_SESSION['post']['fname'] . ' ' . $_SESSION['post']['lname'],0,1,'L');
$pdf -> Cell(0,10,"TELE: ". $_SESSION['post']['tele'] ,0,1,'L');
$pdf -> Cell(0,10,"ID FACTURE: ".$idFacture,0,1,'L');
if($isPaid){
    $pdf -> Cell(0,10,"Paied: "."Yes",0,1,'L');
}else{
    $pdf -> Cell(0,10,"Paied: "."No",0,1,'L');
}

$pdf ->Ln();
$pdf -> SetFont('Arial','U');
$pdf -> Cell(0,10,"Facture",0,1,'C');
$pdf -> SetFont('Arial','');

$pdf ->SetFillColor(200,200,200);
$pdf -> SetFontSize(10);


$pdf -> Cell(20,13,"N Ordre",1,0,'L',true);
$pdf -> Cell(100,13,"Designation",1,0,'C',true);
$pdf -> Cell(20,13,"Price",1,0,'C',true);
$pdf -> Cell(30,13,"Quantity",1,0,'C',true);
$pdf -> Cell(25,13,"Montant",1,1,'C',true);


$pdf ->SetFillColor(250,250,250);
foreach ($articleData as $row) {
    $count++;
    $pu = explode('*', $row)[2];
    $quantity = explode('*', $row)[1];
    $total += (floatval($pu) *floatval($quantity));
    $designation = explode('*', $row)[3];
    $pdf -> Cell(20,13,$count,1,0,'C',true);
    $pdf -> Cell(100,13,$designation,1,0,'C',true);
    $pdf -> Cell(20,13,$pu,1,0,'C',true);
    $pdf -> Cell(30,13,$quantity,1,0,'C',true);
    $pdf -> Cell(25,13,floatval($pu)*floatval($quantity),1,1,'C',true);
}
$pdf -> Cell(140,13,'','1T',0,'L',false);

$pdf -> Cell(30,13,"TOTAL",1,0,'C',true);
$pdf ->SetFontSize(17);
$pdf -> Cell(25,13,$total,1,1,'LB',true);

$pdf->Output();
$pdf->Close();
?>
