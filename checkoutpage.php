
<?php


        include_once 'includes/checkout.inc.php';

?>


<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
<title>Checkout</title>
<link rel="stylesheet" href="css/main.css">
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
                                        <?php

                                        //retrieve the class orderBooks and function show file to show the uploaded isb numbers below in a table 
                                        $books = new readBooks(); 
                                        $showIsbn = $books->showFileInfo();

                                        // showing isbn numbers. 
                                        foreach($showIsbn as $row){
                                        ?>
                                        <tr>
                                        <td class="isbn"> 
                                       
                                        <?php echo $row; ?>
                                    
                                     
                                        </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                
                                </tbody>
                        </table>


                </section>

                <!-- Payment form including stripe API -->
                <form action="charge.php" method="post" id="payment-form">
                
                <label for="customer_name">Name</label>
                        <input class="checkout-input"type="text" name="name" placeholder="Firstname & Lastname">

                        <label for="customer_address">Address</label>
                        <input class="checkout-input" type="text" name="address" placeholder="Adress, ZIP & City">

                        <label for="customer_address">Phone</label>
                        <input class="checkout-input" type="text" name="phone" placeholder="Mobilenumber including country code">

                        <div class="checkbox" >
                                <input class="checkbox-input" type="checkbox" class="checkbox"> <div>Approve general terms and conditions * </div> <br>
                        </div>
                <div class="form-row">
                        <label for="card-element">Credit or debit card</label>
                        <div id="card-element" name="stripe_id">
                        <!-- a Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors -->
                        <div id="card-errors"></div>
                        </div>
                        <button class="payment-button">Submit Payment</button>
                </form>
<!-- The needed JS files -->
<!-- JQUERY File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<!-- Your JS File -->
<script src="charge.js"></script>
</body>
</html>
</html>
