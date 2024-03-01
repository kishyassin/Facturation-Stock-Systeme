<?php
session_start();
// set date to current date 
$_SESSION['date'] = date('Y-m-d');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
    <script src="./js/jquery/jQuerySource.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

</head>

<body class="bg-info">
    <div class="container-fluid d-flex flex-column">
        <?php include('./header.php')?>
        <div class="row p-3 ">
            <div class="col-10 bg-light rounded offset-1  p-4">
                <form action="valideFacture.php" method="post" id="myForm" class="position-relative">
                    <div class="row p-2">
                        <div class="col">
                            <h1>Add New Invoice</h1>
                        </div>
                    </div>
                    <hr>
                    <!-- this hidden input stores the id oof the client  -->
                    <input type="hidden" name="idClient" id="idClient">
                    <div class="row">
                        <div class="col">
                            <p class=" text-danger">*Please Select a client from the list </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Ex: Yassine" autocomplete="off" required>
                        </div>

                        <div class="col-6">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Ex: Kish" autocomplete="off" required>
                        </div>
                    </div>
                    <div class=" col-12 row position-absolute" style="z-index:100;">
                        <div class="col-6 px-3">
                            <div class="list-group col" id="suggestionList">
                            </div>
                        </div>
                        <div class="col-6 px-4">
                            <div class="list-group col " id="suggestionListLastName">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-8">
                            <label for="tele">Telephone</label>
                            <input type="tel" name="tele" id="telephone" class="form-control" placeholder="Ex: 0612345678" autocomplete="off" required>
                        </div>
                        <div class="col-4">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" autocomplete="off" required value="<?= $_SESSION['date'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <p class="text-danger">
                               *Please Select Article From The List 
                            </p>
                        </div>
                    </div>
                    <div class="row articles" id="articleInfoCumulator">
                    
                        <div class="col-9">
                            <label for="articleName">Article Name</label>
                            <input type="text" id="article" name="article[]" class="form-control mt-2 " placeholder="Ex: Smart Tv" autocomplete="off">
                        </div>

                        <div class="col-3 d-flex flex-column justify-content-between">
                            <label for="qte">Quantity</label>
                            <input type="number" id="qte" name="quantitee[]" class="form-control" placeholder="Ex: 3" autocomplete="off" min="0">
                        </div>
                        <!-- this hidden input stors the price  -->
                        <input type="hidden" name="hiddenPu" id="hiddenPu">

                        <!-- this hidden input stores the id of article clicked  -->
                        <input type="hidden" name="hiddenArticleId[]" id="hiddenArticleId">
                    </div>
                    <div class="row col position-relative" style="z-index:100;">
                        <div class="col-6 position-absolute  top-0 start-0">
                            <div class="list-group" id="suggestionListOfArticles">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-3 d-flex flex-row justify-content-end ">
                            <p class="btn btn-outline-success" onclick="plusArticles()">Add more</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Article</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">P.U</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                </tbody>
                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-success">Total</th>
                                    <th id="totalAmount">0</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="paid">Mark this invoice as paid</label>
                            <input type="checkbox" name="paid" id="paid">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="ok" class="form-control bg-success text-light" value="Valide">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    // this variable is used to store totalAmount of articles
    let totalAmount = 0;
    
    // this function can push the article and its price to the table
    function plusArticles() {
        let tbody = document.querySelector("#tbody");
        var newTr = document.createElement("tr");

        // Create new table cells
        var newTd1 = document.createElement("td");
        var newTd2 = document.createElement("td");
        var newTd3 = document.createElement("td");
        var newTd4 = document.createElement("td");
        var newTd5 = document.createElement("td");
        let counterArticle = document.querySelectorAll("tr").length;
        let designation = document.getElementById("article").value
        let quantity = document.getElementById("qte").value
        let PU = document.getElementById("hiddenPu").value;
        let IdArticle = document.getElementById("hiddenArticleId").value
        let totalAmountElement = document.getElementById("totalAmount")

        // in case the user clicks on add articles and the field of designation is empty
        if (designation == "")
            return false;
        else {

            // in case the user click add article without specifying the quantity 
            // it gets 1 as default
            if (quantity == "")
                quantity = 1

            // Append data to the new cells
            newTd1.textContent = counterArticle-1;
            newTd2.textContent = designation;
            newTd3.textContent = quantity;
            newTd4.textContent = PU;
            newTd5.textContent = quantity * PU;


            // Append cells to the new row
            newTr.appendChild(newTd1);
            newTr.appendChild(newTd2);
            newTr.appendChild(newTd3);
            newTr.appendChild(newTd4);
            newTr.appendChild(newTd5);

            // Append the new row to the table body
            tbody.appendChild(newTr);
            $("#article").val('');
            $("#qte").val('');

            // set the total amount 
            totalAmount += quantity * PU
            totalAmountElement.textContent = totalAmount;

            // create new hidden input to stoore article data
            var newHiddenInput = document.createElement("input");
            newHiddenInput.type = "hidden";
            newHiddenInput.name = "articleData[]";
            let articleData = IdArticle + "*" + quantity + "*" + PU + "*" + designation 
            newHiddenInput.value = articleData;
            let articleInfoCumulator = document.getElementById("articleInfoCumulator")
            articleInfoCumulator.appendChild(newHiddenInput);
        }
    }
    $(document).ready(function() {
        // first name suggestion 
        // this function passes the current value of the first name input to php through Ajax 
        // and it gets the result from the database 
        $("#fname").keyup(function() {
            var inputText = $(this).val();
            if (inputText != '') {
                $.ajax({
                    url: 'actionForFirstName.php',
                    method: 'POST',
                    data: {
                        query: inputText
                    },
                    success: function(response) {
                        $("#suggestionList").html(response);
                    }
                })
            } else {
                $("#suggestionList").html('');
            }
        });

        // Last Name Suggestions
        // this function passes the current value of the last name input to php through Ajax 
        // and it gets the result from the database 
        $("#lname").keyup(function() {
            var inputText = $(this).val();
            if (inputText != '') {
                $.ajax({
                    url: 'actionForLastName.php',
                    method: 'POST',
                    data: {
                        query: inputText
                    },
                    success: function(response) {
                        $("#suggestionListLastName").html(response);
                    }
                })
            } else {
                $("#suggestionListLastName").html('');
            }
        });

        // article suggestions
        // this function passes the current value of the article's name input to php through Ajax 
        // and it gets the result from the database 
        $("#article").keyup(function() {
            var inputTextOfArticle = $(this).val();
            if (inputTextOfArticle != '') {
                $.ajax({
                    url: 'actionForArticle.php',
                    method: 'POST',
                    data: {
                        articleQuery: inputTextOfArticle
                    },
                    success: function(response) {
                        $("#suggestionListOfArticles").html(response);
                    }
                })
            } else {
                $("#suggestionListOfArticles").html('');
            }
        });


        // fill in suggestion generated by first name
        $(document).on('click', '.seggestionForFirstName', function() {
            $("#fname").val($(this).data('nom'));
            $("#lname").val($(this).data('prenom'));
            $("#telephone").val($(this).data('telephone'))
            $("#idClient").val($(this).data('id'));
            $("#suggestionList").html('');
        })


        // fill in suggestion generated by last name
        $(document).on('click', '.seggestionForLastName', function() {
            $("#fname").val($(this).data('nom'));
            $("#lname").val($(this).data('prenom'));
            $("#telephone").val($(this).data('telephone'))
            $("#idClient").val($(this).data('id'));
            $("#suggestionListLastName").html('');
        })


        // fill in suggestion generated by article name
        $(document).on('click', '.seggestionForArticle', function() {
            $("#article").val($(this).text())
            $("#hiddenPu").val($(this).data('pu'));
            $("#hiddenArticleId").val($(this).data('id'));

            // set the max quantity to the quantity in stock of the selected article 
            $("#qte").attr('max', $(this).data('quantity'));
            $("#suggestionListOfArticles").html('');
        })

        // close suggestion list on click outside of them
        $(document).on('click', ':not(.seggestionForFirstName):not(.seggestionForLastName):not(.seggestionForArticle)', function() {
            $("#suggestionList").html('');
            $("#suggestionListLastName").html('');
            $("#suggestionListOfArticles").html('');
        })

    })
</script>

</html>