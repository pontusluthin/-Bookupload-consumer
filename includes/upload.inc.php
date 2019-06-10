<?php





class upload{



        //Function to upload the inserted file on uploadpage.php, the file is uploaded specific to the uploaded_files foled and has the name isbn.csv set. 
        public function uploadFileToFolder(){

            if(isset($_FILES)){
                $check = true; 

                //@ is to prevent the webpage showing an error message before the file is uploaded 
                if(@$_FILES['csv_file']['type'] !== 'text/csv'){
                        $check = false; 
                }

                if($check){
                        $path = realpath('./') . '/uploaded_files/isbn.csv';
                       
                        move_uploaded_file($_FILES['csv_file']['tmp_name'], "$path");
                      
                }
                
        }
        }

        
       



}