<?php
require_once('vendor/stripe/stripe-php/init.php');
\Stripe\Stripe::setApiKey('sk_test_l4md0uAZS9OkltbyYGUf72IZ00yKlrSpBr'); //YOUR_STRIPE_SECRET_KEY
// Get the token from the JS script
$token = $_POST['stripeToken'];
// This is a $20.00 charge in US Dollar.
//Charging a Customer
// Create a Customer
$name_first = "Batosai";
$name_last = "Ednalan";
$address = "New Cabalan Olongapo City";
$state = "Zambales";
$zip = "22005";
$country = "Philippines";
$phone = "09306408219";

$user_info = [
    'First Name' => $name_first,
    'Last Name' => $name_last,
    'Address' => $address,
    'State' => $state,
    'Zip Code' => $zip,
    'Country' => $country,
    'Phone' => $phone
];

// $customer_id = 'cus_F6Ai4gLolcMAb3';


if (isset($customer_id)) {
    try {
        // Use Stripe's library to make requests...
        $customer = \Stripe\Customer::retrieve($customer_id);
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];
    
        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }
} else {
    try {
        // Use Stripe's library to make requests...
        $customer = \Stripe\Customer::create(array(
            'email' => 'rednalan23@gmail.com',
            'source' => $token,
            'metadata' => $user_info,
        ));
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];
    
        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }
}

if (isset($customer)) {

    $charge_customer = true;

    // Save the customer id in your own database!
    // Charge the Customer instead of the card
    try {
        // Use Stripe's library to make requests...
        $charge = \Stripe\Charge::create(array(
            'amount' => 2000,
            'description' => 'Bribes to teacher',
            'currency' => 'sek',
            'customer' => $customer->id,
            'metadata' => $user_info
        ));
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];
    
        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");

        $charge_customer = false;
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }

   
}
?>

<?php
include_once 'includes/checkout.inc.php';
include_once 'includes/api.inc.php';

$files = 'uploaded_files/isbn.csv'; 
$api = new getAPi();
$testRead = new readBooks();  
$books = []; //Nested array to hold all the arrays



if ($file_handle = fopen($files, 'r')){ //'r' stands for only read
        //Read one line from the csv file, using comma as a separator 
        while ($data = fgetcsv($file_handle)) { //100 is default value and sets readable lines on max 100 characters
                $books[] = $testRead->return_result_set($data[0]);
        } 
        //Close the file 
        fclose($file_handle);
        
} 



if ($books) {
    $filename = 'new_books.csv';
    $file_to_write = fopen("orders/" . $filename, 'w');
    //bolean set 
    $ok = true;
    
    //set the fields for new file
   

    //selects the har coded file to open and write, in this case in folder orders and file new_books.csv
   

   
    //foreach that tells with fill_book function, what to write. 
    foreach ($books as $book) {
    
      $book = $api->fill_book($book); 
      // var_dump($book);
        $ok = $ok && fputcsv($file_to_write, $book);
    }

    fclose($file_to_write);

    //if $ok is bolead true a new link to the new file will be created and visable for the user. 
    if ($ok) {
        $file_link = '<a href="orders/new_books.csv" download>Show CSV file</a>';
    } else {
        echo 'Everything is NOT awesome';
    }
}


?>


<html lang="en">
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/main.css">
        <title>Book Upload</title>
</head>
<body>

<h1 class="recieveTitle">Recieve & Order</h1>

<h5 class="booksTitle">Your books:</h5>
                        <table class="table reciveTable">
                                <thead>
                                <tr>
                                                <th scope="col">ISBN</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Publisher</th>
                                        </tr>
                                </thead>
                                <tbody>

                                        
                                        <?php

                                        //loop through the new created csv file and show them below in a table. 
                                        foreach ($books as $book) {
                                        ?>
                                        <tr>
                                                <td><?php echo $book[0]?></td>
                                                <td><?php echo $book[1]?></td>
                                                <td><?php echo $book[4]?></td>
                                                <td><?php echo $book[6]?></td>
                                        </tr>    
                                        <?php }?>
                                        </table>
                                        
                                </tbody>
                        </table>

                        <!-- The link to actually download the new csv file -->
                        <div class="file_link"><?php echo $file_link; ?></div>

    
       </a>  <a href="index.php"><button type="button" class="btn btn-lg nextBtn newOrderBtn">New order</button></a>


</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>