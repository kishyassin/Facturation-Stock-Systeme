<?php 
  // connection to db 
  require_once ("./connection/connectPDO.php");


  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT * FROM clients WHERE nomClient LIKE :client';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['client' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();


      foreach ($result as $row) {
        echo '<button class="list-group-item list-group-item-action border-1 seggestionForFirstName" 
        data-nom="' . htmlspecialchars($row['nomClient']) . '" 
        data-prenom="' . htmlspecialchars($row['prenomClient']) . '"
        data-telephone="' . htmlspecialchars($row['telephoneClient']) . '"
        data-id="' . htmlspecialchars($row['idClient']) . '">'
      . htmlspecialchars($row['nomClient'] . ' ' . $row['prenomClient']) . '</button>';    }

      echo '<a target="_blank" href="./addClient.php" class="list-group-item list-group-item-action border-1 bg-primary text-light"><b>Add New Client?</b></a>';
    
  }

?>