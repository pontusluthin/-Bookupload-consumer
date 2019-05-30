<?php


require_once('dbconnect.php');


class upload{

        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }


        //Function to store the file in the database 
        public function uploadFileToDatabase($csv_file) 
        {
            $statement = $this->db->prepare("INSERT INTO files(csv_file) VALUES ('$csv_file')");
            if ($statement->execute()) {
                echo ("File uploaded");
                header('location: checkoutpage.php');
            } else {
                echo ("Could not upload file correctly");
            }
        }

        //Function to upload the file with set name isbn.csv to uploaded_files foder
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