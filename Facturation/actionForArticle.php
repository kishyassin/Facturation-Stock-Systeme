<?php
// connection to db 
require_once("./connection/connectPDO.php");


//   article suggestions 
if (isset($_POST['articleQuery'])) {
  $inputTextOfArticle = $_POST['articleQuery'];
  $sql = 'SELECT * FROM stock WHERE designation LIKE :article';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['article' => '%' . $inputTextOfArticle . '%']);
  $result = $stmt->fetchAll();
  if ($result) 
    foreach ($result as $row) 
      echo '<button class="list-group-item list-group-item-action border-1 seggestionForArticle" data-id="' . htmlspecialchars($row['idArticle']) . '" data-pu="' . htmlspecialchars($row['prixUnitaire']) . '" data-quantity="' . htmlspecialchars($row['quantiteStock']) . '">' . htmlspecialchars($row['designation']) . '</button>';
      echo '<a target="_blank" href="./addStock.php" class=" text-light list-group-item list-group-item-action border-1 bg-primary"><b>Add New Article?</b></a>';
  

}
