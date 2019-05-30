
<?php


require_once 'includes/upload.inc.php';

if(isset($_POST['submit'])){

        $csv_file = basename($_FILES['csv_file']['name']);;

        move_uploaded_file($_FILES["csv_file"]["tmp_name"], $csv_file);

        $fields = [

        'csv_file' =>$csv_file, 

        ];
    
        $insertFile = new upload(); 
        $insertFile->uploadFileToDatabase($csv_file); 
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/main.css">
        <title>Book Uploadpage</title>
</head>
<body class="body-center">

        <h1>Upload CSV File</h1>

        <form method="post" enctype="multipart/form-data">
                <input type="file" name="csv_file">
                <button type="submit" class="btn" name="submit">Submit</button>
        </form>
        <h2 class="filesTitle">Files:</h2>
        
        <?php
        
        $upload = new upload(); 
        $uploadFile = $upload->uploadFileToFolder(); 

        ?>
             
        <a href="startpage.php"><button type="button" class="btn btn-lg returnBtn">Go back</button></a> 


    

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>

