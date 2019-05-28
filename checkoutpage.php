
<?php
        include_once 'DB/dbconnect.php';
        include_once 'includes/order.inc.php';
        

?>


<html lang="en">
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/main.css">
        <title>Checkout book</title>
</head>
<body>

        <h1 class="checkoutTitle">Checkout</h1>
        
        <section class="checkout-flex">
                <section>
                        <h5>Your books</h5>
                        <table class="table">
                                <thead>
                                        <tr>
                                                <th scope="col">ISBN</th>
                                        </tr>
                                </thead>

                                <tbody>

                                        <tr>
                                        <td> 
                                        <?php
                                
                                        $books = new orderBooks(); 
                                        $showIsbn = $books->upload();       
                                
                                        ?>
                                        </td>
                                        </tr>
                                
                                </tbody>
                        </table>


                </section>

        <form action="./charge.php" method="POST" class="form" id="payment-form">
        <h5>Fill in your information</h5>

        <label for="customer_name">Name</label>
        <input type="text" name="customer_name">

        <label for="customer_address">Address</label>
        <input type="text" name="customer_address">

        <label for="customer_address">Phone</label>
        <input type="text" name="customer_phone">

        <div class="form-row">
        <label for="card-element">Credit or debit card</label>
        <div id="card-element">
        <!-- a Stripe Element will be inserted here. -->
        </div>
        <!-- Used to display form errors -->
        <div id="card-errors"></div>
        </div>
        <div>
                <input type="checkbox" class="checkbox"> <div>Approve general terms and conditions * </div> <br>
        </div>
        <button type="submit" class="btn">Submit</button>
        </form>

        

        </section>

        <pre>
                        <?php

                        function fill_book($isbn){

                                $book = [];
                                $book[0] = $isbn;
                                $book[1] = 'Harry Potter'; //To get information from api use Curl!
                                $book[2] = 'J K Rowling';

                                return $book;

                        }

                 
                        
                        
                        ?>
        </pre>

        
     

        <a href="uploadpage.php"><button type="button" class="btn btn-lg returnBtn">Go back</button></a><a href="recievepage.php"><button type="button" class="btn btn-lg nextBtn">Next page</button></a>


<!-- The needed JS files -->
<!-- JQUERY File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<!-- Your JS File -->
<script src="./charge.js"></script>
</body>


</html>

<?php


$getInfo = new orderBooks(); 
$apiInfo = $getInfo->getApi(); 

                

?>

