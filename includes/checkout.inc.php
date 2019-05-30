<?php 


class orderBooks{





    public function showFileInfo(){
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

    public function download(){

            $file_name = 'orders/new_books.csv';
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

    
        public function fill_book($isbn){

                foreach ($data as $val) {
                if ($val !== null) {
                        $book = [];
                        $book[0] = $data[0];
                        $book[2] = $data[1];
                        $book[3] = $data[2];
                        return $book;
                }
                }

                

        }
        

    

 


}