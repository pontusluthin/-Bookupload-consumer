<?php 


class orderBooks{




//function to show the information in the uploaded file isbn.csv, information is showed on checkout page.  
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

}