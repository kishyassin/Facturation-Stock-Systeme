<?php 
    $inserted = false;
    if(isset($_POST['ok'])){
        require_once ("./connection/connectMysqliClass.php");

        // sign variables 
        $designation = $_POST['designation'];
        $price = $_POST['price'];
        $qte = $_POST['qte'];
        // set the query 
        $query = "INSERT INTO stock 
        VALUES (NULL , ? , ? , ? )";

        // prepar insertion 
        $statement = $conn -> prepare($query);
        $statement  -> bind_param('sdi' , $designation , $price , $qte);

        // execute and show message of success 
        if($statement -> execute())
            $inserted = true;
    }
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
            <div class="col-10 bg-light rounded-3 offset-1 p-4">
                <form action="" method="post">
                    <div class="row p-2">
                        <div class="col">
                            <h1>Add New Article</h1>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="designation">Article Name</label>
                            <input type="text" name="designation" id="designation" class="form-control" placeholder="EX: Keyboard" autocomplete="off">
                        </div>

                        <div class="col-6">
                            <label for="price" >Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="EX: 22"  autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <label for="qte">Quantity</label>
                            <input type="number" name="qte" id="qte" class="form-control" placeholder="EX: 380"  autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <input type="submit" name="ok" class="form-control bg-success text-light" value="Valide">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php 
            if($inserted){
        ?>
        <div class="row p-4 mt-1 ">
            <div class="col-md-8 bg-light rounded-4 offset-2  p-4 d-flex justify-content-between">
                <h3 class="text-success"><?= $_POST['designation'] ?> Added Successfully !</h3>
            </div>
        </div>
        <?php 
            }
        ?>
    </div>
</body>
</html>
