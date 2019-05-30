
<?php

include_once 'includes/checkout.inc.php';
include_once 'includes/api.inc.php';


//retrieve the api class from api.inc.php
$api = new getAPi(); 

//retrieve the ordeBooks class from checkout.inc.php
$files = new orderBooks(); 

//retrieve the api function from api class 
$getApi = $api->getApi(); 

//retrieve the show file info function from orderBooks class. 
$books = $files->showFileInfo();

if ($books) {

        //bolean set 
        $ok = true;

        //set the fields for new file
        $fields = ['ISBN','Book Title','Author'];

        //selects the har coded file to open and write, in this case in folder orders and file new_books.csv
        $file_to_write = fopen('orders/new_books.csv', 'w');
    
        
        //foreach that tells with fill_book function, what to write. 
        foreach ($books as $book) {
           $book = fill_book($book[0]);
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
    
    
    //function to add new hard coded test values to new_books.csv
    function fill_book($isbn)
    {
        $book = [];
        $book[0] = $isbn;
        $book[1] = 'Harry Potter';
        $book[2] = 'J K Rowling';
    
        return $book;
    }

    //Convert information from file and show the information on the recieve page below in table
    $newPath = 'orders/new_books.csv';
    $newCSV = array_map('str_getcsv', file($newPath));
    array_shift($newCSV);

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
                                        </tr>
                                </thead>
                                <tbody>

                                        
                                        <?php

                                        //loop through the new created csv file and show them below in a table. 
                                        foreach ($newCSV as $new_books) {
                                        ?>
                                        <tr>
                                                <td><?php echo $new_books[0]?></td>
                                                <td><?php echo $new_books[1]?></td>
                                                <td><?php echo $new_books[2]?></td>
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