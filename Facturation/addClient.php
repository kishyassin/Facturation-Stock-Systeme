<!-- <?php 
    $inserted = false;
    if(isset($_POST['ok'])){
        require_once ("./connection/connectMysqliClass.php");
        $query = "INSERT INTO clients 
        VALUES (NULL , '{$_POST['fname']}' , '{$_POST['lname']}' , '{$_POST['tele']}')";
        if($conn -> Query($query))
            $inserted = true;
    }
?> -->
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
            <div class="col-10 bg-light rounded-3 offset-1  p-4">
                <form action="" method="post">
                    <div class="row p-2">
                        <div class="col">
                            <h1>Add New Client</h1>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="EX: Yassine" autocomplete="off">
                        </div>

                        <div class="col-6">
                            <label for="lname" >Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="EX: Kish"  autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <label for="tele">Telephone</label>
                            <input type="tel" name="tele" id="telephone" class="form-control" placeholder="EX: 0612345678"  autocomplete="off">
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
                <h3 class="text-success"><?= $_POST['fname'] ?> <?= $_POST['lname'] ?> Added Successfully !</h3>
            </div>
        </div>
        <?php 
            }
        ?>
    </div>
</body>
</html>
