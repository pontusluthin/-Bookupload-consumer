<?php 

include 'api.inc.php';

//including api class to include it in a function 
$api = new getAPi();

class readBooks{


//function to show the information in the uploaded file isbn.csv, information is showed on checkout page.  
    public function showFileInfo() {
        $files = 'uploaded_files/isbn.csv'; 

        $books = []; //Nested array to hold all the arrays

        if (@$file_handle = fopen($files, 'r')){ 

                
                while ($data = fgetcsv($file_handle)) { 
                        $books[] = $data[0];
                }
                return $books; 

                //Close the file 
                fclose($file_handle);
        } 
    }


        //Function to get the correct result from api 
        function return_result_set($isbn) 
        {
            $api = new getAPi(); 
            $result = [];

            //Get book table
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

            //Get author table 
            $author = $api->getBookInfo('authors', $author_id);
            $result[] = $author['firstName'] . ' ' . $author['lastName'];
            $result[] = $author['email'];

            //Get publisher table 
            $publisher = $api->getBookInfo('publishers', $publisher_id);
            foreach($publisher as $key => $val) {
                if($key !== 'id') {
                    $result []= $val;
                }
            }
            return $result;
        }

}