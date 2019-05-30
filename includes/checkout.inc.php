<?php 

class orderBooks{


   /* public function __construct()
    {
        $db = new DBConnect();
        $this->db = $db->pdo;
    }*/


    public function upload(){
        /*$files = 'uploaded_files/isbn.csv'; 

                        $books = []; //Nested array to hold all the arrays

                        if (@$file_handle = fopen($files, 'r')){ //'r' stands for only read

                                //Read one line from the csv file, using comma as a separator 
                                while ($data = fgetcsv($file_handle)) { //100 is default value and sets readable lines on max 100 characters
                                        $books[] = fill_book($data[0]);
                                       echo $data[0] . '<br>';
                                
                                }

                                //Close the file 
                                //fclose($file_handle);
            }        */ 
            
        
                        
    }

    public function download($books){

        
        if($books){
            $file_name = 'new_books.csv';
            $file_to_write = fopen($file_name , 'w');

            $showfile = true; 

            foreach($books as $book){
                  //  $book = fill_book($book[0]);

                    $showfile = $showfile && fputcsv($file_to_write,$book);
            }

            fclose($file_to_write);

            if($showfile){
                echo '<a href="' . $file_name . '">New CSV</aZ';
            }

        }

    }

    public function getApi($uploadCSV){

        array_shift($uploadCSV);


        foreach ($uploadCSV as $isbn){

        $isbn = $isbn[0];
        
        $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io/books/';

                // Create a curl instance.
        $ch = curl_init($url);

        // Setup curl options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Perform the request and get the response.
        $response = curl_exec($ch);
        curl_close($ch);

        $string = substr($response);
        $api_data = json_decode($string, true);
        //$array [] = $api_data;

        }

        return $api_data;
       

    }


    public function fill_book($isbn){

        foreach($isbn as $apidata){
            if($apidata !== null){

                $book = [];
                $book[0] = $isbn[0];
                $book[2] = $isbn[1];
                $book[3] = $isbn[2];
                return $book;

            }
        }

    }

 


}