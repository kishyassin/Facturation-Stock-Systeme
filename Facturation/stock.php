<?php


if(isset($_POST['ok'])){ 
    require_once ("./connection/connectMysqliClass.php");
    $query = "UPDATE stock SET quantiteStock = ? where idArticle = ?";
    $statement = $conn -> prepare($query);
    for ($i = 0; $i < count($_POST['idArticle']); $i++) {
       $id = intval($_POST['idArticle'][$i]);
       $qte = intval($_POST['updatedQte'][$i]);

       $statement -> bind_param('ii',$qte,$id);
       if (!$statement->execute()) {
           echo "Error: " . $conn->error;
       }
    }
}

$rowPerPage = 10;
require_once("./connection/connectMysqliClass.php");
$query = "SELECT * FROM stock";
$result = $conn->Query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
    <script src="./js/jquery/jQuerySource.js"></script>
    <script src="./js/dataTable/dataTable.js"></script>
    <script src="./js/dataTable/dataTableBootstrap.js"></script>
    <link rel="stylesheet" href="./css/dataTable/cloudflar.css">
    <link rel="stylesheet" href="./css/dataTable/dataTable.css">
</head>

<body class="bg-info">
    <div class="container-fluid d-flex flex-column">
    <?php include('./header.php')?>

        <div class="row p-3 ">
            <div class="col-10 bg-light rounded-3 offset-1  p-4">
                <form action="" method="post">
                    <div class="row ">
                        <div class="col-6">
                            <h1>Stock Status</h1>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a href="./addStock.php" class="btn btn-success d-flex align-items-center ">
                               <b>Add New Article(s)</b>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <table id="stock" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Article ID</th>
                                <th>Article</th>
                                <th>Price</th>
                                <th>Current Quantity</th>
                                <th>Update (Add / Substruct)</th>
                                <th>Updated Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($row = $result -> fetch_assoc()){
                            ?>
                            <tr>
                                <td> <?= $row['idArticle'] ?> </td>
                                <td> <?= $row['designation'] ?> </td>
                                <td> <?= $row['prixUnitaire'] ?> </td>
                                <td> <?= $row['quantiteStock'] ?> </td>
                                <td><input type="number" class="form-control" oninput="iChange()"></td>
                                <td>
                                    <input type="text" name="updatedQte[]" value=" <?= $row['quantiteStock'] ?> " class="form-control bg-transparent  border-0" >
                                    <input type="hidden" name="idArticle[]" value=" <?= $row['idArticle'] ?> ">
                                </td>
                            </tr>

                            <?php        
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Article ID</th>
                                <th>Article</th>
                                <th>Price</th>
                                <th>Current Quantity</th>
                                <th>Add</th>
                                <th>Updated Quantity</th>
                            </tr>
                        </tfoot>
                    </table>
                    <button class="btn btn-success col mt-3" name="ok">
                        <b>Confirm Update Stock Status of this page ?</b>
                    </button>
                </form>
            </div>
        </div>
        
        <script>
            function iChange () {
                // Attach an event listener to all 'Add' inputs
                $('input[type="number"]').on('input', function () {
                    // Get the current quantity value from the same row
                    var currentQuantity = $(this).closest('tr').find('td:eq(3)').text();

                    // Get the value entered in the 'Add' input
                    var addValue = $(this).val();
                    if (addValue == '')
                        addValue = 0
                    // Calculate the updated quantity by adding the current quantity and the entered value
                    var updatedQuantity = parseInt(currentQuantity) + parseInt(addValue);

                    // Update the 'Updated Quantity' input in the same row
                    $(this).closest('tr').find('[name="updatedQte[]"]').val(updatedQuantity);
                });
            };


            new DataTable('#stock');
        </script>
</body>

</html>