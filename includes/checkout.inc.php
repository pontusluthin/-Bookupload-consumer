<?php 

include 'api.inc.php';

$api = new getAPi();

class readBooks{


//function to show the information in the uploaded file isbn.csv, information is showed on checkout page.  
    public function showFileInfo() {
        $files = 'uploaded_files/isbn.csv'; 

        $books = []; //Nested array to hold all the arrays
        //$books[] = ['ISBN', 'Book title', 'Author'];

        if (@$file_handle = fopen($files, 'r')){ //'r' stands for only read

                //Read one line from the csv file, using comma as a separator 
                while ($data = fgetcsv($file_handle)) { //100 is default value and sets readable lines on max 100 characters
                        $books[] = $data[0];
                }
                return $books; 

                //Close the file 
                fclose($file_handle);
        } 
    }

        function return_result_set($isbn) 
    {
        $api = new getAPi(); 
        $result = [];
        $books = $api->getBookInfo('books', $isbn);
        foreach($books as $key => $val) {
            if($key === 'isbn' || $key === 'title'  || $key === 'pages') {
                $result []= $val;
            } else if($key === 'categories') {
                $result []= $val[0];
            } else if($key === 'author_id') {
                $author_id = $val;
            } else if ($key === 'publisher_id') {
                $publisher_id = $val;
            }
        }
        $author = $api->getBookInfo('authors', $author_id);
        $result[] = $author['firstName'] . ' ' . $author['lastName'];
        $result[] = $author['email'];

        $publisher = $api->getBookInfo('publishers', $publisher_id);
        foreach($publisher as $key => $val) {
            if($key !== 'id') {
                $result []= $val;
            }
        }
        return $result;
    }

}